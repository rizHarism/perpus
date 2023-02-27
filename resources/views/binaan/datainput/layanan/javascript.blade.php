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
    let statusLogin = {{ json_encode($layanan) }};
    $('#form').hide('slow')
    // $('#kondisi-form').show('slow')

    $('#filter').on('submit', function(e) {
        e.preventDefault();
        let id = $('#list-sekolah').val();
        let sekolah = $('#list-sekolah option:selected').text();
        var url = "{{ route('filterLayanan', ':id') }}";
        url = url.replace(':id', id)
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                $('#header-text').text('Layanan Perpustakaan ' + sekolah)

                if (data.sistem_layanan == 'terbuka') {
                    $('#layanan').prop('checked', 1)
                } else {
                    $('#layanan2').prop('checked', 1)
                }

                $('#hari-awal').find('option[value="' + data.hari_awal + '"]').prop('selected',
                    true);
                $('#hari-akhir').find('option[value="' + data.hari_akhir + '"]').prop('selected',
                    true);
                $('#jam-buka').find('option[value="' + data.jam_buka + '"]').prop('selected',
                    true);
                $('#jam-tutup').find('option[value="' + data.jam_tutup + '"]').prop('selected',
                    true);

                $('#pengunjung-siswa-laki').val(data.pengunjung_siswa_laki)
                $('#pengunjung-siswa-perempuan').val(data.pengunjung_siswa_perempuan)
                $('#pengunjung-guru-laki').val(data.guru_laki)
                $('#pengunjung-guru-perempuan').val(data.guru_perempuan)
                $('#peminjam-siswa-laki').val(data.peminjam_siswa_laki)
                $('#peminjam-siswa-perempuan').val(data.peminjam_siswa_perempuan)
                $('#peminjam-guru-laki').val(data.peminjam_guru_laki)
                $('#peminjam-guru-perempuan').val(data.peminjam_guru_perempuan)
                $('#peminjam-guru-perempuan').val(data.peminjam_guru_perempuan)
                $('#koleksi-terbaca-judul').val(data.koleksi_terbaca_judul)
                $('#koleksi-terbaca-eksemplar').val(data.koleksi_terbaca_eksemplar)
                $('#koleksi-terpinjam-judul').val(data.koleksi_terpinjam_judul)
                $('#koleksi-terpinjam-eksemplar').val(data.koleksi_terpinjam_eksemplar)

                $('#form').hide('slow')
                $('#form').show('slow')
            }
        });
    });
</script>
