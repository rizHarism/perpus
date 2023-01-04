<section class="content">
    @php
        // $data_chart = [$catalogue, $collection];
    @endphp
    <div class="container-fluid">
        <div class="card">
            <div class="card-header" id="card-header">{{ $message }}</div>
            <div class="card-body">
                <div class="container">
                    <form id="katalog-filter">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Lokasi Perpustakaan</label>
                                    <div class="row">
                                        <div class="col-12">
                                            <select class="custom-select custom-select-sm mb-3" id="lokasi">
                                                <option value="0" selected>Semua Lokasi</option>
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
                                    <h3 id="katalog">{{ $katalog }}</h3>
                                    <p>Katalog Terpinjam</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="koleksi">{{ $koleksi }}</h3>
                                    <p>Koleksi Terpinjam</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                        </div>
                        <canvas id="koleksi-chart" width="100" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
