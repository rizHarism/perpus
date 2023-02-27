<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Koleksi Perpustakaan</h5>
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
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Buku Teks Pelajaran
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="pelajaran-judul" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_pelajaran_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="pelajaran-eksemplar" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_pelajaran_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Buku Panduan
                                Pendidikan
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="panduan-judul" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_panduan_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="panduan-eksemplar" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_panduan_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Buku Fiksi
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="fiksi-judul"
                                                width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_fiksi_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="fiksi-eksemplar" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_fiksi_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Buku Non Fiksi
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="non-fiksi-judul" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_non_fiksi_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="non-fiksi-eksemplar" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_non_fiksi_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Buku Referensi
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="referensi-judul" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_referensi_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="referensi-eksemplar" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->buku_referensi_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Hasil Karya Guru
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="guru-judul" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->karya_guru_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="guru-eksemplar" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->karya_guru_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Hasil Karya Siswa
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="siswa-judul" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->karya_siswa_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="siswa-eksemplar" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->karya_siswa_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Surat Kabar
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="koran-judul" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->koran_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="koran-eksemplar" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->koran_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Majalah
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="majalah-judul" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->majalah_judul }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Eksemplar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="majalah-eksemplar" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->majalah_eksemplar }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Multimedia
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Kaset</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="kaset"
                                                width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->kaset }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">CD</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="cd"
                                                width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->cd }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">VCD</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="vcd"
                                                width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->vcd }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">DVD</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="dvd"
                                                width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->dvd }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Lainnya</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="multimedia-lain" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->multimedia_lain }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Bahan Kartografi
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Atlas</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="atlas"
                                                width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->atlas }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Peta</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="peta"
                                                width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->peta }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Globe</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="globe"
                                                width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->globe }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Lainnya</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="karto-lain" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->karto_lain }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Alat Peraga
                                Pendidikan
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Matematika</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="peraga-mtk" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->peraga_matematika }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">IPA</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="peraga-ipa" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->peraga_ipa }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Lainnya</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="peraga-lain" width="50px" placeholder="0"
                                                @isset($koleksi) value="{{ $koleksi->peraga_lain }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
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
