<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content here -->
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Edit User
                </div>
                <div class="modal fade" id="exampleModal_<?php echo $ReadDS->id; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= site_url('admin/updateDataProduk')?>"
                                            onsubmit="event.preventDefault(); handleFormSubmit(this, 'Data berhasil di edit !');"
                                            method="post">
                                            <label for="id" class="form-label" z>ID User</label>
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $ReadDS->id; ?>">
                                            <div class="mb-3">
                                            <label for="name" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Nama Produk" value="<?= $ReadDS->name; ?>"required>
                                            </div>
                                            <div class="mb-3">
                                            <label for="email" class="form-label">email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Masukkan email" value="<?= $ReadDS->email; ?>"required>
                                            </div>
                                            <div class="mb-3">
                                            <label for="password" class="form-label">password</label>
                                            <input type="text" class="form-control" id="password" name="password"
                                            placeholder="Masukkan password" value="<?= $ReadDS->password; ?>"required>
                                            </div>


                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                        <!-- Akhir formulir -->
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir konten modal -->

                        <!-- </div>
                          
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-flat" id="btnSave">
                                        <i class="fa fa-paper-plane"></i> Save
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                                </div>
                                <div class="box">
                                    <div class="box-header">
                                        <div class="pull-right">
                                            <a href="<?= site_url('admin/user/index') ?>" class="btn btn-warning btn-flat">
                                                <i class="fa fa-undo"></i> Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Bootstrap core JavaScript and other scripts -->
</body>

</html>
