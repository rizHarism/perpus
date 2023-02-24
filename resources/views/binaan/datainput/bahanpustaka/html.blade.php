<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Pengorganisasian Bahan Pustaka</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <form>
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Buku Pedoman Katalog
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-control-sm" id="pedoman-katalog"
                                    value="{{ $bahan->pedoman_katalog }}">
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
                            <label for="sk-pendirian" class="col-sm-3 col-form-label col-form-label-sm">Buku Pedoman
                                Klasifikasi
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-control-sm" id="pedoman-klasifikasi"
                                    value="{{ $bahan->pedoman_klasifikasi }}">
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
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Program Aplikasi
                                Perpustakaan
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-control-sm" id="aplikasi-perpus"
                                    value="{{ $bahan->aplikasi_perpus }}">
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
