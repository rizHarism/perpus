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

        //setting data chart katalog dan koleksi
        Chart.register(ChartDataLabels);
        let katalog = {{ json_encode($catalogue) }};
        let koleksi = {{ json_encode($collection) }};
        // setup blog
        const catalogData = {
            labels: ['Judul', 'Eksemplar'],
            datasets: [{
                label: '# Jumlah',
                data: [katalog, koleksi],
                backgroundColor: [
                    'rgba(34, 105, 130, 0.8)',
                    'rgba(34, 105, 130, 0.5)',
                ],
                borderColor: [
                    'rgba(34, 105, 130, 1)',
                    'rgba(34, 105, 130, 1)',
                ],
                borderWidth: 1
            }]
        };

        const catalogDataFilter = {
            labels: ['Judul', 'Eksemplar'],
            datasets: [{
                label: '# Jumlah',
                data: [katalog, koleksi],
                backgroundColor: [
                    'rgba(214, 160, 37, 0.8)',
                    'rgba(214, 160, 37, 0.5)',
                ],
                borderColor: [
                    'rgba(214, 160, 37, 1)',
                    'rgba(214, 160, 37, 1)',
                ],
                borderWidth: 1
            }]
        };

        // setup config
        const catalogConfig = {
            type: 'bar',
            data: catalogData,
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: {
                        anchor: 'start',
                        align: 'end',
                        labels: {
                            value: {
                                color: 'black',
                                font: {
                                    size: '14',
                                    weight: 'bold'
                                }
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Perbandingan Jumlah Judul dan Eksemplar',
                        padding: {
                            bottom: 30
                        }
                    }
                },
            }
        };
        var total = {
            0: katalog,
            1: koleksi
        };
        const catalogConfigFilter = {
            type: 'bar',
            data: catalogDataFilter,
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            let i = 0;
                            // console.log(ctx)
                            let percentage = ""
                            let dataArr = [katalog, koleksi]
                            dataArr.map(data => {
                                percentage = (ctx.dataset.data[i] * 100 / data).toFixed(2);
                                // return percentage;
                                console.log(percentage)
                            });
                            i++
                            return percentage;
                        },
                        anchor: 'start',
                        align: 'end',
                        labels: {
                            value: {
                                color: 'black',
                                font: {
                                    size: '14',
                                    weight: 'bold'
                                }
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Perbandingan Jumlah Judul dan Eksemplar (Filter)',
                        padding: {
                            bottom: 30
                        }
                    }
                },
            }
        };



        // render block
        const katalogChart = new Chart(
            $('#katalog-chart'),
            catalogConfig
        );

        const katalogChartFilter = new Chart(
            $('#katalog-chart-filter'),
            catalogConfigFilter
        );

        // Filter catalog berdasarkan range tahun terbit

        $('#filter-katalog').on('submit', (e) => {
            e.preventDefault()
            var year1 = $('#year-1').val();
            var year2 = $('#year-2').val();
            var years = [year1, year2];
            var url = "{{ route('collectionCatalogueFilter', ':years') }}";
            url = url.replace(':years', years)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    // console.log(data)
                    $('#katalog').html('')
                    $('#koleksi').html('')
                    $('#card-header').html('')
                    $('#card-header').html(data.title)
                    $('#katalog').html(data.katalog)
                    $('#koleksi').html(data.koleksi)

                    const newCatalogData = {
                        labels: ['Judul', 'Eksemplar'],
                        datasets: [{
                            label: '# Jumlah',
                            data: [data.katalog, data.koleksi],
                            backgroundColor: [
                                'rgba(214, 160, 37, 0.8)',
                                'rgba(214, 160, 37, 0.5)',
                            ],
                            borderColor: [
                                'rgba(214, 160, 37, 1)',
                            ],
                            borderWidth: 1
                        }]
                    };
                    katalogChartFilter.data = newCatalogData
                    katalogChartFilter.update()
                }
            });
        })
    })
</script>
