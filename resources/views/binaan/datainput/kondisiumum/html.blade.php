<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Kondisi Umum Perpustakaan Binaan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    @if ($kondisi_umum == null)
                        <form id="filter-kondisi-umum" action="" method="">
                            <div class="form-group row">
                                <label class="inline mt-1" for="">Nama Sekolah :</label>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <div class="col-sm-3">
                                    <select class="custom-select custom-select-sm mb-3" name="" id="list-sekolah">
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
                    <form id="kondisi-form">
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">NPP (Nomor Pokok
                                Perpustakaan)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="npp"
                                    @isset($kondisi_umum) value="{{ $kondisi_umum->npp }}" @endisset>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="sk-pendirian" class="col-sm-3 col-form-label col-form-label-sm">SK Pendirian
                                Perpustakaan
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="sk-pendirian"
                                    @isset($kondisi_umum) value="{{ $kondisi_umum->sk_pendirian }}" @endisset>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Program Kerja
                                Perpustakaan
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="program-kerja"
                                    @isset($kondisi_umum) value="{{ $kondisi_umum->program_kerja }}" @endisset>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Visi dan Misi
                                Perpustakaan
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="visi-misi"
                                    @isset($kondisi_umum) value="{{ $kondisi_umum->visi_misi }}" @endisset>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="siswa" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Siswa
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Laki-Laki</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm" id="siswa-laki"
                                                @isset($kondisi_umum) value="{{ $kondisi_umum->siswa_l }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Perempuan</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm" id="siswa-perempuan"
                                                @isset($kondisi_umum) value="{{ $kondisi_umum->siswa_p }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="siswa" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Guru &
                                Staf
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Laki-Laki</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm" id="staff-laki"
                                                @isset($kondisi_umum) value="{{ $kondisi_umum->staff_l }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Perempuan</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm" id="staff-perempuan"
                                                @isset($kondisi_umum) value="{{ $kondisi_umum->staff_p }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Jumlah
                                Rombongan
                                Belajar
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control form-control-sm" id="rombel"
                                    @isset($kondisi_umum) value="{{ $kondisi_umum->rombongan_belajar }}" @endisset>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            @isset($kondisi_umum)
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-primary"> Kirim </button>
                                </div>
                            @endisset
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
