<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header h6" id="card-header">Data User</div>
            <div class="card-body">
                <button class="btn btn-primary tambah-data"><i class="fa fa-plus"></i> Data User</button>
                <hr>
                <table class="table table-striped" id="table-user">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Permission</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Permission</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

</section>

<div class="modal fade" id="user-modal" tabindex="-1" aria-labelledby="modal-edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="user-form" action="" method=""
                oninput="password2.setCustomValidity(password2.value != password.value ? 'Passwords tidak sama.' : '')">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="role-name" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" id="nama"
                                placeholder="Isikan Nama Pengguna" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role-name" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" id="username"
                                placeholder="Isikan Username" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="permissions" class="col-sm-3 col-form-label">Permissions</label>
                        <div class="col-sm-9 p-3">
                            <div class="form-group row p-2 border rounded" id="row-permission">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label" id="password">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password-1" value=""
                                placeholder="Isikan Password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-2" class="col-sm-3 col-form-label">Verifikasi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password2" id="password-2"
                                placeholder="Ulangi Password" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary float-right" id="user-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
