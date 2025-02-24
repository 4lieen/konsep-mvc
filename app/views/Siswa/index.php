<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Siswa
        </button>
            <h3>Daftar Siswa</h3>
            <ul class="list-group">
                <?php foreach ($data['siswa'] as $siswa) :?>
                    <li class="list-group-item  ">
                        <?= $siswa['nama']; ?>
                        <a href="<?= BASEURL; ?>/siswa/hapus/<?= $siswa['id']; ?>" class="badge text-bg-danger float-end ms-2" onclick="return confirm('yakin?')">hapus</a>
                        <a href="<?= BASEURL; ?>/siswa/detail/<?= $siswa['id']; ?>" class="badge text-bg-success float-end ms-2 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal">ubah</a>
                        <a href="<?= BASEURL; ?>/siswa/detail/<?= $siswa['id']; ?>" class="badge text-bg-primary float-end ms-2">detail</a>
                        <?php endforeach; ?>
                    </li>
            </ul>



        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
        
            <form action="<?= BASEURL; ?>/siswa/tambah" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="nama" class="form-control" id="nama" name="nama">
            </div>

            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="number" class="form-control" id="nis" name="nis">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"  placeholder="email@example.com">
            </div>

            <div class="form-label">
                <label for="jurusan">jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">>
                    <option selected>Pilih Jurusan</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Psikologi">Psikologi</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                </select>
            </div>

                <!-- class="form-label"
                <input ist="datalistOptions"  -->

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
        </div>
        </div>
    </div>
</div>