<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Administrasi Perpustakaan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <form>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Pengisian
                                Buku Induk Perpustakaan
                            </label>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="radio-induk"
                                        id="buku-induk-tertib" value="1"
                                        {{ $administrasi->buku_induk == '1' ? 'checked' : '' }}
                                        {{ $administrasi->status == '1' ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="buku-induk-tertib">Tertib</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="radio-induk"
                                        id="buku-induk-tidaktertib" value="0"
                                        {{ $administrasi->buku_induk == '0' ? 'checked' : '' }}
                                        {{ $administrasi->status == '1' ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="buku-induk-tidaktertib">Tidak Tertib</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="image-input">
                                    <a title="Upload Foto">
                                        <img id="buku-katalog"
                                            src="https://w7.pngwing.com/pngs/914/512/png-transparent-icloud-clip-cart-upload-computer-icons-computer-file-icon-drawing-upload-miscellaneous-blue-image-file-formats.png"
                                            alt="Katalog" class="rounded" style="cursor:pointer" height="30px"
                                            width="50px">
                                    </a>
                                </label>
                                <input id="image-input" type="file" style="display: none;"
                                    accept="image/png, image/jpg, image/jpeg" />
                                <span class="ml-2">Detail Foto</span>
                            </div>

                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="sk-pendirian" class="col-sm-3 col-form-label col-form-label-sm">Pengisian Buku
                                Pengunjung
                            </label>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="radio-pengunjung"
                                        id="buku-pengunjung-tertib" value="1"
                                        {{ $administrasi->buku_pengunjung == '1' ? 'checked' : '' }}
                                        {{ $administrasi->status == '1' ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="buku-pengunjung-tertib">Tertib</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="radio-pengunjung"
                                        id="buku-pengunjung-tidaktertib" value="0"
                                        {{ $administrasi->buku_pengunjung == '0' ? 'checked' : '' }}
                                        {{ $administrasi->status == '1' ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="buku-pengunjung-tidaktertib">Tidak
                                        Tertib</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="image-input">
                                    <a title="Upload Foto">
                                        <img id="buku-katalog"
                                            src="https://w7.pngwing.com/pngs/914/512/png-transparent-icloud-clip-cart-upload-computer-icons-computer-file-icon-drawing-upload-miscellaneous-blue-image-file-formats.png"
                                            alt="Katalog" class="rounded" style="cursor:pointer" height="30px"
                                            width="50px">
                                    </a>
                                </label>
                                <input id="image-input" type="file" style="display: none;"
                                    accept="image/png, image/jpg, image/jpeg" />
                                <span class="ml-2">Detail Foto</span>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Katalog dan Kartu
                                Buku
                            </label>
                            <div class="col-sm-5">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="radio-katalog"
                                        id="buku-katalog-tersedia" value="1"
                                        {{ $administrasi->katalog_kartu == '1' ? 'checked' : '' }}
                                        {{ $administrasi->status == '1' ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="buku-katalog-tertib">Tersedia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="radio-katalog"
                                        id="buku-katalog-tidaktersedia" value="0"
                                        {{ $administrasi->katalog_kartu == '0' ? 'checked' : '' }}
                                        {{ $administrasi->status == '1' ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="buku-katalog-tidaktertib">Tidak
                                        Tersedia</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="image-input">
                                    <a title="Upload Foto">
                                        <img id="buku-katalog"
                                            src="https://w7.pngwing.com/pngs/914/512/png-transparent-icloud-clip-cart-upload-computer-icons-computer-file-icon-drawing-upload-miscellaneous-blue-image-file-formats.png"
                                            alt="Katalog" class="rounded" style="cursor:pointer" height="30px"
                                            width="50px">
                                    </a>
                                </label>
                                <input id="image-input" type="file" style="display: none;"
                                    accept="image/png, image/jpg, image/jpeg" />
                                <span class="ml-2">Detail Foto</span>
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
