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
    let statusLogin = {{ json_encode($kondisi_umum) }};
    $('#kondisi-form').hide('slow')
    // $('#kondisi-form').show('slow')

    $('#filter-kondisi').on('submit', function(e) {
        e.preventDefault();
        var tahun = $('#list-tahun').val();
        // $('#kondisi-form').show('slow')
        alert(tahun)
    });

    // $("#filter-datatables").on('submit', function(e) {
    //     e.preventDefault();
    //     var kelurahan = $('#list-kelurahan').val();
    //     var kondisi = $('#list-kondisi').val();
    //     var perkerasan = $('#list-perkerasan').val();
    //     (kecamatan == 0 && kelurahan == 0 && kondisi == 0 && perkerasan == 0) ? url =
    //         '/ruas/kelurahan/datatables':
    //         url = '/ruas/' + kecamatan + '/' +
    //         kelurahan + '/' + kondisi + '/' + perkerasan + '/filter';
    //     table.destroy();
    //     loadTable(url)
    // })
</script>
