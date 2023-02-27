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
    let statusLogin = {{ json_encode($administrasi) }};
    $('#administrasi-form').hide('slow')
    // $('#kondisi-form').show('slow')

    $('#filter-administrasi').on('submit', function(e) {
        e.preventDefault();
        let id = $('#list-sekolah').val();
        let sekolah = $('#list-sekolah option:selected').text();
        var url = "{{ route('filterAdministrasi', ':id') }}";
        url = url.replace(':id', id)
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                $('#header-text').text('Administrasi Perpustakaan '+ sekolah)
                
                if (data.buku_induk == '1'){
                    $('#administrasi-form').find(':radio[name=radio-induk][value="1"]').prop('checked', true);
                }else if (data.buku_induk == '0'){
                    $('#administrasi-form').find(':radio[name=radio-induk][value="0"]').prop('checked', true);
                }

                if (data.buku_pengunjung == '1'){
                    $('#administrasi-form').find(':radio[name=radio-pengunjung][value="1"]').prop('checked', true);
                }else if (data.buku_pengunjung == '0'){
                    $('#administrasi-form').find(':radio[name=radio-pengunjung][value="0"]').prop('checked', true);
                }

                if (data.katalog_kartu == '1'){
                    $('#administrasi-form').find(':radio[name=radio-katalog][value="1"]').prop('checked', true);
                }else if (data.katalog_kartu == '0'){
                    $('#administrasi-form').find(':radio[name=radio-katalog][value="0"]').prop('checked', true);
                }

                $('#administrasi-form').hide('fast')
                $('#administrasi-form').show('slow')
                }
            });
    });
</script>
