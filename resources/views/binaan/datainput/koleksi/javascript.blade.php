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
    let statusLogin = {{ json_encode($koleksi) }};
    $('#form').hide('slow')
    // $('#kondisi-form').show('slow')

    $('#filter').on('submit', function(e) {
        e.preventDefault();
        let id = $('#list-sekolah').val();
        let sekolah = $('#list-sekolah option:selected').text();
        var url = "{{ route('filterKoleksi', ':id') }}";
        url = url.replace(':id', id)
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                $('#header-text').text('Koleksi Perpustakaan ' + sekolah)

                $('#pelajaran-judul').val(data.buku_pelajaran_judul)
                $('#pelajaran-eksemplar').val(data.buku_pelajaran_eksemplar)
                $('#panduan-judul').val(data.buku_panduan_judul)
                $('#panduan-eksemplar').val(data.buku_panduan_eksemplar)
                $('#fiksi-judul').val(data.buku_fiksi_judul)
                $('#fiksi-eksemplar').val(data.buku_fiksi_eksemplar)
                $('#non-fiksi-judul').val(data.buku_non_fiksi_judul)
                $('#non-fiksi-eksemplar').val(data.buku_non_fiksi_eksemplar)
                $('#refensi-judul').val(data.buku_referensi_judul)
                $('#refensi-eksemplar').val(data.buku_referensi_eksemplar)
                $('#guru-judul').val(data.karya_guru_judul)
                $('#guru-eksemplar').val(data.karya_guru_eksemplar)
                $('#siswa-judul').val(data.karya_siswa_judul)
                $('#siswa-eksemplar').val(data.karya_siswa_eksemplar)
                $('#koran-judul').val(data.koran_judul)
                $('#koran-eksemplar').val(data.koran_eksemplar)
                $('#majalah-judul').val(data.majalah_judul)
                $('#kaset').val(data.kaset)
                $('#cd').val(data.cd)
                $('#vcd').val(data.vcd)
                $('#dvd').val(data.dvd)
                $('#multimedia-lain').val(data.multimedia_lain)
                $('#atlas').val(data.atlas)
                $('#peta').val(data.peta)
                $('#globe').val(data.globe)
                $('#karto-lain').val(data.karto_lain)
                $('#peraga-mtk').val(data.peraga_matematika)
                $('#peraga-ipa').val(data.peraga_ipa)
                $('#peraga-lain').val(data.peraga_lain)

                $('#form').hide('slow')
                $('#form').show('slow')
            }
        });
    });
</script>
