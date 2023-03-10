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

                    const pJudulDataFilter = {
                        labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama',
                            'Ilmu Sosial', 'Bahasa', 'Sains',
                            'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                            'Kesusastraan', 'Sejarah & Geografi'
                        ],
                        datasets: [{
                            label: 'Total',
                            data: [
                                j.judul_0,
                                j.judul_1,
                                j.judul_2,
                                j.judul_3,
                                j.judul_4,
                                j.judul_5,
                                j.judul_6,
                                j.judul_7,
                                j.judul_8,
                                j.judul_9,
                            ],
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.4)',
                                'rgba(112, 169, 188, 0.4)',
                                'rgba(88, 51, 84, 0.4)',
                                'rgba(174, 199, 79, 0.4)',
                                'rgba(240, 143, 56, 0.4)',
                                'rgba(30, 137, 111, 0.4)',
                                'rgba(40, 50, 73, 0.4)',
                                'rgba(254, 202, 83, 0.4)',
                                'rgba(179, 69, 104, 0.4)',
                                'rgba(101, 63, 26, 0.4)',
                            ],
                            borderColor: [
                                '#000000'
                            ],
                            borderWidth: 1
                        }, {
                            label: 'Filter',
                            data: [
                                d.judul.judul_0,
                                d.judul.judul_1,
                                d.judul.judul_2,
                                d.judul.judul_3,
                                d.judul.judul_4,
                                d.judul.judul_5,
                                d.judul.judul_6,
                                d.judul.judul_7,
                                d.judul.judul_8,
                                d.judul.judul_9,
                            ],
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.4)',
                                'rgba(112, 169, 188, 0.4)',
                                'rgba(88, 51, 84, 0.4)',
                                'rgba(174, 199, 79, 0.4)',
                                'rgba(240, 143, 56, 0.4)',
                                'rgba(30, 137, 111, 0.4)',
                                'rgba(40, 50, 73, 0.4)',
                                'rgba(254, 202, 83, 0.4)',
                                'rgba(179, 69, 104, 0.4)',
                                'rgba(101, 63, 26, 0.4)',
                            ],
                            borderColor: [
                                '#000000'
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
                            label: 'Total',
                            data: [
                                eksemp.eks_0,
                                eksemp.eks_1,
                                eksemp.eks_2,
                                eksemp.eks_3,
                                eksemp.eks_4,
                                eksemp.eks_5,
                                eksemp.eks_6,
                                eksemp.eks_7,
                                eksemp.eks_8,
                                eksemp.eks_9,
                            ],
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.4)',
                                'rgba(112, 169, 188, 0.4)',
                                'rgba(88, 51, 84, 0.4)',
                                'rgba(174, 199, 79, 0.4)',
                                'rgba(240, 143, 56, 0.4)',
                                'rgba(30, 137, 111, 0.4)',
                                'rgba(40, 50, 73, 0.4)',
                                'rgba(254, 202, 83, 0.4)',
                                'rgba(179, 69, 104, 0.4)',
                                'rgba(101, 63, 26, 0.4)',
                            ],
                            borderColor: [
                                '#000000'
                            ],
                            borderWidth: 1
                        }, {
                            label: 'Filter',
                            data: [
                                d.eks.eks_0,
                                d.eks.eks_1,
                                d.eks.eks_2,
                                d.eks.eks_3,
                                d.eks.eks_4,
                                d.eks.eks_5,
                                d.eks.eks_6,
                                d.eks.eks_7,
                                d.eks.eks_8,
                                d.eks.eks_9,
                            ],
                            backgroundColor: [
                                'rgba(130, 130, 130, 0.4)',
                                'rgba(112, 169, 188, 0.4)',
                                'rgba(88, 51, 84, 0.4)',
                                'rgba(174, 199, 79, 0.4)',
                                'rgba(240, 143, 56, 0.4)',
                                'rgba(30, 137, 111, 0.4)',
                                'rgba(40, 50, 73, 0.4)',
                                'rgba(254, 202, 83, 0.4)',
                                'rgba(179, 69, 104, 0.4)',
                                'rgba(101, 63, 26, 0.4)',
                            ],
                            borderColor: [
                                '#000000'
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
        const judulData = {
            labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama', 'Ilmu Sosial', 'Bahasa', 'Sains',
                'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                'Kesusastraan', 'Sejarah & Geografi'
            ],
            datasets: [{
                label: 'Jumlah',
                data: [
                    j.judul_0,
                    j.judul_1,
                    j.judul_2,
                    j.judul_3,
                    j.judul_4,
                    j.judul_5,
                    j.judul_6,
                    j.judul_7,
                    j.judul_8,
                    j.judul_9,
                ],
                backgroundColor: [
                    'rgba(130, 130, 130, 0.4)',
                    'rgba(112, 169, 188, 0.4)',
                    'rgba(88, 51, 84, 0.4)',
                    'rgba(174, 199, 79, 0.4)',
                    'rgba(240, 143, 56, 0.4)',
                    'rgba(30, 137, 111, 0.4)',
                    'rgba(40, 50, 73, 0.4)',
                    'rgba(254, 202, 83, 0.4)',
                    'rgba(179, 69, 104, 0.4)',
                    'rgba(101, 63, 26, 0.4)',
                ],
                borderColor: [
                    '#000000'
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
                data: [
                    eksemp.eks_0,
                    eksemp.eks_1,
                    eksemp.eks_2,
                    eksemp.eks_3,
                    eksemp.eks_4,
                    eksemp.eks_5,
                    eksemp.eks_6,
                    eksemp.eks_7,
                    eksemp.eks_8,
                    eksemp.eks_9,
                ],
                backgroundColor: [
                    'rgba(130, 130, 130, 0.4)',
                    'rgba(112, 169, 188, 0.4)',
                    'rgba(88, 51, 84, 0.4)',
                    'rgba(174, 199, 79, 0.4)',
                    'rgba(240, 143, 56, 0.4)',
                    'rgba(30, 137, 111, 0.4)',
                    'rgba(40, 50, 73, 0.4)',
                    'rgba(254, 202, 83, 0.4)',
                    'rgba(179, 69, 104, 0.4)',
                    'rgba(101, 63, 26, 0.4)',
                ],
                borderColor: [
                    '#000000'
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

        // bar chart perbandingan total judul dan filter judul
        const pJudulData = {
            labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama', 'Ilmu Sosial', 'Bahasa', 'Sains',
                'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                'Kesusastraan', 'Sejarah & Geografi'
            ],
            // labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            datasets: [{
                label: 'Total',
                data: [
                    j.judul_0,
                    j.judul_1,
                    j.judul_2,
                    j.judul_3,
                    j.judul_4,
                    j.judul_5,
                    j.judul_6,
                    j.judul_7,
                    j.judul_8,
                    j.judul_9,
                ],
                backgroundColor: [
                    'rgba(130, 130, 130, 0.4)',
                    'rgba(112, 169, 188, 0.4)',
                    'rgba(88, 51, 84, 0.4)',
                    'rgba(174, 199, 79, 0.4)',
                    'rgba(240, 143, 56, 0.4)',
                    'rgba(30, 137, 111, 0.4)',
                    'rgba(40, 50, 73, 0.4)',
                    'rgba(254, 202, 83, 0.4)',
                    'rgba(179, 69, 104, 0.4)',
                    'rgba(101, 63, 26, 0.4)',
                ],
                borderColor: [
                    '#000000'
                ],
                borderWidth: 1
            }, {
                label: 'Filter',
                data: [
                    j.judul_0,
                    j.judul_1,
                    j.judul_2,
                    j.judul_3,
                    j.judul_4,
                    j.judul_5,
                    j.judul_6,
                    j.judul_7,
                    j.judul_8,
                    j.judul_9,
                ],
                backgroundColor: [
                    'rgba(130, 130, 130, 0.4)',
                    'rgba(112, 169, 188, 0.4)',
                    'rgba(88, 51, 84, 0.4)',
                    'rgba(174, 199, 79, 0.4)',
                    'rgba(240, 143, 56, 0.4)',
                    'rgba(30, 137, 111, 0.4)',
                    'rgba(40, 50, 73, 0.4)',
                    'rgba(254, 202, 83, 0.4)',
                    'rgba(179, 69, 104, 0.4)',
                    'rgba(101, 63, 26, 0.4)',
                ],
                borderColor: [
                    '#000000'
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

        // // bar chart perbandingan total judul dan filter judul
        const pEksData = {
            labels: ['Karya Umum', 'Filsafat & Psikologi', 'Agama', 'Ilmu Sosial', 'Bahasa', 'Sains',
                'Ilmu Terapan & Teknologi', 'Seni & Olahraga',
                'Kesusastraan', 'Sejarah & Geografi'
            ],
            datasets: [{
                label: 'Total',
                data: [
                    eksemp.eks_0,
                    eksemp.eks_1,
                    eksemp.eks_2,
                    eksemp.eks_3,
                    eksemp.eks_4,
                    eksemp.eks_5,
                    eksemp.eks_6,
                    eksemp.eks_7,
                    eksemp.eks_8,
                    eksemp.eks_9,
                ],
                backgroundColor: [
                    'rgba(130, 130, 130, 0.4)',
                    'rgba(112, 169, 188, 0.4)',
                    'rgba(88, 51, 84, 0.4)',
                    'rgba(174, 199, 79, 0.4)',
                    'rgba(240, 143, 56, 0.4)',
                    'rgba(30, 137, 111, 0.4)',
                    'rgba(40, 50, 73, 0.4)',
                    'rgba(254, 202, 83, 0.4)',
                    'rgba(179, 69, 104, 0.4)',
                    'rgba(101, 63, 26, 0.4)',
                ],
                borderColor: [
                    '#000000'
                ],
                borderWidth: 1
            }, {
                label: 'Filter',
                data: [
                    eksemp.eks_0,
                    eksemp.eks_1,
                    eksemp.eks_2,
                    eksemp.eks_3,
                    eksemp.eks_4,
                    eksemp.eks_5,
                    eksemp.eks_6,
                    eksemp.eks_7,
                    eksemp.eks_8,
                    eksemp.eks_9,
                ],
                backgroundColor: [
                    'rgba(130, 130, 130, 0.4)',
                    'rgba(112, 169, 188, 0.4)',
                    'rgba(88, 51, 84, 0.4)',
                    'rgba(174, 199, 79, 0.4)',
                    'rgba(240, 143, 56, 0.4)',
                    'rgba(30, 137, 111, 0.4)',
                    'rgba(40, 50, 73, 0.4)',
                    'rgba(254, 202, 83, 0.4)',
                    'rgba(179, 69, 104, 0.4)',
                    'rgba(101, 63, 26, 0.4)',
                ],
                borderColor: [
                    '#000000'
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
