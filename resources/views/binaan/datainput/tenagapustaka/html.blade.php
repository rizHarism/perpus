<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Data Tenaga Perpustakaan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    @if (Auth::user()->perpustakaan_id == 0)
                        <form id="filter-tenaga" action="" method="">
                            <div class="form-group row">
                                <label class="inline mt-1" for="">Nama Sekolah :</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="col-sm-3">
                                    <select class="custom-select custom-select-sm mb-3" name=""
                                        id="list-sekolah">
                                        @foreach ($perpustakaan as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_sekolah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Cari Data</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                    @endif
                    <div id="tenaga-box">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status Pegawai</th>
                                    <th scope="col">Status Pendidikan</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    {{-- <th scope="col" colspan="2">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody id="data-tenaga">
                                @forelse ($tenaga as $tenaga)
                                    <tr>
                                        <td>#</td>
                                        <td>{{ $tenaga->nama }}</td>
                                        <td>{{ $tenaga->status_pegawai }}</td>
                                        <td>{{ $tenaga->status_pendidikan }}</td>
                                        <td>{{ $tenaga->jenis_kelamin }}</td>
                                        <td>{{ $tenaga->nama }}</td>
                                        <td>{{ $tenaga->nama }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="mx-auto">Belum Ada Data Pustakawan</td>
                                    </tr>
                                @endforelse
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
