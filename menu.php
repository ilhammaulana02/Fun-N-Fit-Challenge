<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_olahraga");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            <b>
                <h5 style="font-weight: bold; font-size:larger">Upload Kegiatan olahragamu</h5>
            </b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">
                        UPLOAD
                    </button>
                </div>
            </div>

            <!-- Modal Tambah Dokumentasi-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Kegiatan Olahragamu disini</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_menu.php"
                                method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto"
                                                placeholder="your name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Dokumentasi</label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto Dokumentasi
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Nama" name="nama" required>
                                            <label for="floatingInput">Nama Pegawai</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pegawai
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="exercise" name="exercise" required>
                                            <label for="floatingInput">Jenis Exercise</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jenis Exercise
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Kalori" name="kalori" required>
                                            <label for="floatingInput">Kalori</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kalori
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Frekuensi" name="frekuensi" required>
                                            <label for="floatingInput">Frekuensi</label>
                                            <div class="invalid-feedback">
                                                Masukkan Frekuensi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate"
                                        value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Tambah Menu Baru-->
            <?php
            if (empty($result)) {
                echo "data menu makanan atau minuman tidak ada";
            } else {
            foreach ($result as $row) {
            ?>
            <!-- Modal Edit-->
            <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Kegiatan Olahragamu disini</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_menu.php" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto"
                                                placeholder="your name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Dokumentasi</label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto Dokumentasi
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Nama Menu" name="nama" required
                                                value="<?php echo $row['nama'] ?>">
                                            <label for="floatingInput">Nama Pegawai</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pegawai
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Exercise" name="exercise" required
                                                value="<?php echo $row['exercise'] ?>">
                                            <label for="floatingpassword">Jenis Exercise</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jenis Exercise
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Kalori" name="kalori" required
                                                value="<?php echo $row['kalori'] ?>">
                                            <label for="floatingInput">Kalori</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kalori
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Frekuensi" name="frekuensi" required
                                                value="<?php echo $row['frekuensi'] ?>">
                                            <label for="floatingInput">Frekuensi</label>
                                            <div class="invalid-feedback">
                                                Masukkan Frekuensi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate"
                                        value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Edit-->

            <!-- Modal Delete-->
            <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Daftar Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_delete_menu.php"
                                method="post">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                <div class="col-lg-12">
                                    <b>Apakah anda ingin menghapus menu</b> <b><i><?php echo $row['nama']?></i></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="input_user_validate"
                                        value="12345">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Delete-->


            <?php
            }
            

            ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No </th>
                            <th scope="col">Dokumentasi</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Exercise</th>
                            <th scope="col">Kalori</th>
                            <th scope="col">Frekuensi</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($result as $row) {

                            ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td>
                                <div style="width: 90px">
                                    <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                </div>
                            </td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['exercise'] ?></td>
                            <td><?php echo $row['kalori'] ?></td>
                            <td><?php echo $row['frekuensi'] ?></td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i
                                            class="bi bi-trash3"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>