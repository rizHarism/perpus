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
    let statusLogin = {{ json_encode($pemberdayaan) }};
    $('#pemberdayaan-form').hide('slow')
    // $('#kondisi-form').show('slow')

    $('#filter-pemberdayaan').on('submit', function(e) {
        e.preventDefault();
        let id = $('#list-sekolah').val();
        let sekolah = $('#list-sekolah option:selected').text();
        var url = "{{ route('filterPemberdayaan', ':id') }}";
        url = url.replace(':id', id)
        $('#pemberdayaan-form').hide('slow')
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)

                $('#header-text').text('Pemberdayaan Perpustakaan '+ sekolah)
                $('#slogan').val(data.slogan)
                $('#leaflet').prop("checked",data.program_leaflet)
                $('#penyuluhan').prop("checked",data.program_penyuluhan)
                $('#banner').prop("checked",data.program_banner)
                $('#pameran').prop("checked",data.program_pameran)
                $('#brosur').prop("checked",data.program_brosur)
                $('#lomba').prop("checked",data.program_lomba)
                $('#penambahan-buku').val(data.penambahan_buku)

                $('#pemberdayaan-form').show('slow')
                }
            });
    });
</script>
