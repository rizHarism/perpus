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

        $('#filter-ddc').on('submit', (e) => {
            e.preventDefault()
            var year1 = $('#year-1').val();
            var year2 = $('#year-2').val();
            var years = [year1, year2];
            var url = "{{ route('collectionKlasFilter', ':years') }}";
            url = url.replace(':years', years)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(d) {
                    let totalJudulFilter = 0;
                    let totalEksFilter = 0;
                    $.each(d.judul, function(key, value) {
                        totalJudulFilter += value
                    });
                    $.each(d.eks, function(key, value) {
                        totalEksFilter += value
                    });

                    let judulFilter = [];
                    let eksemplarFilter = [];
                    let pJudulFilter = [];
                    let pEksemplarFilter = [];
                    $.each(d.judul, function(key, value) {
                        judulFilter.push(value)
                        pJudulFilter.push(((value / totalJudulFilter) * 100)
                            .toFixed(1));
                    });
                    $.each(d.eks, function(key, value) {
                        eksemplarFilter.push(value)
                        pEksemplarFilter.push(((value / totalEksFilter) * 100)
                            .toFixed(1));
                    });

                    const judulDataFilter = {
                        labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama',
                            'Ilmu Sosial', 'Bahasa', 'Sains',
                            'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                            'Kesusastraan', 'Sejarah & Geografi'
                        ],
                        datasets: [{
                            label: 'Jumlah',
                            data: judulFilter,
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.9)',
                                'rgba(112, 169, 188, 0.9)',
                                'rgba(88, 51, 84, 0.9)',
                                'rgba(174, 199, 79, 0.9)',
                                'rgba(240, 143, 56, 0.9)',
                                'rgba(30, 137, 111, 0.9)',
                                'rgba(40, 50, 73, 0.9)',
                                'rgba(254, 202, 83, 0.9)',
                                'rgba(179, 69, 104, 0.9)',
                                'rgba(101, 63, 26, 0.9)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }]
                    };

                    judulChart.data = judulDataFilter
                    judulChart.update()

                    const eksDataFilter = {
                        labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama',
                            'Ilmu Sosial', 'Bahasa', 'Sains',
                            'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                            'Kesusastraan', 'Sejarah & Geografi'
                        ],
                        datasets: [{
                            label: 'Jumlah',
                            data: eksemplarFilter,
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.9)',
                                'rgba(112, 169, 188, 0.9)',
                                'rgba(88, 51, 84, 0.9)',
                                'rgba(174, 199, 79, 0.9)',
                                'rgba(240, 143, 56, 0.9)',
                                'rgba(30, 137, 111, 0.9)',
                                'rgba(40, 50, 73, 0.9)',
                                'rgba(254, 202, 83, 0.9)',
                                'rgba(179, 69, 104, 0.9)',
                                'rgba(101, 63, 26, 0.9)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }]
                    };

                    eksChart.data = eksDataFilter
                    eksChart.update()

                    const pJudulDataFilter = {
                        labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama',
                            'Ilmu Sosial', 'Bahasa', 'Sains',
                            'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                            'Kesusastraan', 'Sejarah & Geografi'
                        ],
                        datasets: [{
                            label: 'Data Seluruhnya',
                            data: pJudul,
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.9)',
                                'rgba(112, 169, 188, 0.9)',
                                'rgba(88, 51, 84, 0.9)',
                                'rgba(174, 199, 79, 0.9)',
                                'rgba(240, 143, 56, 0.9)',
                                'rgba(30, 137, 111, 0.9)',
                                'rgba(40, 50, 73, 0.9)',
                                'rgba(254, 202, 83, 0.9)',
                                'rgba(179, 69, 104, 0.9)',
                                'rgba(101, 63, 26, 0.9)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }, {
                            label: 'Data Filter',
                            data: pJudulFilter,
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.7)',
                                'rgba(112, 169, 188, 0.7)',
                                'rgba(88, 51, 84, 0.7)',
                                'rgba(174, 199, 79, 0.7)',
                                'rgba(240, 143, 56, 0.7)',
                                'rgba(30, 137, 111, 0.7)',
                                'rgba(40, 50, 73, 0.7)',
                                'rgba(254, 202, 83, 0.7)',
                                'rgba(179, 69, 104, 0.7)',
                                'rgba(101, 63, 26, 0.7)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }]
                    };

                    pJudulChart.data = pJudulDataFilter
                    pJudulChart.update()

                    const pEksDataFilter = {
                        labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama',
                            'Ilmu Sosial', 'Bahasa', 'Sains',
                            'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                            'Kesusastraan', 'Sejarah & Geografi'
                        ],
                        datasets: [{
                            label: 'Data Seluruhnya',
                            data: pEksemplar,
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.9)',
                                'rgba(112, 169, 188, 0.9)',
                                'rgba(88, 51, 84, 0.9)',
                                'rgba(174, 199, 79, 0.9)',
                                'rgba(240, 143, 56, 0.9)',
                                'rgba(30, 137, 111, 0.9)',
                                'rgba(40, 50, 73, 0.9)',
                                'rgba(254, 202, 83, 0.9)',
                                'rgba(179, 69, 104, 0.9)',
                                'rgba(101, 63, 26, 0.9)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }, {
                            label: 'Data Filter',
                            data: pEksemplarFilter,
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.7)',
                                'rgba(112, 169, 188, 0.7)',
                                'rgba(88, 51, 84, 0.7)',
                                'rgba(174, 199, 79, 0.7)',
                                'rgba(240, 143, 56, 0.7)',
                                'rgba(30, 137, 111, 0.7)',
                                'rgba(40, 50, 73, 0.7)',
                                'rgba(254, 202, 83, 0.7)',
                                'rgba(179, 69, 104, 0.7)',
                                'rgba(101, 63, 26, 0.7)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }]
                    };

                    pEksChart.data = pEksDataFilter
                    pEksChart.update()

                }
            });
        });

        Chart.register(ChartDataLabels);
        // setup blog
        let j = {!! json_encode($judul) !!}
        let eksemp = {!! json_encode($eks) !!}
        let judul = [];
        let eksemplar = []
        $.each(j, function(i, v) {
            judul.push(v);
        })
        $.each(eksemp, function(i, v) {
            eksemplar.push(v);
        })
        const judulData = {
            labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama', 'Ilmu Sosial', 'Bahasa', 'Sains',
                'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                'Kesusastraan', 'Sejarah & Geografi'
            ],
            datasets: [{
                label: 'Jumlah',
                data: judul,
                backgroundColor: [
                    'rgba(130, 130, 130, 0.9)',
                    'rgba(112, 169, 188, 0.9)',
                    'rgba(88, 51, 84, 0.9)',
                    'rgba(174, 199, 79, 0.9)',
                    'rgba(240, 143, 56, 0.9)',
                    'rgba(30, 137, 111, 0.9)',
                    'rgba(40, 50, 73, 0.9)',
                    'rgba(254, 202, 83, 0.9)',
                    'rgba(179, 69, 104, 0.9)',
                    'rgba(101, 63, 26, 0.9)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        };

        const eksData = {
            labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama', 'Ilmu Sosial', 'Bahasa', 'Sains',
                'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                'Kesusastraan', 'Sejarah & Geografi'
            ],
            datasets: [{
                label: 'Jumlah',
                data: eksemplar,
                backgroundColor: [
                    'rgba(130, 130, 130, 0.9)',
                    'rgba(112, 169, 188, 0.9)',
                    'rgba(88, 51, 84, 0.9)',
                    'rgba(174, 199, 79, 0.9)',
                    'rgba(240, 143, 56, 0.9)',
                    'rgba(30, 137, 111, 0.9)',
                    'rgba(40, 50, 73, 0.9)',
                    'rgba(254, 202, 83, 0.9)',
                    'rgba(179, 69, 104, 0.9)',
                    'rgba(101, 63, 26, 0.9)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        };

        // setup config
        const judulConfig = {
            type: 'pie',
            data: judulData,
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
                            return value;
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
                        display: true,
                        text: 'Data Klasifikasi Berdasarkan Jumlah Judul',
                        padding: {
                            bottom: 30
                        }
                    }
                }
            }
        };

        const eksConfig = {
            type: 'pie',
            data: eksData,
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
                            return value;
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
                        display: true,
                        text: 'Data Klasifikasi Berdasarkan Jumlah Eksemplar',
                        padding: {
                            bottom: 30
                        }
                    }
                }
            }
        };

        // total judul dan eks yang memiliki klas ddc
        let total_judul = 0
        let total_eks = 0
        $.each(j, function(key, value) {
            total_judul += value
        });
        $.each(eksemp, function(key, value) {
            total_eks += value
        });

        let pJudul = [];
        $.each(j, function(key, value) {
            pJudul.push(((value / total_judul) * 100).toFixed(1));
        });


        // bar chart perbandingan total judul dan filter judul
        const pJudulData = {
            labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama', 'Ilmu Sosial', 'Bahasa', 'Sains',
                'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                'Kesusastraan', 'Sejarah & Geografi'
            ],
            // labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            datasets: [{
                label: 'Data Seluruhnya',
                data: pJudul,
                backgroundColor: [
                    'rgba(130, 130, 130, 0.9)',
                    'rgba(112, 169, 188, 0.9)',
                    'rgba(88, 51, 84, 0.9)',
                    'rgba(174, 199, 79, 0.9)',
                    'rgba(240, 143, 56, 0.9)',
                    'rgba(30, 137, 111, 0.9)',
                    'rgba(40, 50, 73, 0.9)',
                    'rgba(254, 202, 83, 0.9)',
                    'rgba(179, 69, 104, 0.9)',
                    'rgba(101, 63, 26, 0.9)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }, {
                label: 'Data Filter',
                data: pJudul,
                backgroundColor: [
                    'rgba(130, 130, 130, 0.7)',
                    'rgba(112, 169, 188, 0.7)',
                    'rgba(88, 51, 84, 0.7)',
                    'rgba(174, 199, 79, 0.7)',
                    'rgba(240, 143, 56, 0.7)',
                    'rgba(30, 137, 111, 0.7)',
                    'rgba(40, 50, 73, 0.7)',
                    'rgba(254, 202, 83, 0.7)',
                    'rgba(179, 69, 104, 0.7)',
                    'rgba(101, 63, 26, 0.7)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        };

        const pJudulConfig = {
            type: 'bar',
            data: pJudulData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            return value + '%';
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
                        display: true,
                        text: 'Perbandingan Persentase Klasifikasi - Total Koleksi dengan Tahun Pencarian (Judul)',
                        padding: {
                            bottom: 30
                        }
                    }
                }
            }
        };

        // // bar chart perbandingan total eksemplar dan filter eksemplar
        let pEksemplar = [];
        $.each(eksemp, function(key, value) {
            pEksemplar.push(((value / total_eks) * 100).toFixed(1));
        });

        const pEksData = {
            labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama', 'Ilmu Sosial', 'Bahasa', 'Sains',
                'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                'Kesusastraan', 'Sejarah & Geografi'
            ],
            datasets: [{
                label: 'Data Seluruhnya',
                data: pEksemplar,
                backgroundColor: [
                    'rgba(130, 130, 130, 0.9)',
                    'rgba(112, 169, 188, 0.9)',
                    'rgba(88, 51, 84, 0.9)',
                    'rgba(174, 199, 79, 0.9)',
                    'rgba(240, 143, 56, 0.9)',
                    'rgba(30, 137, 111, 0.9)',
                    'rgba(40, 50, 73, 0.9)',
                    'rgba(254, 202, 83, 0.9)',
                    'rgba(179, 69, 104, 0.9)',
                    'rgba(101, 63, 26, 0.9)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }, {
                label: 'Data Filter',
                data: pEksemplar,
                backgroundColor: [
                    'rgba(130, 130, 130, 0.7)',
                    'rgba(112, 169, 188, 0.7)',
                    'rgba(88, 51, 84, 0.7)',
                    'rgba(174, 199, 79, 0.7)',
                    'rgba(240, 143, 56, 0.7)',
                    'rgba(30, 137, 111, 0.7)',
                    'rgba(40, 50, 73, 0.7)',
                    'rgba(254, 202, 83, 0.7)',
                    'rgba(179, 69, 104, 0.7)',
                    'rgba(101, 63, 26, 0.7)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        };

        const pEksConfig = {
            type: 'bar',
            data: pEksData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            return value + '%';
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
                        display: true,
                        text: 'Perbandingan Persentase Klasifikasi - Total Koleksi dengan Tahun Pencarian (Eksemplar)',
                        padding: {
                            bottom: 30
                        }
                    }
                }
            }
        };

        // render block
        const judulChart = new Chart(
            $('#chart-pie-judul'),
            judulConfig
        );

        const pJudulChart = new Chart(
            $('#chart-bar-judul'),
            pJudulConfig
        );

        const eksChart = new Chart(
            $('#chart-pie-eks'),
            eksConfig
        );

        const pEksChart = new Chart(
            $('#chart-bar-eks'),
            pEksConfig
        );

    })
</script>