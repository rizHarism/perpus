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

        let katalog = $('#katalog').text();
        let koleksi = $('#koleksi').text();
        // setup blog
        const catalogData = {
            labels: ['Katalog', 'Koleksi'],
            datasets: [{
                label: '# Jumlah',
                data: [katalog, koleksi],
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
        const catalogConfig = {
            type: 'bar',
            data: catalogData,
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
        const katalogChart = new Chart(
            $('#katalog-chart'),
            catalogConfig
        );

        // Filter catalog berdasarkan range tahun terbit
        $('#katalog-filter').on('submit', (e) => {
            e.preventDefault()
            var lokasi = $('#lokasi').val();
            var year1 = $('#year-1').val();
            var year2 = $('#year-2').val();
            var request = [lokasi, year1, year2];
            var url = "{{ route('circulationCatalogueFilter', ':request') }}";
            url = url.replace(':request', request)
            // $('#data').slideUp('slow');
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    $('#card-header').html('');
                    $('#card-header').html(data.title);
                    $('#katalog').html('');
                    $('#katalog').html(data.katalog);
                    $('#koleksi').html('');
                    $('#koleksi').html(data.koleksi);
                    // $('#data').slideDown('slow');
                    // $('#data').show('slow');

                    const newCatalogData = {
                        labels: ['Katalog', 'Koleksi'],
                        datasets: [{
                            label: '# Jumlah',
                            data: [data.katalog, data.koleksi],
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
                    katalogChart.data = newCatalogData
                    katalogChart.update()
                }
            });
        })

    })
</script>
