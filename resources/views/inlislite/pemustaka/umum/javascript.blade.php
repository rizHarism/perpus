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
        $('#filter-umum').on('submit', (e) => {
            e.preventDefault()
            var memberStatus = $('#member-status').val();
            var url = "{{ route('memberUmumFilter', ':status') }}";
            url = url.replace(':status', memberStatus)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data);

                    

                    // setup blog
                const dataLokasiNew = {
                    labels: ['Pemustaka Blitar Kota', 'Pemustaka Non Blitar Kota',
                        ],
                    datasets: [{
                    label: '# Jumlah',
                    data: [ data.member_blitar, data.member_non_blitar,],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.9)',
                        'rgba(54, 162, 235, 0.9)',
                        'rgba(255, 206, 86, 0.9)',
                        'rgba(75, 192, 192, 0.9)',
                        'rgba(153, 102, 255, 0.9)',
                        'rgba(255, 159, 64, 0.9)'
                        ],
                        borderColor: [
                            '#FFFFFF'
                        ],
                        borderWidth: 1
                    }]
                };

                const dataKelaminNew = {
                    labels: ['Pemustaka Laki-Laki', 'Pemustaka Perempuan',
                    ],
                    datasets: [{
                        label: '# Jumlah',
                        data: [ data.member_male, data.member_female,],
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.9)',
                            'rgba(75, 192, 192, 0.9)',
                            'rgba(255, 99, 132, 0.9)',
                            'rgba(54, 162, 235, 0.9)',
                            'rgba(153, 102, 255, 0.9)',
                            'rgba(255, 159, 64, 0.9)'
                        ],
                        borderColor: [
                            '#FFFFFF'
                        ],
                        borderWidth: 1
                    }]
                };

                    chartLokasi.data = dataLokasiNew;
                    chartKelamin.data = dataKelaminNew;
                    chartLokasi.update()
                    chartKelamin.update()
                }
            });
        });

        //setting data chart Data Umum Pemustaka
        Chart.register(ChartDataLabels);
        let blitar = {!! json_encode($member_blitar) !!};
        let nonBlitar = {!! json_encode($member_non_blitar) !!};
        let laki = {!! json_encode($member_male) !!};
        let perempuan = {!! json_encode($member_female) !!};

        // setup blog
        const dataLokasi = {
            labels: ['Pemustaka Blitar Kota', 'Pemustaka Non Blitar Kota',
            ],
            datasets: [{
                label: '# Jumlah',
                data: [ blitar, nonBlitar,],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.9)',
                    'rgba(54, 162, 235, 0.9)',
                    'rgba(255, 206, 86, 0.9)',
                    'rgba(75, 192, 192, 0.9)',
                    'rgba(153, 102, 255, 0.9)',
                    'rgba(255, 159, 64, 0.9)'
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        };

        const dataKelamin = {
            labels: ['Pemustaka Laki-Laki', 'Pemustaka Perempuan',
            ],
            datasets: [{
                label: '# Jumlah',
                data: [ laki, perempuan,],
                backgroundColor: [
                    'rgba(255, 206, 86, 0.9)',
                    'rgba(75, 192, 192, 0.9)',
                    'rgba(255, 99, 132, 0.9)',
                    'rgba(54, 162, 235, 0.9)',
                    'rgba(153, 102, 255, 0.9)',
                    'rgba(255, 159, 64, 0.9)'
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        };

        // setup config
        const configLokasi = {
            type: 'pie',
            data: dataLokasi,
            options: {
                responsive: true,
                plugins:{
                    legend:{
                        position:'bottom'
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
                        text: 'Data Pemustaka Berdasarkan Lokasi Tinggal',
                        display: true,
                    }
                }
            }
        };

        const configKelamin = {
            type: 'pie',
            data: dataKelamin,
            options: {
                responsive: true,
                plugins:{
                    legend:{
                        position:'bottom'
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
                        text: 'Data Pemustaka Berdasarkan Jenis Kelamin',
                        display: true,
                    }
                }
            }
        };

        // render block
        const chartLokasi = new Chart(
            $('#lokasi-chart'),
            configLokasi
        );
        const chartKelamin = new Chart(
            $('#kelamin-chart'),
            configKelamin
        );
    })
</script>