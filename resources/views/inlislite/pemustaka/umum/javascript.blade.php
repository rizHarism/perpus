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
                    $('#card-header').html(data.message);
                    $('#total-member').html(data.total_member);
                    $('#member-male').html(data.member_male);
                    $('#member-female').html(data.member_female);
                    $('#member-blitar').html(data.member_blitar);
                    $('#member-nonblitar').html(data.member_non_blitar);

                    const newData = {
                        labels: ['Total Pemustaka', 'Pemustaka Blitar Kota',
                            'Pemustaka Non Blitar Kota',
                            'Pemustaka Pria', 'Pemustaka Wanita'
                        ],
                        datasets: [{
                            label: '# Jumlah',
                            data: [data.total_member, data.member_blitar, data
                                .member_non_blitar, data.member_male, data
                                .member_female
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
                    chart.update()
                }
            });
        });

        //setting data chart Data Umum Pemustaka

        let total = $('#total-member').text();
        let blitar = $('#member-blitar').text();
        let nonBlitar = $('#member-nonblitar').text();
        let male = $('#member-male').text();
        let female = $('#member-female').text();
        // setup blog
        const data = {
            labels: ['Total Pemustaka', 'Pemustaka Blitar Kota', 'Pemustaka Non Blitar Kota',
                'Pemustaka Pria', 'Pemustaka Wanita'
            ],
            datasets: [{
                label: '# Jumlah',
                data: [total, blitar, nonBlitar, male, female],
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
            $('#pemustaka-chart'),
            config
        );
    })
</script>
