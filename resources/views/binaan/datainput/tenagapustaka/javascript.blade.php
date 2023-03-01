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
                if (data.length > 0) {
                    $('#header-text').text('Data Tenaga Pustakawan ' + sekolah + ' Tahun ' + tahun)
                    $('#id-data').val(data.perpustakaan_id)
                    $('#tahun-data').val(data.tahun)
                    $('#data-tenaga').html('')
                    $.each(data, function(i, tng) {
                        console.log(tng);
                        var $tr = $('<tr>').append(
                            $('<td>').text('#'),
                            $('<td>').text(tng.nama),
                            $('<td>').text(tng.status_pegawai),
                            $('<td>').text(tng.status_pendidikan),
                            $('<td>').text(tng.jenis_kelamin),
                            $('<td>').html('<i data-id=' + tng.id +
                                ' id="edit-btn" class="fa fa-pencil"></i>'),
                            $('<td>').html('<i data-id=' + tng.id +
                                ' id="delete-btn" class="fa fa-trash"></i>')
                        ).appendTo('.table');
                        // console.log($tr.wrap('<p>').html());
                    });
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
        var url = "{{ route('filterTenagapustaka', [':id', ':tahun']) }}";
        url = url.replace(':id', id)
        url = url.replace(':tahun', tahun)
        getData(id, tahun, url, sekolah);
    });

    $('#data-tenaga').on('click', '#edit-btn', function(e) {
        id = $(this).data("id")
        console.log(id)
        let tahun = $('#tahun-data').val();
        var url = "{{ route('editTenagapustaka', ':id') }}";
        url = url.replace(':id', id)
        var urlUpdate = "{{ route('updateTenagapustaka', ':id') }}";
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                console.log(data)
                urlUpdate = urlUpdate.replace(':id', data.id);
                $('#add-pustakawan').modal('show');
                $('#tahun-form').hide();
                $('#skul-form').hide();
                $('.modal-title').text("Edit Data Pemberdayaan Perpustakaan " + $(
                    '#list-sekolah option:selected').text() + " Tahun " + data.tahun)
                $("#nama-form").val(data.nama);
                $("#pegawai-form").val(data.status_pegawai);
                $("#pendidikan-form").val(data.status_pendidikan);
                // $("#pendidikan-form").val(data.status_pendidikan);
                $('#kelamin-form [value="' + data.jenis_kelamin + '"]').prop('selected',
                    true);

                $('#form').attr('action', urlUpdate);
                $('#form').attr('method', 'PUT');
            }
        });
    })

    // memanggil data list perpustakaan
    function getPerpustakaan() {
        $.ajax({
            type: "GET",
            url: "{{ route('createTenagapustaka') }}",
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
        var urlStore = "{{ route('storeTenagapustaka') }}";
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
        $('#form input:checkbox').prop('checked', false);
        $('#form input:text').val('');
        $('#modal-form').modal('show');
        $('.modal-title').text("Tambah Data Pemberdayaan Perpustakaan  ")
    })

    $('#tambah-tenaga').on('click', function(e) {
        e.preventDefault()
        var urlStore = "{{ route('storeTenagapustaka') }}";
        $('#form').attr('action', urlStore);
        $('#form').attr('method', 'POST');
        $('#tahun-form').show();
        console.log({{ Auth::user()->perpustakaan_id }})
        if ({{ json_encode(Auth::user()->perpustakaan_id) }} > 0) {
            $('#skul-form').hide();
        } else {
            $('#skul-form').show();
        }
        $('#form input:radio').prop('checked', false);
        $('#form input:checkbox').prop('checked', false);
        $('#form input:text').val('');
        $('#modal-form').modal('show');
        $('.modal-title').text("Tambah Data Pemberdayaan Perpustakaan  ")
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
        let nama = $('#nama-form').val()
        let pegawai = $('#pegawai-form').val()
        let pendidikan = $('#pendidikan-form').val()
        let kelamin = $('#kelamin-form').val()


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
                nama: nama,
                pegawai: pegawai,
                pendidikan: pendidikan,
                kelamin: kelamin,
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
                    $('#add-pustakawan').modal('hide');
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
