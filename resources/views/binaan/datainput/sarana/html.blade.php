<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Sarana/Prasarana Perpustakaan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <form>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Prasarana Ruangan
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Luas</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="panjang"
                                                width="50px" placeholder="Luas" value="{{ $sarana->luas_ruangan }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Lebar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="panjang"
                                                width="50px" placeholder="Panjang">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sk-pendirian" class="col-sm-3 col-form-label col-form-label-sm">

                            </label>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="koleksi" {{ $sarana->area_koleksi == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="koleksi">
                                                Area Koleksi
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="baca" {{ $sarana->area_baca == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="baca">
                                                Area Baca
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kerja" {{ $sarana->area_kerja == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="kerja">
                                                Area Kerja/Layanan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="multimedia" {{ $sarana->area_multimedia == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="multimedia">
                                                Area Multimedia
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kebersihan" {{ $sarana->kebersihan == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="kebersihan">
                                                Kebersihan Ruangan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kerapian" {{ $sarana->kerapian == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="kerapian">
                                                Kerapian Ruangan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Sarana Elekronik
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3 ">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Projector</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="projector"
                                                width="50px" placeholder="Jumlah" value="{{ $sarana->projector }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">AC/Kipas</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="ac-kipas"
                                                width="50px" placeholder="Jumlah" value="{{ $sarana->ac_kipas }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Komputer</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="komputer"
                                                width="50px" placeholder="Jumlah" value="{{ $sarana->komputer }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Internet</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="internet"
                                                width="50px" placeholder="Jumlah" value="{{ $sarana->internet }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Televisi</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="televisi"
                                                width="50px" placeholder="Jumlah" value="{{ $sarana->televisi }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">VCD</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="vcd"
                                                width="50px" placeholder="Jumlah" value="{{ $sarana->vcd }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Sarana Baca
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3 ">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Rak
                                                    Buku</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="rak-buku"
                                                width="50px" placeholder="Jumlah" value="{{ $sarana->rak_buku }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Rak Surat
                                                    Kabar</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="rak-koran"
                                                width="50px" placeholder="Jumlah"
                                                value="{{ $sarana->rak_koran }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Rak
                                                    Referensi</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="rak-referensi" width="50px" placeholder="Jumlah"
                                                value="{{ $sarana->rak_referensi }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Rak
                                                    Majalah</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="rak-majalah" width="50px" placeholder="Jumlah"
                                                value="{{ $sarana->rak_majalah }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Meja
                                                    Baca</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="meja-baca"
                                                width="50px" placeholder="Jumlah"
                                                value="{{ $sarana->meja_baca }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Meja
                                                    Sirkulasi</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="meja-sirkulasi" width="50px" placeholder="Jumlah"
                                                value="{{ $sarana->meja_sirkulasi }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Meja
                                                    Kerja</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="meja-kerja" width="50px" placeholder="Jumlah"
                                                value="{{ $sarana->meja_kerja }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Kursi
                                                    Baca</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="kursi-baca" width="50px" placeholder="Jumlah"
                                                value="{{ $sarana->kursi_baca }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Kursi
                                                    Kerja</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="kursi-kerja" width="50px" placeholder="Jumlah"
                                                value="{{ $sarana->kursi_kerja }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Sarana Lainnya
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3 ">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Almari
                                                    Katalog</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm"
                                                id="almari-katalog" width="50px" placeholder="Jumlah"
                                                value="{{ $sarana->almari_katalog }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Loker</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="loker"
                                                width="50px" placeholder="Jumlah" value="{{ $sarana->loker }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Mading</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="mading"
                                                width="50px" placeholder="Jumlah" value="{{ $sarana->mading }}">
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
