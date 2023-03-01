<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Pemberdayaan Perpustakaan</h5>
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
                                <th style="width: 30%">Jumlah Slogan Perpustakaan</th>
                                <td style="width: 2%">:</td>
                                <td id="slogan"></td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Program Kerja</th>
                                <td style="width: 2%">:</td>
                                <td id="program">
                                    <div class="row ml-3">
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="leaflet">
                                            <label class="form-check-label" for="leaflet">
                                                Leaflet
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="penyuluhan">
                                            <label class="form-check-label" for="penyuluhan">
                                                Penyuluhan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="banner">
                                            <label class="form-check-label" for="banner">
                                                Banner
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="pameran">
                                            <label class="form-check-label" for="pameran">
                                                Pameran
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="brosur">
                                            <label class="form-check-label" for="brosur">
                                                Brosur
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="lomba">
                                            <label class="form-check-label" for="lomba">
                                                Lomba
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Pengunjung per Hari(%)</th>
                                <td style="width: 2%">:</td>
                                <td id="pengunjung"></td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Sumber Anggaran</th>
                                <td style="width: 2%">:</td>
                                <td id="sumber">
                                    <div class="row ml-3">
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="bos">
                                            <label class="form-check-label" for="bos">
                                                BOS
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="apbd">
                                            <label class="form-check-label" for="apbd">
                                                APBD
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="sumber-lain">
                                            <label class="form-check-label" for="sumber-lain">
                                                Sumber Lain
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Alokasi Anggaran</th>
                                <td style="width: 2%">:</td>
                                <td id="alokasi">
                                    <div class="row ml-3">
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="pelajaran">
                                            <label class="form-check-label" for="pelajaran">
                                                Buku Teks Pelajaran
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="pengayaan">
                                            <label class="form-check-label" for="pengayaan">
                                                Buku Pengayaan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="alokasi">
                                            <label class="form-check-label" for="alokasi">
                                                Alokasi Lain
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Penambahan Buku Per Tahun</th>
                                <td style="width: 2%">:</td>
                                <td id="penambahan"></td>
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
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form">
                    <div class="form-group row" id="skul-form">
                        <label for="npp" class="col-sm-5 col-form-label col-form-label-sm">Nama Sekolah
                        </label>
                        <div class="col-sm-5">
                            <select class="custom-select custom-select" name="year" id="sekolah">
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row" id="tahun-form">
                        <label for="npp" class="col-sm-5 col-form-label col-form-label-sm">Tahun Kegiatan
                        </label>
                        <div class="col-sm-5">
                            <select class="custom-select custom-select" name="year" id="year">
                                @for ($i = date('Y'); $i > 2010; $i--)
                                    "<option value="{{ $i }}">{{ $i }}</option>";
                                @endfor
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="slogan-form" class="col-sm-5 col-form-label col-form-label-sm">Jumlah
                            Slogan Perpustakaan
                        </label>
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" id="slogan-form"
                                        width="50px" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="sk-pendirian" class="col-sm-5 col-form-label col-form-label-sm">Program Kerja
                        </label>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="leaflet-form">
                                        <label class="form-check-label" for="leaflet-form">
                                            Leaflet
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="penyuluhan-form">
                                        <label class="form-check-label" for="penyuluhan-form">
                                            Penyuluhan
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="banner-form">
                                        <label class="form-check-label" for="banner-form">
                                            Banner
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="pameran-form">
                                        <label class="form-check-label" for="pameran-form">
                                            Pameran
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="brosur-form">
                                        <label class="form-check-label" for="brosur-form">
                                            Brosur
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="lomba-form">
                                        <label class="form-check-label" for="lomba-form">
                                            Lomba
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="visi-misi" class="col-sm-5 col-form-label col-form-label-sm">Pengunjung per
                            hari (%)
                        </label>
                        <div class="col-sm-5">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radio-pengunjung"
                                    id="buku-pengunjung-tertib" value="1">
                                <label class="form-check-label" for="buku-pengunjung-tertib">Diatas 5%</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radio-pengunjung"
                                    id="buku-pengunjung-tidaktertib" value="0">
                                <label class="form-check-label" for="buku-pengunjung-tidaktertib">Dibawah
                                    5%</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="sumber-bos" class="col-sm-5 col-form-label col-form-label-sm">Sumber
                            Anggaran
                        </label>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="bos-form">
                                        <label class="form-check-label" for="bos-form">
                                            BOS
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="apbd-form">
                                        <label class="form-check-label" for="apbd-form">
                                            APBD
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="sumber-form">
                                        <label class="form-check-label" for="sumber-form">
                                            Sumber Lain
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="sk-pendirian" class="col-sm-5 col-form-label col-form-label-sm">Alokasi
                            Anggaran
                        </label>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="pelajaran-form">
                                        <label class="form-check-label" for="pelajaran-form">
                                            Buku Teks Pelajaran
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="pengayaan-form">
                                        <label class="form-check-label" for="pengayaan-form">
                                            Buku Pengayaan
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="alokasi-form">
                                        <label class="form-check-label" for="alokasi-form">
                                            Alokasi Lain
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="visi-misi" class="col-sm-5 col-form-label col-form-label-sm">Penambahan Buku
                            per Tahun
                        </label>
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" id="penambahan-form"
                                        width="50px" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpan">Simpan </button>
                </div>
            </div>
        </div>
    </div>
</div>
