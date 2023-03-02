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
        $('#filter-peminjam').on('submit', (e) => {
            e.preventDefault()
            var lokasi = $('#lokasi').val();
            var usia = $('#usia').val();
            var status = $('#status').val();
            var year1 = $('#year-1').val();
            var year2 = $('#year-2').val();
            var request = [lokasi, year1, year2];
            var url = "{{ route('circulationPekerjaanFilter', ':request') }}";
            url = url.replace(':request', request)
            console.log(request)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    let pekerjaanData = [];
                    let labelData = [];
                    $('#pekerjaan-' + data.id).html('0');
                    $.each(data.result, (i, data) => {
                        console.log(data)
                        $('#pekerjaan-' + data.id).html(data.total);
                        pekerjaanData.push(data.total);
                        labelData.push(data.Pekerjaan);
                    })

                    // setup blog
                    const newData = {
                        labels: labelData,
                        datasets: [{
                            label: '# Jumlah',
                            data: pekerjaanData,
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
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
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
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                            ],
                            borderWidth: 1
                        }]
                    };
                    chart.data = newData;
                    chart.update()
                }
            });
        });

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
                label: '# Jumlah',
                data: pekerjaanData,
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
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
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
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
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
            $('#pekerjaan-chart'),
            config
        );
    })
</script>
