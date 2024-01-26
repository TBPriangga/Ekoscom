<div class="hero-wrap hero-bread"
    style="background-image: url('<?= base_url() . 'views/themes/' . theme_active() . '/'; ?>images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>">Beranda</a></span>&gt;
                    <span>Testimoni</span>
                </p>
                <h1 class="mb-0 bread">Testimoni Saya</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 order-md-last">
                <form id="testimoniForm" class="bg-white p-5 contact-form">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="user_id" value="<?= user()['idusers']; ?>">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Anda"
                            value="<?= user()['user_fullname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="kerjaan" placeholder="Pekerjaan Anda" required>
                    </div>
                    <div class="form-group">
                        <textarea name="testimony" id="testimony" cols="30" rows="7" class="form-control"
                            placeholder="Testimoni Anda" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary py-3 px-5" onclick="addTestimoni()">Add
                            Testimoni</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function addTestimoni() {
        // Ambil nilai input dari formulir
        var formData = {
            user_id: document.getElementsByName('user_id')[0].value,
            nama: document.getElementsByName('nama')[0].value,
            kerjaan: document.getElementsByName('kerjaan')[0].value,
            testimony: document.getElementById('testimony').value
        };

        // URL API yang akan diakses
        var api_url = 'https://21102155.kelasmm1.cloud/backend_ekoscom/api/member';

        // Panggilan AJAX POST ke API untuk menambahkan testimoni
        var xhr = new XMLHttpRequest();
        xhr.open('POST', api_url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Proses data yang diterima dari API jika diperlukan
                    var data = JSON.parse(xhr.responseText);
                    console.log('Testimoni berhasil ditambahkan:', data);
                    alert('Data berhasil ditambahkan!');
                } else {
                    console.error('Error:', xhr.status, xhr.statusText);
                    alert('Data berhasil ditambahkan');
                }
            }
        };

        xhr.send(JSON.stringify(formData));
    }
</script>

</section>