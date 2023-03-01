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
    $('#table').hide()

    function getData(id, tahun, url, sekolah) {
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                if (data.hasOwnProperty('id')) {
                    $('#header-text').text('Administrasi Perpustakaan ' + sekolah)
                    $('#id-data').val(data.perpustakaan_id)
                    $('#tahun-data').val(data.tahun)
                    $('#buku-induk').html((data.buku_induk == 1) ? 'Tertib' : 'Tidak Tertib')
                    $('#buku-pengunjung').html((data.buku_pengunjung == 1) ? 'Tertib' : 'Tidak Tertib')
                    $('#katalog').html((data.katalog_kartu == 1) ? 'Tersedia' : 'Tidak Tersedia')

                    $('#table').hide('slow')
                    $('#table').show('slow')
                } else {
                    swal.fire({
                        title: 'Error',
                        html: 'Data Tidak Ditemukan',
                        icon: 'warning',
                    });
                }
            }
        });
    }

    $('#cari').on('click', function(e) {
        e.preventDefault();
        let id = $('#list-sekolah').val();
        let tahun = $('#tahun').val();
        let sekolah = $('#list-sekolah option:selected').text();
        var url = "{{ route('filterAdministrasi', [':id', ':tahun']) }}";
        url = url.replace(':id', id)
        url = url.replace(':tahun', tahun)
        getData(id, tahun, url, sekolah);
    });

    $('#edit').on('click', function(e) {
        id = $('#id-data').val();
        let tahun = $('#tahun-data').val();
        var url = "{{ route('editAdministrasi', [':id', ':tahun']) }}";
        url = url.replace(':id', id)
        url = url.replace(':tahun', tahun)
        var urlUpdate = "{{ route('updateAdministrasi', ':id') }}";
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                urlUpdate = urlUpdate.replace(':id', data.id);
                $('#modal-form').modal('show');
                $('#tahun-form').hide();
                $('#skul-form').hide();
                $('.modal-title').text("Edit Administrasi Perpustakaan " + $(
                    '#list-sekolah option:selected').text() + " Tahun " + data.tahun)
                $('#form').find(":radio[name=radio-induk][value=" + data.buku_induk +
                        "]")
                    .prop('checked', true);
                $('#form').find(":radio[name=radio-pengunjung][value=" + data
                        .buku_pengunjung +
                        "]")
                    .prop('checked', true);
                $('#form').find(":radio[name=radio-katalog][value=" + data
                        .katalog_kartu +
                        "]")
                    .prop('checked', true);
                $('#form').attr('action', urlUpdate);
                $('#form').attr('method', 'PUT');
            }
        });
    })

    // memanggil data list perpustakaan
    function getPerpustakaan() {
        $.ajax({
            type: "GET",
            url: "{{ route('createAdministrasi') }}",
            dataType: "json",
            success: function(data) {
                // var kecamatan = kec.data,
                listItems = ""
                $.each(data, (i, property) => {
                    listItems += "<option value='" + property.id + "'>" + property
                        .nama_sekolah +
                        "</option>"
                })
                $("#sekolah").html(listItems);
            }
        });
    }

    $('#tambah').on('click', function(e) {
        e.preventDefault()
        var urlStore = "{{ route('storeAdministrasi') }}";
        $('#form').attr('action', urlStore);
        $('#form').attr('method', 'POST');
        getPerpustakaan();
        $('#tahun-form').show();
        console.log({{ Auth::user()->perpustakaan_id }})
        if ({{ json_encode(Auth::user()->perpustakaan_id) }} > 0) {
            $('#skul-form').hide();
        } else {
            $('#skul-form').show();
        }
        $('#form input:radio').prop('checked', false);
        $('#modal-form').modal('show');
        $('.modal-title').text("Tambah Data Kondisi Umum ")
    })

    $('#simpan').on('click', (e) => {
        e.preventDefault();
        let urlSave = ($("#form").attr('action'))
        let method = ($("#form").attr('method'))
        let tahun = $("#year").val()
        let perpus_id = ''
        if ({{ json_encode(Auth::user()->perpustakaan_id) }} > 0) {
            perpus_id = '{{ json_encode(Auth::user()->perpustakaan_id) }}';
        } else {
            perpus_id = $("#sekolah").val()
        }
        let induk = $('input[name="radio-induk"]:checked').val();
        let pengunjung = $('input[name="radio-pengunjung"]:checked').val()
        let katalog = $('input[name="radio-katalog"]:checked').val()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            type: method,
            url: urlSave,
            data: JSON.stringify({
                tahun: tahun,
                perpus_id: perpus_id,
                induk: induk,
                pengunjung: pengunjung,
                katalog: katalog,
            }),
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                swal.fire({
                    title: 'Berhasil',
                    text: data,
                    icon: 'success',
                }).then(function() {
                    $('#modal-form').modal('hide');
                    $('#table').hide('slow')
                });
            },
            error: (xhr, ajaxOptions, thrownError) => {
                if (xhr.responseJSON.hasOwnProperty('errors')) {
                    var html =
                        "<ul style=justify-content: space-between;'>";
                    for (item in xhr.responseJSON.errors) {
                        if (xhr.responseJSON.errors[item].length) {
                            for (var i = 0; i < xhr.responseJSON.errors[item]
                                .length; i++) {
                                html += "<li class='dropdown-item'>" +
                                    "<i class='fas fa-times' style='color: red;'></i> &nbsp&nbsp&nbsp&nbsp" +
                                    xhr
                                    .responseJSON
                                    .errors[item][i] +
                                    "</li>"
                            }

                        }
                    }
                    html += '</ul>';
                    swal.fire({
                        title: 'Error',
                        html: html,
                        icon: 'warning',
                    });
                }
            }
        });

    })
</script>
