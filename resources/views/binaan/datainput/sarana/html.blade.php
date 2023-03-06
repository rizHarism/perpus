<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Sarana/Prasarana Perpustakaan</h5>
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
                    <div id="table">
                        <input type="hidden" id="id-data" value="">
                        <input type="hidden" id="tahun-data" value="">
                        <table class="table" id="table-kondisi" style="width:100%">
                            <tr>
                                <th style="width: 30%">Prasarana Ruangan</th>
                                {{-- <td style="width: 2%">:</td> --}}
                                <td id="sarana">
                                    <div class="row">
                                        <div class="col-sm">Luas Ruangan : <span id="luas"></span> Meter Persegi
                                        </div>
                                    </div>
                                    <div class="row ml-2 mt-2">
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="koleksi">
                                            <label class="form-check-label" for="koleksi">
                                                Area Koleksi
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="baca">
                                            <label class="form-check-label" for="baca">
                                                Area Baca
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kerja">
                                            <label class="form-check-label" for="kerja">
                                                Area Kerja/Layanan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="multimedia">
                                            <label class="form-check-label" for="multimedia">
                                                Area Multimedia
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kebersihan">
                                            <label class="form-check-label" for="kebersihan">
                                                Kebersihan Ruangan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="kerapian">
                                            <label class="form-check-label" for="kerapian">
                                                Kerapian Ruangan
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Sarana Elektronik</th>
                                {{-- <td style="width: 2%">:</td> --}}
                                <td id="program">

                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Sarana Baca</th>
                                {{-- <td style="width: 2%">:</td> --}}
                                <td id="pengunjung"></td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Sarana Lainnya</th>
                                {{-- <td style="width: 2%">:</td> --}}
                                <td id="sumber">

                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-primary" id="edit"> Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="add-pustakawan"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="pl-5 pe-5">
                    <div class="form-group row">
                        <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Prasarana Ruangan
                        </label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="luas"
                                            width="50px" placeholder="Luas">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Luas</span>
                                        </div>
                                    </div>
                                </div>
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
                                            id="koleksi">
                                        <label class="form-check-label" for="koleksi">
                                            Area Koleksi
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="baca">
                                        <label class="form-check-label" for="baca">
                                            Area Baca
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="kerja">
                                        <label class="form-check-label" for="kerja">
                                            Area Kerja/Layanan
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="multimedia">
                                        <label class="form-check-label" for="multimedia">
                                            Area Multimedia
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="kebersihan">
                                        <label class="form-check-label" for="kebersihan">
                                            Kebersihan Ruangan
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="kerapian">
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
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="projector"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Projector</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="ac-kipas"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">AC/Kipas</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="komputer"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Komputer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="internet"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Internet</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="televisi"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Televisi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="vcd"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">VCD</span>
                                        </div>
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
                                        <input type="text" class="form-control form-control-sm" id="rak-buku"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Rak
                                                Buku</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="rak-koran"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Rak Surat
                                                Kabar</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="rak-referensi"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Rak
                                                Referensi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="rak-majalah"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Rak
                                                Majalah</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="meja-baca"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Meja
                                                Baca</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm"
                                            id="meja-sirkulasi" width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Meja
                                                Sirkulasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="meja-kerja"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Meja
                                                Kerja</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="kursi-baca"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Kursi
                                                Baca</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="kursi-kerja"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Kursi
                                                Kerja</span>
                                        </div>
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
                                        <input type="text" class="form-control form-control-sm"
                                            id="almari-katalog" width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Almari
                                                Katalog</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="loker"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Loker</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" id="mading"
                                            width="50px" placeholder="Jumlah">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Mading</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpan">Simpan </button>
                </div>
            </div>
        </div>
    </div>
</div>
