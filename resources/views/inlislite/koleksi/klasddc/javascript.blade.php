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
                    $('#klas0').html('')
                    $('#klas1').html('')
                    $('#klas2').html('')
                    $('#klas3').html('')
                    $('#klas4').html('')
                    $('#klas5').html('')
                    $('#klas6').html('')
                    $('#klas7').html('')
                    $('#klas8').html('')
                    $('#klas9').html('')
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
                }
            });
        })
    })
</script>
