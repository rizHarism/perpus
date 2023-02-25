<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Layanan Perpustakaan</h5>
                {{ $layanan->hari_akhir }}
            </div>
            <div class="card-body">
                <div class="container">
                    <form>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Sistem Layanan
                                Perpustakaan
                            </label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="layanan-radio" id="layanan"
                                        value="terbuka" {{ $layanan->sistem_layanan == 'terbuka' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="layanan">Terbuka</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="layanan-radio" id="layanan2"
                                        value="tertutup" {{ $layanan->sistem_layanan == 'tertutup' ? 'checked' : '' }}>
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
                                        <select class="custom-select custom-select-sm">
                                            <option selected>Pilih Hari </option>
                                            <option value="senin"
                                                {{ $layanan->hari_awal == 'senin' ? 'selected' : '' }}>Senin</option>
                                            <option value="selasa"
                                                {{ $layanan->hari_awal == 'selasa' ? 'selected' : '' }}>Selasa</option>
                                            <option value="rabu"
                                                {{ $layanan->hari_awal == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                            <option value="kamis"
                                                {{ $layanan->hari_awal == 'kamis' ? 'selected' : '' }}>Kamis</option>
                                            <option value="jumat"
                                                {{ $layanan->hari_awal == 'jumat' ? 'selected' : '' }}>Jum'at</option>
                                            <option value="sabtu"
                                                {{ $layanan->hari_awal == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                                        </select>
                                    </div>
                                    s/d
                                    <div class="col-sm-3">
                                        <select class="custom-select custom-select-sm">
                                            <option selected>Pilih Hari </option>
                                            <option value="senin"
                                                {{ $layanan->hari_akhir == 'senin' ? 'selected' : '' }}>Senin</option>
                                            <option value="selasa"
                                                {{ $layanan->hari_akhir == 'selasa' ? 'selected' : '' }}>Selasa
                                            </option>
                                            <option value="rabu"
                                                {{ $layanan->hari_akhir == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                            <option value="kamis"
                                                {{ $layanan->hari_akhir == 'kamis' ? 'selected' : '' }}>Kamis</option>
                                            <option value="jumat"
                                                {{ $layanan->hari_akhir == 'jumat' ? 'selected' : '' }}>Jum'at</option>
                                            <option value="sabtu"
                                                {{ $layanan->hari_akhir == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        <select class="custom-select custom-select-sm">
                                            <option>Pilih Jam </option>
                                            <option value="07.00"
                                                {{ $layanan->jam_buka == '07.00' ? 'selected' : '' }}>07.00</option>
                                            <option value="08.00"
                                                {{ $layanan->jam_buka == '08.00' ? 'selected' : '' }}>08.00</option>
                                            <option value="09.00"
                                                {{ $layanan->jam_buka == '09.00' ? 'selected' : '' }}>09.00</option>
                                            <option value="10.00"
                                                {{ $layanan->jam_buka == '10.00' ? 'selected' : '' }}>10.00</option>
                                            <option value="11.00"
                                                {{ $layanan->jam_buka == '11.00' ? 'selected' : '' }}>11.00</option>
                                            <option value="12.00"
                                                {{ $layanan->jam_buka == '12.00' ? 'selected' : '' }}>12.00</option>
                                            <option value="13.00"
                                                {{ $layanan->jam_buka == '13.00' ? 'selected' : '' }}>13.00</option>
                                            <option value="14.00"
                                                {{ $layanan->jam_buka == '14.00' ? 'selected' : '' }}>14.00</option>
                                            <option value="15.00"
                                                {{ $layanan->jam_buka == '15.00' ? 'selected' : '' }}>15.00</option>
                                            <option value="16.00"
                                                {{ $layanan->jam_buka == '16.00' ? 'selected' : '' }}>16.00</option>
                                            <option value="17.00"
                                                {{ $layanan->jam_buka == '17.00' ? 'selected' : '' }}>17.00</option>
                                        </select>
                                    </div>
                                    s/d
                                    <div class="col-sm-3">
                                        <select class="custom-select custom-select-sm">
                                            <option>Pilih Jam </option>
                                            <option value="07.00"
                                                {{ $layanan->jam_tutup == '07.00' ? 'selected' : '' }}>07.00</option>
                                            <option value="08.00"
                                                {{ $layanan->jam_tutup == '08.00' ? 'selected' : '' }}>08.00</option>
                                            <option value="09.00"
                                                {{ $layanan->jam_tutup == '09.00' ? 'selected' : '' }}>09.00</option>
                                            <option value="10.00"
                                                {{ $layanan->jam_tutup == '10.00' ? 'selected' : '' }}>10.00</option>
                                            <option value="11.00"
                                                {{ $layanan->jam_tutup == '11.00' ? 'selected' : '' }}>11.00</option>
                                            <option value="12.00"
                                                {{ $layanan->jam_tutup == '12.00' ? 'selected' : '' }}>12.00</option>
                                            <option value="13.00"
                                                {{ $layanan->jam_tutup == '13.00' ? 'selected' : '' }}>13.00</option>
                                            <option value="14.00"
                                                {{ $layanan->jam_tutup == '14.00' ? 'selected' : '' }}>14.00</option>
                                            <option value="15.00"
                                                {{ $layanan->jam_tutup == '15.00' ? 'selected' : '' }}>15.00</option>
                                            <option value="16.00"
                                                {{ $layanan->jam_tutup == '16.00' ? 'selected' : '' }}>16.00</option>
                                            <option value="17.00"
                                                {{ $layanan->jam_tutup == '17.00' ? 'selected' : '' }}>17.00</option>
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
                                                value="{{ $layanan->pengunjung_siswa_laki }}">
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
                                                value="{{ $layanan->pengunjung_siswa_perempuan }}">
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
                                                value="{{ $layanan->pengunjung_guru_laki }}">
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
                                                value="{{ $layanan->pengunjung_guru_perempuan }}">
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
                                                value="{{ $layanan->peminjam_siswa_laki }}">
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
                                                value="{{ $layanan->peminjam_siswa_perempuan }}">
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
                                                value="{{ $layanan->peminjam_guru_laki }}">
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
                                                value="{{ $layanan->peminjam_guru_perempuan }}">
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
                                                id="koleksi-trbaca-judul" width="50px" placeholder="0"
                                                value="{{ $layanan->koleksi_terbaca_judul }}">
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
                                                value="{{ $layanan->koleksi_terbaca_eksemplar }}">
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
                                                value="{{ $layanan->koleksi_terpinjam_judul }}">
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
                                                value="{{ $layanan->koleksi_terpinjam_eksemplar }}">
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
