<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header h6" id="card-header">{{ $message }}</div>
            <div class="card-body">
                <div class="container">
                    <form id="filter-pekerjaan">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1">Status Pustakawan</label>
                                <div class="row">
                                    <div class="col-10">
                                        <select class="custom-select custom-select-sm mb-3" id="status">
                                            <option value="0">Semua Pemustaka</option>
                                            <option value="aktif">Pemustaka Aktif</option>
                                            <option value="nonaktif">Pemustaka Non Aktif</option>
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
                    <div class="row">
                        @php $icons = array('bg-info', 'bg-success' ); @endphp
                        @foreach ($result as $_result)
                            <div class="col-sm-6">
                                <div class="small-box {{ $icons[$loop->index] }}">
                                    <div class="inner">
                                        <h3 id="status-{{ $_result->id }}">{{ $_result->total }}</h3>
                                        <p>{{ $_result->Pekerjaan }}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                            </div>
                            @php
                                array_push($icons, $icons[$loop->index]);
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
