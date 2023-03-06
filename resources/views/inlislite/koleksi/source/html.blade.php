<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header h6" id="card-header">{{ $message }}</div>
            <div class="card-body">
                <div class="container">
                    <form id="filter-source">
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
                                            for ($y = 1900; $y <= date('Y'); $y++) {
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
                    <div class="row">
                        @php $icons = array('bg-info', 'bg-success' ); @endphp
                        @foreach ($result as $_result)
                            <div class="col-sm-6">
                                <div class="small-box {{ $icons[$loop->index] }}">
                                    <div class="inner">
                                        <h3 class='sumber-total' id="{{ $_result->Code }}">{{ $_result->total }}</h3>
                                        <p>{{ $_result->Name }}</p>
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
                    <hr>
                    <div class="card mx-auto" style="width: 70vh;">
                        <p class=" mt-2 text-center">Chart</p>
                        <div class="card-body">
                            <canvas id="sumber-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</section>
