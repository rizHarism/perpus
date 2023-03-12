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
        $('#filter-pekerjaan').on('submit', (e) => {
            e.preventDefault()

            var status = $('#status').val();
            var url = "{{ route('memberPekerjaanFilter', ':request') }}";
            url = url.replace(':request', status)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    $('#card-header').html('');
                    $('#card-header').html(data.message);
                    $('#status-' + data.id).html('0');
                    let pekerjaanDataNew = [];
                    let labelDataNew = [];
                    $.each(data.result, (i, data) => {
                        $('#status-' + data.id).html(data.total);
                        pekerjaanDataNew.push(data.total);
                        labelDataNew.push(data.Pekerjaan);
                    })

                    // setup blog
                    const newData = {
                        labels: labelData,
                        datasets: [{
                            label: '#Pemustaka Total',
                            data: pekerjaanData,
                            backgroundColor: [
                                'rgba(255, 0, 0, 0.9)',
                                'rgba(0, 128, 0, 0.9)',
                                'rgba(0, 0, 255, 0.9)',
                                'rgba(255, 255, 0, 0.9)',
                                'rgba(255, 0, 255, 0.9)',
                                'rgba(0, 255, 255, 0.9)',
                                'rgba(128, 0, 0, 0.9)',
                                'rgba(0, 128, 128, 0.9)',
                                'rgba(128, 128, 0, 0.9)',
                                'rgba(128, 0, 128, 0.9)',
                                'rgba(255, 165, 0, 0.9)',
                                'rgba(0, 0, 128, 0.9)',
                            ],
                            borderColor: [
                                '#FFFFFF'
                            ],
                            borderWidth: 1
                        },{
                            label: '#Pemustaka ' + data.status,
                            data: pekerjaanDataNew,
                            backgroundColor: [
                                'rgba(255, 0, 0, 0.7)',
                                'rgba(0, 128, 0, 0.7)',
                                'rgba(0, 0, 255, 0.7)',
                                'rgba(255, 255, 0, 0.7)',
                                'rgba(255, 0, 255, 0.7)',
                                'rgba(0, 255, 255, 0.7)',
                                'rgba(128, 0, 0, 0.7)',
                                'rgba(0, 128, 128, 0.7)',
                                'rgba(128, 128, 0, 0.7)',
                                'rgba(128, 0, 128, 0.7)',
                                'rgba(255, 165, 0, 0.7)',
                                'rgba(0, 0, 128, 0.7)',
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
        })


        Chart.register(ChartDataLabels);
        let arrayData = {!! json_encode($result) !!};
        let pekerjaanData = [];
        let labelData = [];
        $.each(arrayData, function(i, data) {
            // do your stuf
            pekerjaanData.push(data.total);
            labelData.push(data.Pekerjaan);
        });
        // setup blog
        const data = {
            labels: labelData,
            datasets: [{
                label: '#Pemustaka Total',
                data: pekerjaanData,
                backgroundColor: [
                    'rgba(255, 0, 0, 0.9)',
                    'rgba(0, 128, 0, 0.9)',
                    'rgba(0, 0, 255, 0.9)',
                    'rgba(255, 255, 0, 0.9)',
                    'rgba(255, 0, 255, 0.9)',
                    'rgba(0, 255, 255, 0.9)',
                    'rgba(128, 0, 0, 0.9)',
                    'rgba(0, 128, 128, 0.9)',
                    'rgba(128, 128, 0, 0.9)',
                    'rgba(128, 0, 128, 0.9)',
                    'rgba(255, 165, 0, 0.9)',
                    'rgba(0, 0, 128, 0.9)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            },{
                label: '#Pemustaka Total',
                data: pekerjaanData,
                backgroundColor: [
                    'rgba(255, 0, 0, 0.7)',
                    'rgba(0, 128, 0, 0.7)',
                    'rgba(0, 0, 255, 0.7)',
                    'rgba(255, 255, 0, 0.7)',
                    'rgba(255, 0, 255, 0.7)',
                    'rgba(0, 255, 255, 0.7)',
                    'rgba(128, 0, 0, 0.7)',
                    'rgba(0, 128, 128, 0.7)',
                    'rgba(128, 128, 0, 0.7)',
                    'rgba(128, 0, 128, 0.7)',
                    'rgba(255, 165, 0, 0.7)',
                    'rgba(0, 0, 128, 0.7)',
                ],
                borderColor: [
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        };

        // setup config
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins:{
                    legend:{
                        position: 'bottom',
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            console.log(ctx)
                            // console.log(value)
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
                        text: 'Data Pemustaka Berdasarkan Status Pekerjaan',
                        display: true,
                    }
                }
            }
        };

        // render block
        const chart = new Chart(
            $('#pekerjaan-chart'),
            config
        );
    })
</script>