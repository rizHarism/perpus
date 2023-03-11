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
        $('#filter-source').on('submit', (e) => {
            e.preventDefault()
            var year1 = $('#year-1').val();
            var year2 = $('#year-2').val();
            var years = [year1, year2];
            var url = "{{ route('collectionSourceFilter', ':years') }}";
            url = url.replace(':years', years)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    $('#card-header').html('');
                    $('#card-header').html(data.title);

                    let dataJudul = [];
                    let labelJudul = [];
                    let dataEks = [];
                    let labelEks = [];

                    function setDataJudul(arr) {
                        $.each(arr, function(i, d) {
                            dataJudul.push(d.total);
                            labelJudul.push(d.Name);
                        });
                    };

                    function setDataEks(arr) {
                        $.each(arr, function(i, d) {
                            dataEks.push(d.total);
                            labelEks.push(d.Name);
                        });
                    };

                    setDataJudul(data.result_judul)
                    setDataEks(data.result_eks)

                    console.log(data.result_judul)

                    const newDataJudul = {
                        labels: labelJudul,
                        datasets: [{
                            label: '# Jumlah',
                            data: dataJudul,
                            backgroundColor: [
                                'rgba(255, 127, 14, 0.7)',
                                'rgba(44, 160, 44, 0.7)',
                                'rgba(31, 119, 180, 0.7)',
                                'rgba(148, 103, 189, 0.7)',
                                'rgba(127, 127, 127, 0.7)',
                                'rgba(140, 86, 75, 0.7)',
                                'rgba(188, 189, 34, 0.7)',
                                'rgba(227, 119, 194, 0.7)',
                                'rgba(23, 190, 207, 0.7)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }]
                    };

                    const newDataEks = {
                        labels: labelEks,
                        datasets: [{
                            label: '# Jumlah',
                            data: dataEks,
                            backgroundColor: [
                                'rgba(255, 127, 14, 0.7)',
                                'rgba(44, 160, 44, 0.7)',
                                'rgba(31, 119, 180, 0.7)',
                                'rgba(148, 103, 189, 0.7)',
                                'rgba(127, 127, 127, 0.7)',
                                'rgba(140, 86, 75, 0.7)',
                                'rgba(188, 189, 34, 0.7)',
                                'rgba(227, 119, 194, 0.7)',
                                'rgba(23, 190, 207, 0.7)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }]
                    };

                    judulChart.data = newDataJudul
                    eksChart.data = newDataEks
                    judulChart.update()
                    eksChart.update()
                }
            });
        });


        //setting data chart Sumber koleksi
        Chart.register(ChartDataLabels);

        let arrayJudul = {!! json_encode($result_judul) !!};
        let arrayEks = {!! json_encode($result_eks) !!};
        let dataJudul = [];
        let labelJudul = [];
        let dataEks = [];
        let labelEks = [];

        function setDataJudul(arr) {
            $.each(arr, function(i, d) {
                dataJudul.push(d.total);
                labelJudul.push(d.Name);
            });
        };
        setDataJudul(arrayJudul)

        function setDataEks(arr) {
            $.each(arr, function(i, d) {
                dataEks.push(d.total);
                labelEks.push(d.Name);
            });
        };
        setDataEks(arrayEks)

        // setup blog Judul
        const dataSetupJudul = {
            labels: labelJudul,
            datasets: [{
                label: '# Jumlah',
                data: dataJudul,
                backgroundColor: [
                    'rgba(255, 127, 14, 0.7)',
                    'rgba(44, 160, 44, 0.7)',
                    'rgba(31, 119, 180, 0.7)',
                    'rgba(214, 39, 40, 0.7)',
                    'rgba(148, 103, 189, 0.7)',
                    'rgba(127, 127, 127, 0.7)',
                    'rgba(140, 86, 75, 0.7)',
                    'rgba(188, 189, 34, 0.7)',
                    'rgba(227, 119, 194, 0.7)',
                    'rgba(23, 190, 207, 0.7)',
                ],
                borderColor: [
                    '#FFFFFF',
                ],
                borderWidth: 1
            }]
        };

        // setup blog Eks
        const dataSetupEks = {
            labels: labelEks,
            datasets: [{
                label: '# Jumlah',
                data: dataEks,
                backgroundColor: [
                    'rgba(255, 127, 14, 0.7)',
                    'rgba(44, 160, 44, 0.7)',
                    'rgba(31, 119, 180, 0.7)',
                    'rgba(214, 39, 40, 0.7)',
                    'rgba(148, 103, 189, 0.7)',
                    'rgba(127, 127, 127, 0.7)',
                    'rgba(140, 86, 75, 0.7)',
                    'rgba(188, 189, 34, 0.7)',
                    'rgba(227, 119, 194, 0.7)',
                    'rgba(23, 190, 207, 0.7)',
                ],
                borderColor: [
                    '#FFFFFF',
                ],
                borderWidth: 1
            }]
        };

        // setup config Judul
        const configSetupJudul = {
            type: 'pie',
            data: dataSetupJudul,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
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
                        text: 'Data Sumber Koleksi Berdasarkan Jumlah Judul',
                        display: true,
                    }
                }
            },
        };

        // setup config Eks
        const configSetupEks = {
            type: 'pie',
            data: dataSetupEks,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
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
                        text: 'Data Sumber Koleksi Berdasarkan Jumlah Eksemplar',
                        display: true,
                    }
                }
            },
        };

        // render block

        const judulChart = new Chart(
            $('#sumber-judul'),
            configSetupJudul
        );


        const eksChart = new Chart(
            $('#sumber-eks'),
            configSetupEks
        );
    })
</script>
