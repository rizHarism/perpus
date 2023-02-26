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

    $('#filter-kondisi-umum').on('submit', function(e) {
        e.preventDefault();
        let id = $('#list-sekolah').val();
        let sekolah = $('#list-sekolah option:selected').text();
        var url = "{{ route('filterKondisiUmum', ':id') }}";
        url = url.replace(':id', id)
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                $('#header-text').text('Kondisi Umum Perpustakaan '+ sekolah)
                $('#npp').val(data.npp)
                $('#sk-pendirian').val(data.sk_pendirian)
                $('#sk-pendirian').val(data.sk_pendirian)
                $('#program-kerja').val(data.program_kerja)
                $('#visi-misi').val(data.visi_misi)
                $('#siswa-laki').val(data.siswa_l)
                $('#siswa-perempuan').val(data.siswa_p)
                $('#staff-laki').val(data.staff_l)
                $('#staff-perempuan').val(data.staff_p)
                $('#rombel').val(data.rombongan_belajar)
                // $('#koleksi').html('')
                // $('#card-header').html('')
                // $('#card-header').html(data.title)
                // $('#katalog').html(data.katalog)
                // $('#koleksi').html(data.koleksi)
                $('#kondisi-form').hide('fast')
                $('#kondisi-form').show('slow')
                }
            });
    });
</script>
