<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Koleksi Perpustakaan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <form>
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
                                                value="{{ $koleksi->buku_pelajaran_judul }}">
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
                                                value="{{ $koleksi->buku_pelajaran_eksemplar }}">
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
                                                value="{{ $koleksi->buku_panduan_judul }}">
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
                                                value="{{ $koleksi->buku_panduan_eksemplar }}">
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
                                                width="50px" placeholder="0" value="{{ $koleksi->buku_fiksi_judul }}">
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
                                                value="{{ $koleksi->buku_fiksi_eksemplar }}">
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
                                                value="{{ $koleksi->buku_non_fiksi_judul }}">
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
                                                value="{{ $koleksi->non_fiksi_eksemplar }}">
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
                                                value="{{ $koleksi->buku_referensi_judul }}">
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
                                                value="{{ $koleksi->buku_referensi_eksemplar }}">
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
                                                value="{{ $koleksi->karya_guru_judul }}">
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
                                                value="{{ $koleksi->karya_guru_eksempla }}">
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
                                                value="{{ $koleksi->karya_siswa_judul }}">
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
                                                value="{{ $koleksi->karya_siswa_eksemplar }}">
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
                                                value="{{ $koleksi->koran_judul }}">
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
                                                value="{{ $koleksi->koran_eksemplar }}">
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
                                                value="{{ $koleksi->majalah_judul }}">
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
                                                value="{{ $koleksi->majalah_eksemplar }}">
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
                                                width="50px" placeholder="0" value="{{ $koleksi->kaset }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">CD</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="cd"
                                                width="50px" placeholder="0" value="{{ $koleksi->cd }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">VCD</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="vcd"
                                                width="50px" placeholder="0" value="{{ $koleksi->vcd }}">
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
                                                width="50px" placeholder="0" value="{{ $koleksi->dvd }}">
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
                                                value="{{ $koleksi->multimedia_lain }}">
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
                                                width="50px" placeholder="0" value="{{ $koleksi->atlas }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Peta</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="peta"
                                                width="50px" placeholder="0" value="{{ $koleksi->peta }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Globe</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="globe"
                                                width="50px" placeholder="0" value="{{ $koleksi->globe }}">
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
                                                value="{{ $koleksi->karto_lain }}">
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
                                                value="{{ $koleksi->peraga_matematika }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">IPA</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="peraga-ipa" width="50px" placeholder="0"
                                                value="{{ $koleksi->peraga_ipa }}">
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
                                                value="{{ $koleksi->peraga_lain }}">
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
