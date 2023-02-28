<section class="content" id="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Kondisi Umum Perpustakaan Binaan</h5>
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
                    <hr>
                    <div id="table">
                        <input type="hidden" id="id-data" value="">
                        <table class="table" id="table-kondisi" style="width:100%">
                            <tr>
                                <th style="width: 20%">NPP</th>
                                <td style="width: 2%">:</td>
                                <td id="npp"></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">SK Pendirian</th>
                                <td style="width: 2%">:</td>
                                <td id="sk-pendirian"></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Program Kerja</th>
                                <td style="width: 2%">:</td>
                                <td id="program-kerja"></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Visi Misi</th>
                                <td style="width: 2%">:</td>
                                <td id="visi-misi"></td>
                            </tr>
                            <tr>
                                <th class="align-middle" style="width: 20%" rowspan="2">Siswa</th>
                                <td class="align-middle" style="width: 2%" rowspan="2">:</td>
                                <td><span id="s-laki"></span> <span>Laki-laki</span></td>
                            </tr>
                            <tr>
                                <td><span id="s-perempuan"></span> <span>Perempuan</span></td>
                            </tr>
                            <tr>
                                <th class="align-middle" style="width: 20%" rowspan="2">Guru</th>
                                <td class="align-middle" style="width: 2%" rowspan="2">:</td>
                                <td><span id="g-laki"></span><span> Laki-laki</span></td>
                            </tr>
                            <tr>
                                <td></span><span id="g-perempuan"></span><span> Perempuan</span></td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Rombongan Belajar</th>
                                <td style="width: 2%">:</td>
                                <td id="rombel"></td>
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
                <form id="form" method="" action="">
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
                        <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">NPP (Nomor Pokok
                            Perpustakaan)
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="npp-form"
                                value="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="sk-pendirian" class="col-sm-3 col-form-label col-form-label-sm">SK Pendirian
                            Perpustakaan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="sk-form"
                                value="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Program Kerja
                            Perpustakaan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="program-form"
                                value="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Visi dan Misi
                            Perpustakaan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="visi-form"
                                value="">
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
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Laki-Laki</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" id="siswa-laki" value="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Perempuan</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" id="siswa-perempuan"
                                            value="">
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
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Laki-Laki</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" id="staff-laki" value="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Perempuan</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" id="staff-perempuan"
                                            value="">
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
                            <input type="text" class="form-control form-control-sm" id="rombel-form"
                                value="">
                        </div>
                    </div>
                    <hr>
                    {{-- <div class="form-group row">
                        <div class="col-sm-1">
                            <button class="btn btn-secondary" id="kembali">Kembali</button>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary" id="simpan">Simpan </button>
                        </div>
                    </div> --}}
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpan">Simpan </button>
                </div>
            </div>
        </div>
    </div>
</div>
