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
    let statusLogin = {{ Auth::user()->perpustakaan_id }}
    // if (statusLogin == 0) {
        $('#form').hide()
        $('#table').hide()

        $('#filter').on('submit', function(e) {
            e.preventDefault();
            let id = $('#list-sekolah').val();
            let tahun = $('#tahun').val();
            let sekolah = $('#list-sekolah option:selected').text();
            var url = "{{ route('filterKondisiUmum', [':id', ':tahun']) }}";
            url = url.replace(':id', id)
            url = url.replace(':tahun', tahun)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data.hasOwnProperty('id'))
                    if (data.hasOwnProperty('id')){
                    $('#header-text').text('Kondisi Umum Perpustakaan ' + sekolah)
                    $('#id-data').val(data.id)
                    $('#npp').html(data.npp)
                    $('#sk-pendirian').html(data.sk_pendirian)
                    $('#sk-pendirian').html(data.sk_pendirian)
                    $('#program-kerja').html(data.program_kerja)
                    $('#visi-misi').html(data.visi_misi)
                    $('#s-laki').html(data.siswa_l)
                    $('#s-perempuan').html(data.siswa_p)
                    $('#g-laki').html(data.staff_l)
                    $('#g-perempuan').html(data.staff_p)
                    $('#rombel').html(data.rombongan_belajar)
                    $('#table').hide('fast')
                    $('#table').show('slow')
                }else{
                    alert('Data Tidak Ditemukan')
                }
                }
            });
        });
    // }

    $('#edit').on('click', function(e){
            id = $('#id-data').val();
            var url = "{{route('editKondisiUmum', ':id')}}";
            url = url.replace(':id', id)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data.npp)
                    $('#table').hide('slow')
                    // $('#content').html(data.html)
                    $('#filter').hide('slow')
                    $('#form').show('slow')
                    $('#npp-form').val(data.npp)
                    $('#sk-form').val(data.sk_pendirian)
                    $('#program-form').val(data.program_kerja)
                    $('#visi-form').val(data.visi_misi)
                    $('#siswa-laki').val(data.siswa_l)
                    $('#siswa-perempuan').val(data.siswa_p)
                    $('#staff-laki').val(data.staff_l)
                    $('#staff-perempuan').val(data.staff_p)
                    $('#rombel-form').val(data.rombongan_belajar)
                    
                }
            });
        })

        $('#kembali').on('click', (e)=>{
            e.preventDefault()
            $('#form').hide('slow')
            $('#table').show('slow')
            $('#filter').show('slow')
        })
</script>
