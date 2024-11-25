<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantsImport implements ToModel, WithHeadingRow
{
    protected $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        if (empty($row['nama']) || empty($row['email']) || empty($row['no_telepon'])) {
            // \Log::warning('Missing data for row: ' . json_encode($row));
            return null;
        }

        // cek email
        $existingParticipant = Participant::where('email', $row['email'])
            ->where('event_id', $this->eventId)
            ->first();

        if ($existingParticipant) {
            // \Log::info('email duplikat:' . json_encode($row));
            return null; 
        }

        return new Participant([
            'nama'     => $row['nama'],
            'email'    => $row['email'],
            'no_telp'  => $row['no_telepon'],
            'event_id' => $this->eventId,
        ]);
    }

    /**
     * The heading row is the first row in the file (0-indexed).
     * @return int
     */
    public function headingRow(): int
    {
        return 1;
    }
}
