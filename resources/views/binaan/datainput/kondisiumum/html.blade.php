<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Kondisi Umum Perpustakaan Binaan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <form>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">NPP (Nomor Pokok
                                Perpustakaan)
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="npp"
                                    value="{{ $kondisi_umum->npp }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="sk-pendirian" class="col-sm-3 col-form-label col-form-label-sm">SK Pendirian
                                Perpustakaan
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="sk-pendirian"
                                    value="{{ $kondisi_umum->sk_pendirian }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Program Kerja
                                Perpustakaan
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="visi-misi"
                                    value="{{ $kondisi_umum->program_kerja }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Visi dan Misi
                                Perpustakaan
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="visi-misi"
                                    value="{{ $kondisi_umum->visi_misi }}">
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
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Laki-Laki</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm"
                                                value="{{ $kondisi_umum->siswa_l }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Perempuan</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm"
                                                value="{{ $kondisi_umum->siswa_p }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="siswa" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Guru & Staf
                            </label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Laki-Laki</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm"
                                                value="{{ $kondisi_umum->staff_l }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Perempuan</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm"
                                                value="{{ $kondisi_umum->staff_p }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Jumlah Rombongan
                                Belajar
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control form-control-sm" id="visi-misi"
                                    value="{{ $kondisi_umum->rombongan_belajar }}">
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
