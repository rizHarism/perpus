<script>
    var urlw = window.location;
    $(document).ready(function() {
        // for sidebar menu entirely but not cover treeview
        $('ul.nav-sidebar a').filter(function() {
            return this.href == urlw;
        }).addClass('active');

        // for treeview
        $('ul.nav-treeview a').filter(function() {
            return this.href == urlw;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
    })
</script>

<script>
    $(document).ready(function() {

        // Filter catalog berdasarkan range tahun terbit
        $('#filter-lokasi').on('submit', (e) => {
            e.preventDefault()
            var year1 = $('#year-1').val();
            var year2 = $('#year-2').val();
            var years = [year1, year2];
            var url = "{{ route('collectionLocationFilter', ':years') }}";
            url = url.replace(':years', years)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    $('#card-header').html(data.title)
                    let dataJudul = [];
                    let labelJudul = [];
                    let dataEks = [];
                    let labelEks = [];
                    $.each(data.judul, function(i, data) {
                        // do your stuf
                        dataJudul.push(data.total);
                        labelJudul.push(data.Name);
                    });
                    $.each(data.eksemplar, function(i, data) {
                        // do your stuf
                        dataEks.push(data.total);
                        labelEks.push(data.Name);
                    });

                    // setup blog
                    const newDataJudulSetup = {
                        labels: labelJudul,
                        datasets: [{
                            label: '# Jumlah',
                            data: dataJudul,
                            backgroundColor: [
                                'rgba(0, 191, 255, 0.7)',
                                'rgba(34, 139, 34, 0.7)',
                                'rgba(218, 165, 32, 0.7)',
                                'rgba(255, 105, 180, 0.7)',
                                'rgba(75, 0, 130, 0.7)',
                                'rgba(230, 230, 250, 0.7)',
                                'rgba(107, 142, 35, 0.7)',
                                'rgba(152, 251, 152, 0.7)',
                                'rgba(188, 143, 143, 0.7)',
                                'rgba(160, 82, 45, 0.7)',
                                'rgba(70, 130, 180, 0.7)',
                                'rgba(255, 99, 71, 0.7)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }]
                    };

                    const newDataEksSetup = {
                        labels: labelEks,
                        datasets: [{
                            label: '# Jumlah',
                            data: dataEks,
                            backgroundColor: [
                                'rgba(0, 191, 255, 0.7)',
                                'rgba(34, 139, 34, 0.7)',
                                'rgba(218, 165, 32, 0.7)',
                                'rgba(255, 105, 180, 0.7)',
                                'rgba(75, 0, 130, 0.7)',
                                'rgba(230, 230, 250, 0.7)',
                                'rgba(107, 142, 35, 0.7)',
                                'rgba(152, 251, 152, 0.7)',
                                'rgba(188, 143, 143, 0.7)',
                                'rgba(160, 82, 45, 0.7)',
                                'rgba(70, 130, 180, 0.7)',
                                'rgba(255, 99, 71, 0.7)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }]
                    };

                    chartJudul.data = newDataJudulSetup
                    chartEks.data = newDataEksSetup
                    chartJudul.update()
                    chartEks.update()

                }
            });
        });

        //setting data chart lokasi koleksi

        Chart.register(ChartDataLabels)

        let arrayJudul = {!! json_encode($judul) !!};
        let arrayEks = {!! json_encode($eksemplar) !!};

        let dataJudul = [];
        let labelJudul = [];
        let dataEks = [];
        let labelEks = [];
        $.each(arrayJudul, function(i, data) {
            // do your stuf
            dataJudul.push(data.total);
            labelJudul.push(data.Name);
        });
        $.each(arrayEks, function(i, data) {
            // do your stuf
            dataEks.push(data.total);
            labelEks.push(data.Name);
        });

        // setup blog
        const dataJudulSetup = {
            labels: labelJudul,
            datasets: [{
                label: '# Jumlah',
                data: dataJudul,
                backgroundColor: [
                    'rgba(0, 191, 255, 0.7)',
                    'rgba(34, 139, 34, 0.7)',
                    'rgba(218, 165, 32, 0.7)',
                    'rgba(255, 105, 180, 0.7)',
                    'rgba(75, 0, 130, 0.7)',
                    'rgba(230, 230, 250, 0.7)',
                    'rgba(107, 142, 35, 0.7)',
                    'rgba(152, 251, 152, 0.7)',
                    'rgba(188, 143, 143, 0.7)',
                    'rgba(160, 82, 45, 0.7)',
                    'rgba(70, 130, 180, 0.7)',
                    'rgba(255, 99, 71, 0.7)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        };

        const dataEksSetup = {
            labels: labelEks,
            datasets: [{
                label: '# Jumlah',
                data: dataEks,
                backgroundColor: [
                    'rgba(0, 191, 255, 0.7)',
                    'rgba(34, 139, 34, 0.7)',
                    'rgba(218, 165, 32, 0.7)',
                    'rgba(255, 105, 180, 0.7)',
                    'rgba(75, 0, 130, 0.7)',
                    'rgba(230, 230, 250, 0.7)',
                    'rgba(107, 142, 35, 0.7)',
                    'rgba(152, 251, 152, 0.7)',
                    'rgba(188, 143, 143, 0.7)',
                    'rgba(160, 82, 45, 0.7)',
                    'rgba(70, 130, 180, 0.7)',
                    'rgba(255, 99, 71, 0.7)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        };

        // setup config
        const configJudulSetup = {
            type: 'pie',
            data: dataJudulSetup,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return value + '\n' + percentage;
                            // return value;
                        },
                        anchor: 'center',
                        align: 'end',
                        textAlign: 'center',
                        labels: {
                            value: {
                                color: 'black',
                                font: {
                                    size: '10',
                                    weight: 'bold',
                                    lineHeight: '1'
                                }
                            }
                        }
                    },
                    title: {
                        text: 'Data Lokasi Koleksi Berdasarkan Jumlah Judul',
                        display: true,
                    }
                }
            }
        };

        const configEksSetup = {
            type: 'pie',
            data: dataEksSetup,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return value + '\n' + percentage;
                            // return value;
                        },
                        anchor: 'center',
                        align: 'end',
                        textAlign: 'center',
                        labels: {
                            value: {
                                color: 'black',
                                font: {
                                    size: '10',
                                    weight: 'bold',
                                    lineHeight: '1'
                                }
                            }
                        }
                    },
                    title: {
                        text: 'Data Lokasi Koleksi Berdasarkan Jumlah Eksemplar',
                        display: true,
                    }
                }
            }
        };

        // render block
        const chartJudul = new Chart(
            $('#lokasi-judul'),
            configJudulSetup
        );

        const chartEks = new Chart(
            $('#lokasi-eks'),
            configEksSetup
        );
    })
</script>
