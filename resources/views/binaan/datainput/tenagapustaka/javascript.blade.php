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
    let statusLogin = {{ json_encode($tenaga) }};
    $('#tenaga-box').hide('slow')
    // $('#kondisi-form').show('slow')

    $('#filter-tenaga').on('submit', function(e) {
        e.preventDefault();
        let id = $('#list-sekolah').val();
        let sekolah = $('#list-sekolah option:selected').text();
        var url = "{{ route('filterTenagapustaka', ':id') }}";
        url = url.replace(':id', id)
        $('#tenaga-box').hide('slow')
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                let nomor = 1;
                $('#data-tenaga').html('');
                if (data.length == 0) {
                    $('#data-tenaga').append(
                        "<tr>\
					    <td colspan='6'>Data Belum Tersedia</td>\
					    </tr>");
                } else {
                    $.each(data, function(key, value) {
                        let kelamin = 'Laki-Laki';
                        if (value.jenis_kelamin == 'P') {
                            kelamin = 'Perempuan';
                        }
                        $('#data-tenaga').append(
                            "<tr>\
                            <td>" + nomor + "</td>\
                            <td>" + value.nama + "</td>\
                            <td>" + value.status_pegawai + "</td>\
                            <td>" + value.status_pendidikan + "</td>\
                            <td>" + kelamin + "</td>\
                            </tr>");
                        nomor++
                    })
                }
                $('#tenaga-box').show('slow')
            }
        });
    });
</script>
