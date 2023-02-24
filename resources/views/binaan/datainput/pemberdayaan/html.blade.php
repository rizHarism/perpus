<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Pemberdayaan Perpustakaan</h5>
            </div>
            <div class="card-body">
                <div class="container">
                    <form>
                        <div class="form-group row">
                            <label for="slogan" class="col-sm-3 col-form-label col-form-label-sm">Pengisian
                                Slogan Perpustakaan
                            </label>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" id="slogan"
                                            width="50px" value="{{ $pemberdayaan->slogan }}"
                                            {{ $pemberdayaan->status == '1' ? 'disabled' : '' }}>
                                    </div>
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
                            <label for="sk-pendirian" class="col-sm-3 col-form-label col-form-label-sm">Program Kerja
                            </label>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="leaflet"
                                                {{ $pemberdayaan->program_leaflet == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="leaflet">
                                                Leaflet
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="penyuluhan"
                                                {{ $pemberdayaan->program_penyuluhan == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="penyuluhan">
                                                Penyuluhan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="banner"
                                                {{ $pemberdayaan->program_banner == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="banner">
                                                Banner
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="pameran"
                                                {{ $pemberdayaan->program_pameran == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="pameran">
                                                Pameran
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="brosur"
                                                {{ $pemberdayaan->program_brosur == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="brosur">
                                                Brosur
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="lomba"
                                                {{ $pemberdayaan->program_lomba == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="lomba">
                                                Lomba
                                            </label>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="lain">
                                            <label class="form-check-label" for="lain">
                                                Lainnya
                                            </label>
                                        </div> --}}
                                    </div>
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
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Pengunjung per
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
                            <label for="sumber-bos" class="col-sm-3 col-form-label col-form-label-sm">Sumber
                                Anggaran
                            </label>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="bos" {{ $pemberdayaan->sumber_bos == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="bos">
                                                BOS
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="apbd"
                                                {{ $pemberdayaan->sumber_apbd == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="apbd">
                                                APBD
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="sumber-lain"
                                                {{ $pemberdayaan->sumber_lainnya == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="sumber-lain">
                                                Sumber Lain
                                            </label>
                                        </div>
                                    </div>
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
                            <label for="sk-pendirian" class="col-sm-3 col-form-label col-form-label-sm">Alokasi
                                Anggaran
                            </label>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="pelajaran"
                                                {{ $pemberdayaan->alokasi_pelajaran == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="bos">
                                                Buku Teks Pelajaran
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="pengayaan"
                                                {{ $pemberdayaan->alokasi_pengayaan == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="apbd">
                                                Buku Pengayaan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="alokasi-lain"
                                                {{ $pemberdayaan->alokasi_lainnya == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="sumber-lain">
                                                Alokasi Lain
                                            </label>
                                        </div>
                                    </div>
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
                            <label for="visi-misi" class="col-sm-3 col-form-label col-form-label-sm">Penambahan Buku
                                per Tahun
                            </label>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm"
                                            id="penambahan-buku" width="50px"
                                            value="{{ $pemberdayaan->penambahan_buku }}">
                                    </div>
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
