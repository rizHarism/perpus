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
        $('#filter-usia').on('submit', (e) => {
            e.preventDefault()
            var lokasi = $('#lokasi').val();
            var memberStatus = $('#status').val();
            var url = "{{ route('memberUsiaFilter', ':request') }}";
            url = url.replace(':request', memberStatus)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data)

                    const newData = {
                        labels: ['Pemustaka Usia 0-6', 'Pemustaka Usia 7-12',
                            'Pemustaka Usia 12-15',
                            'Pemustaka Usia 16-18', 'Pemustaka Usia 19-23',
                            'Pemustaka Usia 24-59',
                            'Pemustaka Usia 60 keatas'
                        ],
                        datasets: [{
                            label: '#Pemustaka Total',
                            data: [anak, sd, smp, sma, remaja, dewasa, lansia],
                            backgroundColor: [
                                'rgba(255, 51, 0, 0.9)',
                                'rgba(255, 153, 0, 0.9)',
                                'rgba(0, 204, 102, 0.9)',
                                'rgba(51, 204, 204, 0.9)',
                                'rgba(51, 153, 255, 0.9)',
                                'rgba(204, 51, 153, 0.9)',
                                'rgba(153, 153, 153, 0.9)',
                                'rgba(102, 102, 255, 0.9)',
                                'rgba(204, 153, 255, 0.9)',
                                'rgba(255, 204, 0, 0.9)',
                            ],
                            borderColor: [
                                '#FFFFFF    '
                            ],
                            borderWidth: 1
                        },{
                            label: '#Pemustaka '+ data.status,
                            data: [data.member_anak, data.member_sd, data
                                .member_smp, data.member_sma, data
                                .member_remaja, data.member_dewasa, data
                                .member_lansia
                            ],
                            backgroundColor: [
                                'rgba(255, 51, 0, 0.6)',
                                'rgba(255, 153, 0, 0.6)',
                                'rgba(0, 204, 102, 0.6)',
                                'rgba(51, 204, 204, 0.6)',
                                'rgba(51, 153, 255, 0.6)',
                                'rgba(204, 51, 153, 0.6)',
                                'rgba(153, 153, 153, 0.6)',
                                'rgba(102, 102, 255, 0.6)',
                                'rgba(204, 153, 255, 0.6)',
                                'rgba(255, 204, 0, 0.6)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        }]
                    };
                    chart.data = newData;
                    chart.update()
                }
            });
        });

        //setting data chart Usia Pemustaka
        Chart.register(ChartDataLabels);
        let anak = {!! json_encode($member_anak) !!}
        let sd = {!! json_encode($member_sd) !!}
        let smp = {!! json_encode($member_smp) !!}
        let sma = {!! json_encode($member_sma) !!}
        let remaja = {!! json_encode($member_remaja) !!}
        let dewasa = {!! json_encode($member_dewasa) !!}
        let lansia = {!! json_encode($member_lansia) !!}
        // setup blog
        const data = {
            labels: ['Pemustaka Usia 0-6', 'Pemustaka Usia 7-12', 'Pemustaka Usia 12-15',
                'Pemustaka Usia 16-18', 'Pemustaka Usia 19-23', 'Pemustaka Usia 24-59',
                'Pemustaka Usia 60 keatas'
            ],
            datasets: [{
                label: '#Pemustaka Total',
                data: [anak, sd, smp, sma, remaja, dewasa, lansia],
                backgroundColor: [
                    'rgba(255, 51, 0, 0.9)',
                    'rgba(255, 153, 0, 0.9)',
                    'rgba(0, 204, 102, 0.9)',
                    'rgba(51, 204, 204, 0.9)',
                    'rgba(51, 153, 255, 0.9)',
                    'rgba(204, 51, 153, 0.9)',
                    'rgba(153, 153, 153, 0.9)',
                    'rgba(102, 102, 255, 0.9)',
                    'rgba(204, 153, 255, 0.9)',
                    'rgba(255, 204, 0, 0.9)',
                ],
                borderColor: [
                    '#FFFFFF    '
                ],
                borderWidth: 1
            },{
                label: '#Pemustaka Total',
                data: [anak, sd, smp, sma, remaja, dewasa, lansia],
                backgroundColor: [
                    'rgba(255, 51, 0, 0.6)',
                    'rgba(255, 153, 0, 0.6)',
                    'rgba(0, 204, 102, 0.6)',
                    'rgba(51, 204, 204, 0.6)',
                    'rgba(51, 153, 255, 0.6)',
                    'rgba(204, 51, 153, 0.6)',
                    'rgba(153, 153, 153, 0.6)',
                    'rgba(102, 102, 255, 0.6)',
                    'rgba(204, 153, 255, 0.6)',
                    'rgba(255, 204, 0, 0.6)',
                ],
                borderColor: [
                    '#FFFFFF    '
                ],
                borderWidth: 1
            }
        ]
        };

        // setup config
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins:{
                    legend:{
                        position:'bottom'
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[ctx.datasetIndex].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return value + '\n' 
                            // + percentage;
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

        // render block
        const chart = new Chart(
            $('#usia-chart'),
            config
        );
    })
</script>