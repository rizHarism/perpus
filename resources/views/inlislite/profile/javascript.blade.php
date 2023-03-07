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
    $('#edit').on('click', () => {
        $('#self-name').val("{!! Auth::user()->name !!}")
        $('#self-username').val("{!! Auth::user()->username !!}")
    })

    $("#self-image").change(function() {
        var ext = $('#self-image').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            swal.fire({
                title: 'Error',
                html: 'Foto profil pengguna harus file Gambar',
                icon: 'warning',
            })
            $("#self-image").val("")
        } else {
            changeImage(this);
        }
    });

    function changeImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#self-foto').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#self-edit").on("submit", function(e) {
        e.preventDefault();
        id = "{{ Auth::user()->id }}";
        let urlSave = "{{ route('inlisliteUpdateProfile') }}";
        let method = 'PUT';
        console.log($('input[type=file]')[0].files[0]);
        var formData = new FormData;

        formData.append('id', id);
        formData.append('namalengkap', $("#self-name").val());
        formData.append('username', $("#self-username").val());
        formData.append('image', $('input[type=file]')[0].files[0]);

        if (method == 'PUT') {
            formData.append('_method', 'PUT')
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
                $('#modal-profile').modal('hide');
                swal.fire({
                    title: 'Berhasil',
                    text: data,
                    icon: 'success',
                }).then(function() {
                    window.location = "{{ route('inlisliteProfile') }}";
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
    })


    $("#self-edit-pass").on("submit", function(e) {
        e.preventDefault();
        id = "{{ Auth::user()->id }}";
        let urlSave = "{{ route('inlisliteUpdatePassword') }}";
        let method = 'PUT';
        var formData = new FormData;

        formData.append('id', id);
        formData.append('old_password', $("#old-pass").val());
        formData.append('new_password', $("#new-pass").val());
        formData.append('new_password_conf', $("#new-pass-2").val());

        if (method == 'PUT') {
            formData.append('_method', 'PUT')
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
                console.log(data)
                if (data.status) {
                    $('#modal-pass').modal('hide');
                    swal.fire({
                        title: 'Berhasil',
                        text: data.message,
                        icon: 'success',
                    }).then(function() {
                        window.location.reload();
                    });
                } else {
                    swal.fire({
                        title: 'Gagal',
                        text: data.message,
                        icon: 'warning',
                    })
                }
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
    })
</script>
