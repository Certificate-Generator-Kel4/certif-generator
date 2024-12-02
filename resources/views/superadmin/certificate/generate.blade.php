@extends('layouts_dashboard.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Buat & Sesuaikan Template Sertifikat Anda</h2>
    <div class="row">
        <!-- Preview Sertifikat -->
        <div class="col-md-8">
            <div id="certificate" class="certificate-preview">
                <h3 class="text-center editable" id="certificate-title">SERTIFIKAT</h3>
                <p class="text-center editable" id="certificate-subtitle">PENCAPAIAN</p>
                <p class="text-center">SERTIFIKAT INI DIBERIKAN KEPADA:</p>
                <h2 class="text-center editable" id="recipient-name">Nama Anda</h2>
                <p class="text-center editable" id="certificate-description">
                    Semoga pencapaian ini menjadi langkah awal menuju kesuksesan yang lebih besar. Terus berusaha dan berikan yang terbaik.
                </p>
                <div class="d-flex justify-content-between mt-5">
                    <div class="editable" id="issuer">UID</div>
                    <div class="editable" id="date">24 November 2024</div>
                    <div class="editable" id="signed-by">Tim Panitia</div>
                </div>
            </div>
        </div>

        <!-- Form untuk Mengedit Sertifikat -->
        <div class="col-md-4">
            <form>
                <label for="title">Nama Sertifikat</label>
                <input type="text" class="form-control" id="title" placeholder="Masukkan Acara">
                <label for="style">Pilih Gaya</label>
                <select class="form-control" id="style">
                    <option value="artistic">Artistik dan Kreatif</option>
                    <option value="modern">Modern</option>
                </select>
                <label for="name">Nama Penerima</label>
                <input type="text" class="form-control" id="name" placeholder="Nama Anda">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Contoh: email@domain.com">
                <label for="uid">UID</label>
                <input type="text" class="form-control" id="uid" placeholder="Masukkan UID">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
                <label for="signature">Unggah Tanda Tangan</label>
                <input type="file" class="form-control" id="signature">
                <label for="signed-by">Ditandatangani Oleh</label>
                <input type="text" class="form-control" id="signed-by" placeholder="Tim Panitia">
                <label for="date">Tanggal</label>
                <input type="date" class="form-control" id="date">
                <label for="color-theme">Pilih Tema Warna</label>
                <div class="d-flex">
                    <div class="form-check me-2">
                        <input class="form-check-input" type="radio" name="color-theme" id="theme-black" value="black" checked>
                        <label class="form-check-label" for="theme-black">Hitam</label>
                    </div>
                    <div class="form-check me-2">
                        <input class="form-check-input" type="radio" name="color-theme" id="theme-blue" value="blue">
                        <label class="form-check-label" for="theme-blue">Biru</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="color-theme" id="theme-red" value="red">
                        <label class="form-check-label" for="theme-red">Merah</label>
                    </div>
                </div>
                <button type="button" class="btn btn-primary mt-3 w-100" id="generate-btn">Kirim Sertifikat</button>
            </form>
        </div>
    </div>
</div>

<!-- CSS Kustom -->
<style>
    .certificate-preview {
        width: 100%;
        height: auto;
        border: 2px solid #ccc;
        padding: 20px;
        background-color: #fff;
        position: relative;
        font-family: 'Arial', sans-serif;
    }
    .certificate-preview .editable {
        outline: 1px dashed #007bff;
        cursor: pointer;
    }
    .form-control {
        margin-bottom: 10px;
    }
</style>

<!-- JS untuk Mengedit Sertifikat -->
<script>
    document.querySelectorAll('.editable').forEach(function (element) {
        element.addEventListener('click', function () {
            const newValue = prompt('Edit konten ini:', element.textContent);
            if (newValue !== null) {
                element.textContent = newValue;
            }
        });
    });

    // Update Isian Sertifikat Secara Dinamis
    document.getElementById('title').addEventListener('input', function () {
        document.getElementById('certificate-title').textContent = this.value;
    });

    document.getElementById('name').addEventListener('input', function () {
        document.getElementById('recipient-name').textContent = this.value;
    });

    document.getElementById('description').addEventListener('input', function () {
        document.getElementById('certificate-description').textContent = this.value;
    });

    document.getElementById('uid').addEventListener('input', function () {
        document.getElementById('issuer').textContent = this.value;
    });

    document.getElementById('signed-by').addEventListener('input', function () {
        document.getElementById('signed-by').textContent = this.value;
    });

    document.getElementById('date').addEventListener('input', function () {
        document.getElementById('date').textContent = this.value;
    });

    // Mengubah Gaya Template Secara Dinamis (misalnya background yang dipilih)
    function loadTemplate(templateId) {
        fetch(`/superadmin/certificate/get-template/${templateId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('certificate').style.backgroundImage = `url(${data.background_url})`;
            });
    }

    // Menghandle pemilihan template dan meneruskan ID template yang dipilih
    document.querySelectorAll('.select-template').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const templateId = this.dataset.templateId;
            loadTemplate(templateId);
        });
    });
</script>
@endsection
