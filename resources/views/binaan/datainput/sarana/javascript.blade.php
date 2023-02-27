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
    let statusLogin = {{ json_encode($sarana) }};
    $('#form').hide('slow')
    // $('#kondisi-form').show('slow')

    $('#filter').on('submit', function(e) {
        e.preventDefault();
        let id = $('#list-sekolah').val();
        let sekolah = $('#list-sekolah option:selected').text();
        var url = "{{ route('filterSarana', ':id') }}";
        url = url.replace(':id', id)
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                $('#header-text').text('Sarana/Prasarana Perpustakaan ' + sekolah)

                $('#luas').val(data.luas_ruangan)
                $('#koleksi').prop('checked', data.area_koleksi)
                $('#baca').prop('checked', data.area_baca)
                $('#kerja').prop('checked', data.area_kerja)
                $('#multimedia').prop('checked', data.area_multimedia)
                $('#kebersihan').prop('checked', data.kebersihan)
                $('#kerapian').prop('checked', data.kerapian)
                $('#projector').val(data.projector)
                $('#ac-kipas').val(data.ac_kipas)
                $('#komputer').val(data.komputer)
                $('#internet').val(data.internet)
                $('#televisi').val(data.televisi)
                $('#vcd').val(data.vcd)
                $('#rak-buku').val(data.rak_buku)
                $('#rak-koran').val(data.rak_koran)
                $('#rak-referensi').val(data.rak_referensi)
                $('#rak-majalah').val(data.rak_majalah)
                $('#meja-baca').val(data.meja_baca)
                $('#meja-sirkulasi').val(data.meja_sirkulasi)
                $('#meja-kerja').val(data.meja_kerja)
                $('#kursi-baca').val(data.kursi_baca)
                $('#kursi-kerja').val(data.kursi_kerja)
                $('#almari-katalog').val(data.almari_katalog)
                $('#loker').val(data.loker)
                $('#mading').val(data.mading)

                $('#form').hide('fast')
                $('#form').show('slow')
            }
        });
    });
</script>
