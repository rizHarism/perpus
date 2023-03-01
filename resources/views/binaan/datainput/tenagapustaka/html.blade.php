<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Data Tenaga Pustakawan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <form id="filter" action="" method="">
                        <div class="form-group row">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            @empty($kondisi_umum)
                                <div class="col-sm-3 row">
                                    <label class="inline" for="">Nama Sekolah :</label>
                                    <select class="custom-select custom-select-sm mb-3" name="" id="list-sekolah">
                                        @foreach ($perpustakaan as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_sekolah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endempty
                            <div class="col-sm-3">
                                <label class="inline" for="">Tahun :</label>
                                <select class="custom-select custom-select-sm mb-3" name="year" id="tahun">
                                    @for ($i = date('Y'); $i > 2010; $i--)
                                        "<option value="{{ $i }}">{{ $i }}</option>";
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="inline" for="">&nbsp;</label>
                                <br>
                                <button class="btn btn-primary btn-sm" id="cari">🔎 Data</button>
                            </div>
                            <div class="col-sm-2">
                                <label class="inline" for="">&nbsp;</label>
                                <br>
                                <button class="btn btn-success btn-sm" id="tambah">➕ Data</button>
                            </div>
                        </div>
                    </form>
                    <div id="table" class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status Pegawai</th>
                                    <th scope="col">Status Pendidikan</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col" colspan="2">aksi</th>
                                    {{-- <th><i id="coba" class="fa fa-pencil"></i></th> --}}
                                    {{-- <th scope="col" colspan="2">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody id="data-tenaga">
                                {{-- get data dari js --}}
                            </tbody>
                        </table>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <button class="btn btn-primary" id="tambah-tenaga">+
                                    Pustakawan</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pustakawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form">
                    <div class="form-group row">
                        <label for="npp" class="col-sm-4 col-form-label col-form-label-sm">Nama Lengkap
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="nama-form">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npp" class="col-sm-4 col-form-label col-form-label-sm">Status Pegawai
                        </label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="pegawai-form">
                                <option value="PNS">PNS</option>
                                <option value="PTT/GTT">PTT/GTT</option>
                                <option value="Honorer">Honorer</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npp" class="col-sm-4 col-form-label col-form-label-sm">Status Pendidikan
                        </label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="pendidikan-form">
                                <option value="Sarjana">Sarjana</option>
                                <option value="DIII/DII">DIII/DII</option>
                                <option value="SMA">SMA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npp" class="col-sm-4 col-form-label col-form-label-sm">Jenis Kelamin
                        </label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" id="kelamin-form">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>
