<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 id="header-text">Pengorganisasian Bahan Pustaka</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    @if ($bahan == null)
                        <form id="filter-bahan-pustaka" action="" method="">
                            <div class="form-group row">
                                <label class="inline mt-1" for="">Nama Sekolah :</label>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <div class="col-sm-3">
                                    <select class="custom-select custom-select-sm mb-3" name="" id="list-sekolah">
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
                    <form id="pustaka-form">
                        <div class="form-group row">
                            <label for="npp" class="col-sm-3 col-form-label col-form-label-sm">Buku Pedoman Katalog
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-control-sm" id="pedoman-katalog"
                                @isset($bahan) value="{{ $bahan->pedoman_katalog }}" @endisset>
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
                                @isset($bahan) value="{{ $bahan->pedoman_klasifikasi }}" @endisset>
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
                                @isset($bahan) value="{{ $bahan->aplikasi_perpus }}" @endisset>
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
