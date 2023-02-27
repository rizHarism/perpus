<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Sarana/Prasarana Perpustakaan</h5>
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
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Prasarana Ruangan
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Luas</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="luas"
                                                width="50px" placeholder="Luas"
                                                @isset($sarana) value="{{ $sarana->luas_ruangan }}" @endisset>
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
                                                id="koleksi"
                                                @isset($sarana) {{ $sarana->area_koleksi == '1' ? 'checked' : '' }} @endisset>
                                            <label class="form-check-label" for="koleksi">
                                                Area Koleksi
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="baca"
                                                @isset($sarana) {{ $sarana->area_baca == '1' ? 'checked' : '' }} @endisset>
                                            <label class="form-check-label" for="baca">
                                                Area Baca
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kerja"
                                                @isset($sarana) {{ $sarana->area_kerja == '1' ? 'checked' : '' }} @endisset>
                                            <label class="form-check-label" for="kerja">
                                                Area Kerja/Layanan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="multimedia"
                                                @isset($sarana) {{ $sarana->area_multimedia == '1' ? 'checked' : '' }} @endisset>
                                            <label class="form-check-label" for="multimedia">
                                                Area Multimedia
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kebersihan"
                                                @isset($sarana) {{ $sarana->kebersihan == '1' ? 'checked' : '' }} @endisset>
                                            <label class="form-check-label" for="kebersihan">
                                                Kebersihan Ruangan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kerapian"
                                                @isset($sarana) {{ $sarana->kerapian == '1' ? 'checked' : '' }} @endisset>
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
                                                width="50px" placeholder="Jumlah"
                                                @isset($sarana) value="{{ $sarana->projector }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">AC/Kipas</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="ac-kipas"
                                                width="50px" placeholder="Jumlah"
                                                @isset($sarana) value="{{ $sarana->ac_kipas }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Komputer</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="komputer"
                                                width="50px" placeholder="Jumlah"
                                                @isset($sarana) value="{{ $sarana->komputer }}" @endisset>
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
                                                width="50px" placeholder="Jumlah"
                                                @isset($sarana) value="{{ $sarana->internet }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Televisi</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="televisi"
                                                width="50px" placeholder="Jumlah"
                                                @isset($sarana) value="{{ $sarana->televisi }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">VCD</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="vcd"
                                                width="50px" placeholder="Jumlah"
                                                @isset($sarana) value="{{ $sarana->vcd }}" @endisset>
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
                                                width="50px" placeholder="Jumlah"
                                                @isset($sarana) value="{{ $sarana->rak_buku }}" @endisset>
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
                                                @isset($sarana) value="{{ $sarana->rak_koran }}" @endisset>
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
                                                @isset($sarana) value="{{ $sarana->rak_referensi }}" @endisset>
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
                                                @isset($sarana) value="{{ $sarana->rak_majalah }}" @endisset>
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
                                                @isset($sarana) value="{{ $sarana->meja_baca }}" @endisset>
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
                                                @isset($sarana) value="{{ $sarana->meja_sirkulasi }}" @endisset>
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
                                                @isset($sarana) value="{{ $sarana->meja_kerja }}" @endisset>
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
                                                @isset($sarana) value="{{ $sarana->kursi_baca }}" @endisset>
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
                                                @isset($sarana) value="{{ $sarana->kursi_kerja }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group
                                                row">
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
                                                @isset($sarana) value="{{ $sarana->almari_katalog }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Loker</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="loker"
                                                width="50px" placeholder="Jumlah"
                                                @isset($sarana) value="{{ $sarana->loker }}" @endisset>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Mading</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="mading"
                                                width="50px" placeholder="Jumlah"
                                                @isset($sarana) value="{{ $sarana->mading }}" @endisset>
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
