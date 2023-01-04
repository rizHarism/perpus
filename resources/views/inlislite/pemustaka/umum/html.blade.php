<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header h6" id="card-header">{{ $message }}</div>
            <div class="card-body">
                <div class="container">
                    <form id="filter-umum">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1">Status Pustakawan</label>
                                <div class="row">
                                    <div class="col-10">
                                        <select class="custom-select custom-select-sm mb-3" id="member-status">
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
                                    <h3 id="total-member">{{ $total_member }}</h3>
                                    <p>Total Pustakawan </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="member-blitar">{{ $member_blitar }}</h3>
                                    <p>Pustakawan Blitar Kota</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 id="member-nonblitar">{{ $member_non_blitar }}</h3>
                                    <p>Pustakawan Non Blitar Kota</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="member-male">{{ $member_male }}</h3>
                                    <p>Pustakawan Pria</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="member-female">{{ $member_female }}</h3>
                                    <p>Pustakawan Wanita</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
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
