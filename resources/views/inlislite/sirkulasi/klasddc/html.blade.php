<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header h6" id="card-header">{{ $message }}</div>
            <div class="card-body">
                <div class="container">
                    <form id="filter-ddc">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Lokasi Perpustakaan</label>
                                    <div class="row">
                                        <div class="col-12">
                                            <select class="custom-select custom-select-sm mb-3" id="lokasi">
                                                <option>Semua Lokasi</option>
                                                @foreach ($location_library as $loc)
                                                    <option value="{{ $loc->ID }}">{{ $loc->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <label for="exampleInputEmail1">Range Tahun</label>
                                    <div class="row">
                                        <div class="col-2">
                                            <select class="custom-select custom-select-sm mb-3" id="year-1">
                                                @php
                                                    for ($y = 1800; $y <= date('Y'); $y++) {
                                                        echo '<option value="' . $y . '"';
                                                        echo '>' . $y . '</option>';
                                                    }
                                                @endphp
                                            </select>
                                        </div>
                                        <span class="mt-1"> S/D </span>
                                        <div class="col-2">
                                            <select class="custom-select custom-select-sm mb-3" id="year-2">
                                                @php
                                                    for ($y = 1800; $y <= date('Y'); $y++) {
                                                        echo '<option value="' . $y . '"';
                                                        if ($y == date('Y')) {
                                                            echo ' selected="selected"';
                                                        }
                                                        echo '>' . $y . '</option>';
                                                    }
                                                @endphp </select>
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" id="year-filter"
                                                class="btn btn-sm btn-primary">Tampilkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="klas0">{{ $klas0 }}</h3>
                                    <p>Klas 000-099</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="klas1">{{ $klas1 }}</h3>
                                    <p>Klas 100-199</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="klas2">{{ $klas2 }}</h3>
                                    <p>Klas 200-299</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="klas3">{{ $klas3 }}</h3>
                                    <p>Klas 300-399</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="klas4">{{ $klas4 }}</h3>
                                    <p>Klas 400-499</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="klas5">{{ $klas5 }}</h3>
                                    <p>Klas 500-599</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="klas6">{{ $klas6 }}</h3>
                                    <p>Klas 600-699</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="klas7">{{ $klas7 }}</h3>
                                    <p>Klas 700-799</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="klas8">{{ $klas8 }}</h3>
                                    <p>Klas 800-899</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="klas9">{{ $klas9 }}</h3>
                                    <p>Klas 900-999</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
