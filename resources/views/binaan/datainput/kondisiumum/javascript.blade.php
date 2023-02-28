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
    $('#table').hide()

    function getData(id, tahun, url) {
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                if (data.hasOwnProperty('id')) {
                    $('#header-text').text('Kondisi Umum Perpustakaan Binaan')
                    $('#id-data').val(data.perpustakaan_id)
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
        var url = "{{ route('filterKondisiUmum', [':id', ':tahun']) }}";
        url = url.replace(':id', id)
        url = url.replace(':tahun', tahun)
        getData(id, tahun, url, sekolah);
    });

    $('#edit').on('click', function(e) {
        id = $('#id-data').val();
        let tahun = $('#tahun').val();
        var url = "{{ route('editKondisiUmum', [':id', ':tahun']) }}";
        url = url.replace(':id', id)
        url = url.replace(':tahun', tahun)
        var urlUpdate = "{{ route('updateKondisiUmum', ':id') }}";
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                urlUpdate = urlUpdate.replace(':id', data.id);
                $('#modal-form').modal('show');
                $('#tahun-form').hide();
                $('#skul-form').hide();
                $('.modal-title').text("Edit Kondisi Umum Tahun " + data.tahun)
                $('#npp-form').val(data.npp)
                $('#sk-form').val(data.sk_pendirian)
                $('#program-form').val(data.program_kerja)
                $('#visi-form').val(data.visi_misi)
                $('#siswa-laki').val(data.siswa_l)
                $('#siswa-perempuan').val(data.siswa_p)
                $('#staff-laki').val(data.staff_l)
                $('#staff-perempuan').val(data.staff_p)
                $('#rombel-form').val(data.rombongan_belajar)


                $('#form').attr('action', urlUpdate);
                $('#form').attr('method', 'PUT');
            }
        });
    })

    // memanggil data list perpustakaan
    function getPerpustakaan() {
        $.ajax({
            type: "GET",
            url: "{{ route('createKondisiUmum') }}",
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
        var urlStore = "{{ route('storeKondisiUmum') }}";
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
        $('#form input').val('');
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
        let npp = $("#npp-form").val()
        let sk = $("#sk-form").val()
        let program = $("#program-form").val()
        let visi = $("#visi-form").val()
        let sL = $("#siswa-laki").val()
        let sP = $("#siswa-perempuan").val()
        let gL = $("#staff-laki").val()
        let gP = $("#staff-perempuan").val()
        let rombel = $("#rombel-form").val()
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
                npp: npp,
                sk: sk,
                program: program,
                visi: visi,
                sL: sL,
                sP: sP,
                gL: gL,
                gP: gP,
                rombel: rombel,
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
                    let id = perpus_id;
                    let tahun = tahun;
                    var url = "{{ route('filterKondisiUmum', [':id', ':tahun']) }}";
                    url = url.replace(':id', id)
                    url = url.replace(':tahun', tahun)
                    getData(id, tahun, url);
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
