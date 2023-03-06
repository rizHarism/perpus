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
                success: function(data) {
                    $('#klas0').html(data.klas0)
                    $('#klas1').html(data.klas1)
                    $('#klas2').html(data.klas2)
                    $('#klas3').html(data.klas3)
                    $('#klas4').html(data.klas4)
                    $('#klas5').html(data.klas5)
                    $('#klas6').html(data.klas6)
                    $('#klas7').html(data.klas7)
                    $('#klas8').html(data.klas8)
                    $('#klas9').html(data.klas9)
                    $('#card-header').html('')
                    $('#card-header').html(data.title)

                    const newDdcData = {
                        labels: ['000-099', '100-199', '200-299', '300-399', '400-499',
                            '500-599', '600-699', '700-799',
                            '800-899', '900-999'
                        ],
                        datasets: [{
                            label: '# Jumlah',
                            data: [data.klas0, data.klas1, data.klas2, data
                                .klas3, data.klas4, data.klas5,
                                data.klas6, data.klas7, data.klas8, data
                                .klas9
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                            ],
                            borderWidth: 1
                        }]
                    };

                    ddcChart.data = newDdcData
                    ddcChart.update()

                }
            });
        });

        let klas0 = $('#klas0').text()
        let klas1 = $('#klas1').text()
        let klas2 = $('#klas2').text()
        let klas3 = $('#klas3').text()
        let klas4 = $('#klas4').text()
        let klas5 = $('#klas5').text()
        let klas6 = $('#klas6').text()
        let klas7 = $('#klas7').text()
        let klas8 = $('#klas8').text()
        let klas9 = $('#klas9').text()
        // setup blog
        const ddcData = {
            labels: ['000-099', '100-199', '200-299', '300-399', '400-499', '500-599', '600-699', '700-799',
                '800-899', '900-999'
            ],
            datasets: [{
                label: '# Jumlah',
                data: [klas0, klas1, klas2, klas3, klas4, klas5, klas6, klas7, klas8, klas9],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        };

        // setup config
        const ddcConfig = {
            type: 'bar',
            data: ddcData,
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
        const ddcChart = new Chart(
            $('#ddc-chart'),
            ddcConfig
        );

    })
</script>
