<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Layanan Perpustakaan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    @if (Auth::user()->perpustakaan_id == 0)
                        <form id="filter" action="" method="">
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
                    <form id="form">
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Sistem Layanan
                                Perpustakaan
                            </label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="layanan-radio" id="layanan"
                                        value="terbuka"
                                        @isset($layanan) {{ $layanan->sistem_layanan == 'terbuka' ? 'checked' : '' }} @endisset>
                                    <label class="form-check-label" for="layanan">Terbuka</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="layanan-radio" id="layanan2"
                                        value="tertutup"
                                        @isset($layanan) {{ $layanan->sistem_layanan == 'tertutup' ? 'checked' : '' }} @endisset>
                                    <label class="form-check-label" for="layanan2">Tertutup</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Jadwal Kerja
                                perpustakaan
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <select id="hari-awal" class="custom-select custom-select-sm">
                                            <option selected>Pilih Hari </option>
                                            <option value="senin"
                                                @isset($layanan) {{ $layanan->hari_awal == 'senin' ? 'selected' : '' }} @endisset>
                                                Senin</option>
                                            <option value="selasa"
                                                @isset($layanan) {{ $layanan->hari_awal == 'selasa' ? 'selected' : '' }} @endisset>
                                                Selasa</option>
                                            <option value="rabu"
                                                @isset($layanan) {{ $layanan->hari_awal == 'rabu' ? 'selected' : '' }} @endisset>
                                                Rabu</option>
                                            <option value="kamis"
                                                @isset($layanan) {{ $layanan->hari_awal == 'kamis' ? 'selected' : '' }} @endisset>
                                                Kamis</option>
                                            <option value="jumat"
                                                @isset($layanan) {{ $layanan->hari_awal == 'jumat' ? 'selected' : '' }} @endisset>
                                                Jum'at</option>
                                            <option value="sabtu"
                                                @isset($layanan) {{ $layanan->hari_awal == 'sabtu' ? 'selected' : '' }} @endisset>
                                                Sabtu</option>
                                        </select>
                                    </div>
                                    s/d
                                    <div class="col-sm-3">
                                        <select id="hari-akhir" class="custom-select custom-select-sm">
                                            <option selected>Pilih Hari </option>
                                            <option value="senin"
                                                @isset($layanan) {{ $layanan->hari_akhir == 'senin' ? 'selected' : '' }} @endisset>
                                                Senin</option>
                                            <option value="selasa"
                                                @isset($layanan) {{ $layanan->hari_akhir == 'selasa' ? 'selected' : '' }} @endisset>
                                                Selasa
                                            </option>
                                            <option value="rabu"
                                                @isset($layanan) {{ $layanan->hari_akhir == 'rabu' ? 'selected' : '' }} @endisset>
                                                Rabu</option>
                                            <option value="kamis"
                                                @isset($layanan) {{ $layanan->hari_akhir == 'kamis' ? 'selected' : '' }} @endisset>
                                                Kamis</option>
                                            <option value="jumat"
                                                @isset($layanan) {{ $layanan->hari_akhir == 'jumat' ? 'selected' : '' }} @endisset>
                                                Jum'at</option>
                                            <option value="sabtu"
                                                @isset($layanan) {{ $layanan->hari_akhir == 'sabtu' ? 'selected' : '' }} @endisset>
                                                Sabtu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        <select id="jam-buka" class="custom-select custom-select-sm">
                                            <option>Pilih Jam </option>
                                            <option value="07.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '07.00' ? 'selected' : '' }} @endisset>
                                                07.00</option>
                                            <option value="08.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '08.00' ? 'selected' : '' }} @endisset>
                                                08.00</option>
                                            <option value="09.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '09.00' ? 'selected' : '' }} @endisset>
                                                09.00</option>
                                            <option value="10.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '10.00' ? 'selected' : '' }} @endisset>
                                                10.00</option>
                                            <option value="11.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '11.00' ? 'selected' : '' }} @endisset>
                                                11.00</option>
                                            <option value="12.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '12.00' ? 'selected' : '' }} @endisset>
                                                12.00</option>
                                            <option value="13.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '13.00' ? 'selected' : '' }} @endisset>
                                                13.00</option>
                                            <option value="14.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '14.00' ? 'selected' : '' }} @endisset>
                                                14.00</option>
                                            <option value="15.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '15.00' ? 'selected' : '' }} @endisset>
                                                15.00</option>
                                            <option value="16.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '16.00' ? 'selected' : '' }} @endisset>
                                                16.00</option>
                                            <option value="17.00"
                                                @isset($layanan) {{ $layanan->jam_buka == '17.00' ? 'selected' : '' }} @endisset>
                                                17.00</option>
                                        </select>
                                    </div>
                                    s/d
                                    <div class="col-sm-3">
                                        <select id="jam-tutup" class="custom-select custom-select-sm">
                                            <option>Pilih Jam </option>
                                            <option value="07.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '07.00' ? 'selected' : '' }} @endisset>
                                                07.00</option>
                                            <option value="08.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '08.00' ? 'selected' : '' }} @endisset>
                                                08.00</option>
                                            <option value="09.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '09.00' ? 'selected' : '' }} @endisset>
                                                09.00</option>
                                            <option value="10.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '10.00' ? 'selected' : '' }} @endisset>
                                                10.00</option>
                                            <option value="11.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '11.00' ? 'selected' : '' }} @endisset>
                                                11.00</option>
                                            <option value="12.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '12.00' ? 'selected' : '' }} @endisset>
                                                12.00</option>
                                            <option value="13.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '13.00' ? 'selected' : '' }} @endisset>
                                                13.00</option>
                                            <option value="14.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '14.00' ? 'selected' : '' }} @endisset>
                                                14.00</option>
                                            <option value="15.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '15.00' ? 'selected' : '' }} @endisset>
                                                15.00</option>
                                            <option value="16.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '16.00' ? 'selected' : '' }} @endisset>
                                                16.00</option>
                                            <option value="17.00"
                                                @isset($layanan) {{ $layanan->jam_tutup == '17.00' ? 'selected' : '' }} @endisset>
                                                17.00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Pengunjung
                                (Siswa)
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Laki-Laki</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="pengunjung-siswa-laki" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->pengunjung_siswa_laki }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Perempuan</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="pengunjung-siswa-perempuan" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->pengunjung_siswa_perempuan }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Pengunjung
                                (Guru)
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Laki-Laki</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="pengunjung-guru-laki" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->pengunjung_guru_laki }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Perempuan</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="pengunjung-guru-perempuan" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->pengunjung_guru_perempuan }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Peminjam
                                (Siswa)
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Laki-Laki</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="peminjam-siswa-laki" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->peminjam_siswa_laki }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Perempuan</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="peminjam-siswa-perempuan" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->peminjam_siswa_perempuan }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Peminjam
                                (Guru)
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Laki-Laki</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="peminjam-guru-laki" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->peminjam_guru_laki }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Perempuan</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="peminjam-guru-perempuan" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->peminjam_guru_perempuan }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Koleksi
                                Terbaca
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="koleksi-terbaca-judul" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->koleksi_terbaca_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="koleksi-terbaca-eksemplar" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->koleksi_terbaca_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Koleksi
                                Terpinjam
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="koleksi-terpinjam-judul" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->koleksi_terpinjam_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="koleksi-terpinjam-eksemplar" width="50px" placeholder="0"
                                                @isset($layanan) value="{{ $layanan->koleksi_terpinjam_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group
                                                row">
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary"> Kirim </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
