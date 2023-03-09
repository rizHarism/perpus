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
                    $('#card-header').html('');
                    $('#card-header').html(data.title);
                    console.log(data)
                    $('.sumber-total').html('0');

                    let sumberData = [];
                    let labelData = [];

                    $.each(data.result, (i, data) => {
                        $('#' + data.Code).html(data.total);
                        sumberData.push(data.total);
                        labelData.push(data.Name);
                    })

                    const newData = {
                        labels: labelData,
                        datasets: [{
                            label: '# Jumlah',
                            data: sumberData,
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
                    sumberChart.data = newData
                    sumberChart.update()
                }
            });
        });


        //setting data chart Sumber koleksi

        let arrayData = {!! json_encode($result) !!};
        let sumberData = [];
        let labelData = [];
        $.each(arrayData, function(i, data) {
            // do your stuf
            sumberData.push(data.total);
            labelData.push(data.Name);
        });
        // setup blog
        const catalogData = {
            labels: labelData,
            datasets: [{
                label: '# Jumlah',
                data: sumberData,
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
                    y: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        };

        // render block
        const sumberChart = new Chart(
            $('#sumber-chart'),
            catalogConfig
        );
    })
</script>
