<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header h6" id="card-header">{{ $message }}</div>
            <div class="card-body">
                <div class="container">
                    <form id="filter-katalog">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tahun Terbit</label>
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
                    </form>

                    {{-- <div class="row">
                        <div class="col-sm-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="katalog">{{ $catalogue }}</h3>
                                    <p>Katalog</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="koleksi">{{ $collection }}</h3>
                                    <p>Koleksi</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card mx-auto">
                                {{-- <p class=" mt-2 text-center">Chart</p> --}}
                                <div class="card-body">
                                    <canvas id="katalog-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mx-auto">
                                {{-- <p class=" mt-2 text-center">Chart</p> --}}
                                <div class="card-body">
                                    <canvas id="katalog-chart-filter"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>
