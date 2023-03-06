<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header h6" id="card-header">{{ $message }}</div>
            <div class="card-body">
                <div class="container">
                    <form id="filter-peminjam">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="exampleInputEmail1">Lokasi Perpustakaan</label>
                                        <div class="row">
                                            <div class="col-12">
                                                <select class="custom-select custom-select-sm mb-3" id="lokasi">
                                                    <option value="0">Semua Lokasi</option>
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
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="member-total">{{ $memberLoan }}</h3>
                                    <p>Total Pemustaka</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="member-blitar">{{ $memberLoanBlitar }}</h3>
                                    <p>Pemustaka Blitar Kota</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="member-nonblitar">{{ $memberLoanNonBlitar }}</h3>
                                    <p>Pemustaka Luar Blitar Kota</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="member-male">{{ $memberLoanMale }}</h3>
                                    <p>Pemustaka Pria</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="member-female">{{ $memberLoanFemale }}</h3>
                                    <p>Pemustaka Wanita</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card mx-auto" style="width: 70vh;">
                        <p class=" mt-2 text-center">Chart</p>
                        <div class="card-body">
                            <canvas id="pemustaka-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
