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
            var year1 = $('#year-1').val();
            var year2 = $('#year-2').val();
            var request = [lokasi, year1, year2];
            var url = "{{ route('circulationUsiaFilter', ':request') }}";
            url = url.replace(':request', request)
            console.log(request)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    $('#card-header').html(data.message);
                    $('#member-anak').html(data.member_anak);
                    $('#member-sd').html(data.member_sd);
                    $('#member-smp').html(data.member_smp);
                    $('#member-sma').html(data.member_sma);
                    $('#member-remaja').html(data.member_remaja);
                    $('#member-dewasa').html(data.member_dewasa);
                    $('#member-lansia').html(data.member_lansia);

                    const newData = {
                        labels: ['Pemustaka Usia 0-6', 'Pemustaka Usia 7-12',
                            'Pemustaka Usia 12-15',
                            'Pemustaka Usia 16-18', 'Pemustaka Usia 19-23',
                            'Pemustaka Usia 24-59',
                            'Pemustaka Usia 60 keatas'
                        ],
                        datasets: [{
                            label: '# Jumlah',
                            data: [data.member_anak, data.member_sd, data
                                .member_smp, data.member_sma, data
                                .member_remaja, data.member_dewasa, data
                                .member_lansia
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    };

                    chart.data = newData;
                    chart.update();
                }
            });
        });

        //setting data chart sirkulasi Usia Pemustaka


        let anak = $('#member-anak').text();
        let sd = $('#member-sd').text();
        let smp = $('#member-smp').text();
        let sma = $('#member-sma').text();
        let remaja = $('#member-remaja').text();
        let dewasa = $('#member-dewasa').text();
        let lansia = $('#member-lansia').text();
        // setup blog
        const data = {
            labels: ['Pemustaka Usia 0-6', 'Pemustaka Usia 7-12', 'Pemustaka Usia 12-15',
                'Pemustaka Usia 16-18', 'Pemustaka Usia 19-23', 'Pemustaka Usia 24-59',
                'Pemustaka Usia 60 keatas'
            ],
            datasets: [{
                label: '# Jumlah',
                data: [anak, sd, smp, sma, remaja, dewasa, lansia],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
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
