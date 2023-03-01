<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Administrasi Perpustakaan</h5>
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
                                <th style="width: 30%">Pengisian
                                    Buku Induk Perpustakaan</th>
                                <td style="width: 2%">:</td>
                                <td id="buku-induk"></td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Pengisian Buku
                                    Pengunjung</th>
                                <td style="width: 2%">:</td>
                                <td id="buku-pengunjung"></td>
                            </tr>
                            <tr>
                                <th style="width: 30%">Katalog dan Kartu
                                    Buku</th>
                                <td style="width: 2%">:</td>
                                <td id="katalog"></td>
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
                        <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Nama Sekolah
                        </label>
                        <div class="col-sm-9">
                            <select class="custom-select custom-select mb-3" name="year" id="sekolah">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="tahun-form">
                        <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Tahun Kegiatan
                        </label>
                        <div class="col-sm-9">
                            <select class="custom-select custom-select mb-3" name="year" id="year">
                                @for ($i = date('Y'); $i > 2010; $i--)
                                    "<option value="{{ $i }}">{{ $i }}</option>";
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npp" class="col-sm-5 col-form-label col-form-label-sm">Pengisian
                            Buku Induk Perpustakaan
                        </label>
                        <div class="col-sm-5">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radio-induk" id="buku-induk-tertib"
                                    value="1">
                                <label class="form-check-label" for="buku-induk-tertib">Tertib</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radio-induk"
                                    id="buku-induk-tidaktertib" value="0">
                                <label class="form-check-label" for="buku-induk-tidaktertib">Tidak Tertib</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="sk-pendirian" class="col-sm-5 col-form-label col-form-label-sm">Pengisian Buku
                            Pengunjung
                        </label>
                        <div class="col-sm-5">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radio-pengunjung"
                                    id="buku-pengunjung-tertib" value="1">
                                <label class="form-check-label" for="buku-pengunjung-tertib">Tertib</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radio-pengunjung"
                                    id="buku-pengunjung-tidaktertib" value="0">
                                <label class="form-check-label" for="buku-pengunjung-tidaktertib">Tidak
                                    Tertib</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="visi-misi" class="col-sm-5 col-form-label col-form-label-sm">Katalog dan Kartu
                            Buku
                        </label>
                        <div class="col-sm-5">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radio-katalog"
                                    id="buku-katalog-tersedia" value="1">
                                <label class="form-check-label" for="buku-katalog-tertib">Tersedia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="radio-katalog"
                                    id="buku-katalog-tidaktersedia" value="0">
                                <label class="form-check-label" for="buku-katalog-tidaktertib">Tidak
                                    Tersedia</label>
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
