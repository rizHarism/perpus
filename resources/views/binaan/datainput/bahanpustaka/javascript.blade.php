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
    let statusLogin = {{ json_encode($bahan) }};
    $('#pustaka-form').hide('slow')
    // $('#kondisi-form').show('slow')

    $('#filter-bahan-pustaka').on('submit', function(e) {
        e.preventDefault();
        let id = $('#list-sekolah').val();
        let sekolah = $('#list-sekolah option:selected').text();
        var url = "{{ route('filterBahanPustaka', ':id') }}";
        url = url.replace(':id', id)
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                $('#header-text').text('Pengorganisasian Bahan Pustaka '+ sekolah)
                $('#pedoman-katalog').val(data.pedoman_katalog)
                $('#pedoman-klasifikasi').val(data.pedoman_klasifikasi)
                $('#aplikasi-perpus').val(data.aplikasi_perpus)
                
                $('#pustaka-form').hide('fast')
                $('#pustaka-form').show('slow')
                }
            });
    });
</script>
