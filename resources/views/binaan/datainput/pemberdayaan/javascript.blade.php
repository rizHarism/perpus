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
                    $('#header-text').text('Pemberdayaan Perpustakaan ' + sekolah + ' Tahun ' + data.tahun)
                    $('#id-data').val(data.perpustakaan_id)
                    $('#tahun-data').val(data.tahun)
                    $("#slogan").text(data.slogan);
                    $("#leaflet").prop('checked', data.program_leaflet);
                    $("#penyuluhan").prop('checked', data.program_penyuluhan);
                    $("#banner").prop('checked', data.program_banner);
                    $("#pameran").prop('checked', data.program_pameran);
                    $("#brosur").prop('checked', data.program_brosur);
                    $("#lomba").prop('checked', data.program_lomba);
                    $("#bos").prop('checked', data.sumber_bos);
                    $("#apbd").prop('checked', data.sumber_apbd);
                    $("#sumber-lain").prop('checked', data.sumber_lainnya);
                    $("#pelajaran").prop('checked', data.alokasi_pelajaran);
                    $("#pengayaan").prop('checked', data.alokasi_pengayaan);
                    $("#sumber-lain").prop('checked', data.sumber_lainnya);
                    $("#penambahan").text(data.penambahan_buku);
                    $("#pengunjung").text((data.pengunjung_harian == 1) ? 'Diatas 5%' : 'Dibawah 5%');

                    $('#table input:checkbox').click(() => false)
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
        var url = "{{ route('filterPemberdayaan', [':id', ':tahun']) }}";
        url = url.replace(':id', id)
        url = url.replace(':tahun', tahun)
        getData(id, tahun, url, sekolah);
    });

    $('#edit').on('click', function(e) {
        id = $('#id-data').val();
        let tahun = $('#tahun-data').val();
        var url = "{{ route('editPemberdayaan', [':id', ':tahun']) }}";
        url = url.replace(':id', id)
        url = url.replace(':tahun', tahun)
        var urlUpdate = "{{ route('updatePemberdayaan', ':id') }}";
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
                $('.modal-title').text("Edit Data Pemberdayaan Perpustakaan " + $(
                    '#list-sekolah option:selected').text() + " Tahun " + data.tahun)
                $("#slogan-form").val(data.slogan);
                $("#leaflet-form").prop('checked', data.program_leaflet);
                $("#penyuluhan-form").prop('checked', data.program_penyuluhan);
                $("#banner-form").prop('checked', data.program_banner);
                $("#pameran-form").prop('checked', data.program_pameran);
                $("#brosur-form").prop('checked', data.program_brosur);
                $("#lomba-form").prop('checked', data.program_lomba);
                $("#bos-form").prop('checked', data.sumber_bos);
                $("#apbd-form").prop('checked', data.sumber_apbd);
                $("#sumber-form").prop('checked', data.sumber_lainnya);
                $("#pelajaran-form").prop('checked', data.alokasi_pelajaran);
                $("#pengayaan-form").prop('checked', data.alokasi_pengayaan);
                $("#alokasi-form").prop('checked', data.alokasi_lainnya);
                $("#penambahan-form").val(data.penambahan_buku);
                $('#form').find(":radio[name=radio-pengunjung][value=" + data
                        .pengunjung_harian +
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
            url: "{{ route('createPemberdayaan') }}",
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
        var urlStore = "{{ route('storePemberdayaan') }}";
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
        let slogan = $('#slogan-form').val()
        let leaflet = ($('#leaflet-form').prop('checked') == true) ? '1' : '0';
        let penyuluhan = ($('#penyuluhan-form').prop('checked') == true) ? '1' : '0';
        let banner = ($('#banner-form').prop('checked') == true) ? '1' : '0';
        let pameran = ($('#pameran-form').prop('checked') == true) ? '1' : '0';
        let brosur = ($('#brosur-form').prop('checked') == true) ? '1' : '0';
        let lomba = ($('#lomba-form').prop('checked') == true) ? '1' : '0';
        let pengunjung = $('input[name="radio-pengunjung"]:checked').val()
        let bos = ($('#bos-form').prop('checked') == true) ? '1' : '0';
        let apbd = ($('#apbd-form').prop('checked') == true) ? '1' : '0';
        let sumber = ($('#sumber-form').prop('checked') == true) ? '1' : '0';
        let pelajaran = ($('#pelajaran-form').prop('checked') == true) ? '1' : '0';
        let pengayaan = ($('#pengayaan-form').prop('checked') == true) ? '1' : '0';
        let alokasi = ($('#alokasi-form').prop('checked') == true) ? '1' : '0';
        let penambahan = $('#penambahan-form').val()


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
                slogan: slogan,
                leaflet: leaflet,
                penyuluhan: penyuluhan,
                banner: banner,
                pameran: pameran,
                brosur: brosur,
                lomba: lomba,
                pengunjung: pengunjung,
                bos: bos,
                apbd: apbd,
                sumber: sumber,
                pelajaran: pelajaran,
                pengayaan: pengayaan,
                alokasi: alokasi,
                penambahan: penambahan,

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
