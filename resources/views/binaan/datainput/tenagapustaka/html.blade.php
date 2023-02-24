<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Data Tenaga Perpustakaan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status Pegawai</th>
                                <th scope="col">Status Pendidikan</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col" colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenaga as $tenaga)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $tenaga->nama }}</td>
                                    <td>{{ $tenaga->status_pegawai }}</td>
                                    <td>{{ $tenaga->status_pendidikan }}</td>
                                    <td>{{ $tenaga->jenis_kelamin }}</td>
                                    <td>{{ $tenaga->nama }}</td>
                                    <td>{{ $tenaga->nama }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#add-pustakawan">+
                                Pustakawan</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="add-pustakawan" tabindex="-1" role="dialog" aria-labelledby="add-pustakawan"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pustakawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="npp" class="col-sm-4 col-form-label col-form-label-sm">Nama Lengkap
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" id="npp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="npp" class="col-sm-4 col-form-label col-form-label-sm">Status Pegawai
                    </label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm">
                            <option>PNS</option>
                            <option>PTT</option>
                            <option>Honorer</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="npp" class="col-sm-4 col-form-label col-form-label-sm">Status Pendidikan
                    </label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm">
                            <option>Sarjana</option>
                            <option>DIII/DII</option>
                            <option>SMA</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="npp" class="col-sm-4 col-form-label col-form-label-sm">Jenis Kelamin
                    </label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
