<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header h6" id="card-header">{{ $message }}</div>
            <div class="card-body">
                <div class="container">
                    <form id="filter-usia">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1">Status Pustakawan</label>
                                <div class="row">
                                    <div class="col-10">
                                        <select class="custom-select custom-select-sm mb-3" id="status">
                                            <option value="0">Semua Pustakawan</option>
                                            <option value="aktif">Pustakawan Aktif</option>
                                            <option value="nonaktif">Pustakawan Non Aktif</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" id="year-filter"
                                            class="btn btn-sm btn-primary">Tampilkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="member-anak">{{ $member_anak }}</h3>
                                    <p>Pemustaka Usia 0-6</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="member-sd">{{ $member_sd }}</h3>
                                    <p>Pemustaka Usia 7-12</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="member-smp">{{ $member_smp }}</h3>
                                    <p>Pemustaka Usia 12-15</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="member-sma">{{ $member_sma }}</h3>
                                    <p>Pemustaka Usia 16-18</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="member-remaja">{{ $member_remaja }}</h3>
                                    <p>Pemustaka Usia 19-23</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="member-dewasa">{{ $member_dewasa }}</h3>
                                    <p>Pemustaka Usia 24-59</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="member-lansia">{{ $member_lansia }}</h3>
                                    <p>Pemustaka Usia 60 keatas</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
