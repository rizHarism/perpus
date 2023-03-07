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
    $(document).ready(function() {

        var table = $('#table-user').DataTable({
            processing: true,
            ajax: {
                url: "{{ route('inlisliteUserDatatable') }}",
                method: 'GET'
            },
            columns: [{
                    data: 'DT_RowIndex'
                },
                {
                    data: 'name'
                },
                {
                    data: 'username'
                },
                {
                    data: 'permissions',
                    render: function(data) {
                        let names = data.map(x => x.name);
                        return names.join("<br/>");
                    },
                },
                {
                    data: 'id',
                    width: '10px',
                    orderable: false,
                    render: function(data) {
                        let id = data;
                        var editButton =
                            "<i class='fa fa-pencil edit-data' data-id=" + id + "></i>";
                        var button = editButton;

                        return button;
                    }
                },
                {
                    data: null,
                    width: '10px',
                    orderable: false,
                    render: function(data) {
                        var deleteButton =
                            "<i class='fas fa-trash-alt delete-data' data-nama='" + data.name +
                            "' data-id='" + data.id + "'></i>";
                        var button = deleteButton;

                        return button;
                    }
                }
            ]
        });

        $(document).on("click", ".tambah-data", function() {
            let urlStore = "{{ route('inlisliteUserStore') }}";
            $('#user-form').attr('action', urlStore);
            $('#user-form').attr('method', 'POST');
            $('#password-1').prop('required', true);
            $('#password-2').prop('required', true);
            $('#password-1').attr('placeholder', 'Isikan Password');
            $('#password-2').attr('placeholder', 'Ulangi Password');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('inlisliteUserCreate') }}",
                dataType: "json",
                async: false,
                success: function(response) {
                    $('.modal-title').text('Tambah Data User');
                    $('#nama').val('');
                    $('#username').val('');
                    $('#password-1').val('');
                    $('#password-2').val('');
                    $('#row-permission').html('');
                    let num = 1;
                    let cbNum = 1;
                    $.each(response.permissionsFormatted, (i, data) => {
                        $.each(data, (x, dt) => {
                            $('#row-permission').append(
                                `<div class="form-check form-check-inline col-sm-4 mt-2">
                                    <input class="form-check-input" name="permissions" type="checkbox" id="checkbox` +
                                cbNum +
                                `" value="` + dt.value + `">
                                    <label class="form-check-label" for="checkbox` + cbNum + `"> DATA ` + dt.name
                                .toUpperCase() + `</label>
                                </div>`);
                            cbNum++
                        })
                        num++;
                    })
                    // Display Modal
                    $('#user-modal').modal('show');
                }
            })
        })

        $(document).on("click", ".edit-data", function() {
            let id = $(this).data('id');
            let url = "{{ route('inlisliteUserEdit', ':id') }}";
            url = url.replace(':id', id)
            let urlUpdate = "{{ route('inlisliteUserUpdate', ':id') }}";
            urlUpdate = urlUpdate.replace(':id', id)
            $('#user-form').attr('action', urlUpdate);
            $('#user-form').attr('method', 'PUT');
            $('#password-1').removeAttr('required');
            $('#password-2').removeAttr('required');
            $('#password-1').val('');
            $('#password-2').val('');
            $('#password-1').attr('placeholder', 'Kosongkan jika tidak ingin merubah password');
            $('#password-2').attr('placeholder', 'Kosongkan jika tidak ingin merubah password');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: url,
                dataType: "json",
                async: false,
                success: function(response) {
                    $('.modal-title').text('Edit Data ' + response.user.name);
                    $('#nama').val(response.user.name);
                    $('#username').val(response.user.username);
                    $('#row-permission').html('');
                    let num = 1;
                    let cbNum = 1;
                    let cbVal = Object.values(response.userPermissions);
                    var centang = 'checked';
                    $.each(response.permissionsFormatted, (i, data) => {
                        $.each(data, (x, dt) => {
                            (cbVal.includes(dt.value)) ? centang =
                                'checked': centang = '';
                            $('#row-permission').append(
                                `<div class="form-check form-check-inline col-sm-4 mt-2">
                                    <input class="form-check-input" name="permissions" type="checkbox" id="checkbox` +
                                cbNum +
                                `" value="` + dt.value + `" ` +
                                centang + `>
                                    <label class="form-check-label" for="checkbox` + cbNum + `"> DATA ` + dt.name
                                .toUpperCase() + `</label>
                                </div>`);
                            cbNum++
                        })
                        num++;
                    })
                    // Display Modal
                    $('#user-modal').modal('show');
                }
            });
        });

        $('#user-form').on('submit', (e) => {
            e.preventDefault();
            let permission = [];
            let name = $('#nama').val();
            let username = $('#username').val();
            let password = $('#password-1').val();
            $('input[name="permissions"]:checked').each(function() {
                permission.push(this.value);
            });
            let urlSave = ($("#user-form").attr('action'))
            console.log(urlSave);
            let method = ($("#user-form").attr('method'))
            let formData = new FormData;
            formData.append('name', name);
            formData.append('username', username);
            formData.append('permission', permission);
            formData.append('password', password);
            formData.append('avatar', 'default-avatar.png');
            if (method == 'PUT') {
                formData.append('_method', 'PUT')
            }

            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    // 'Content-Type': 'application/json',
                },
                type: "POST",
                url: urlSave,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#user-modal').modal('hide');
                    swal.fire({
                        title: 'Berhasil',
                        text: data,
                        icon: 'success',
                    }).then(function() {
                        table.ajax.reload();
                    });
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        var html =
                            "<ul style='justify-content: space-between;'>";
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
            return false;

        });

        $(document).on("click", ".delete-data", function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            Swal.fire({
                title: 'Hapus Data ' +
                    nama,
                text: ' Apakah Anda yakin ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    let urlDelete = "{{ route('inlisliteUserDelete', ':id') }}";
                    urlDelete = urlDelete.replace(':id', id);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "DELETE",
                        url: urlDelete,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            Swal.fire(
                                'Berhasil',
                                data
                                .message,
                                'success',
                            );
                            table.ajax.reload();
                        },
                        error: (xhr, ajaxOptions,
                            thrownError) => {
                            console.log(xhr.responseJSON
                                .message);
                            if (xhr.responseJSON
                                .hasOwnProperty(
                                    'errors')) {
                                for (item in xhr
                                    .responseJSON
                                    .errors) {
                                    if (xhr
                                        .responseJSON
                                        .errors[
                                            item]
                                        .length) {
                                        for (var i =
                                                0; i <
                                            xhr
                                            .responseJSON
                                            .errors[
                                                item
                                            ]
                                            .length; i++
                                        ) {
                                            alert(xhr
                                                .responseJSON
                                                .errors[
                                                    item
                                                ]
                                                [
                                                    i
                                                ]
                                            );
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            })
        })
    })
</script>
