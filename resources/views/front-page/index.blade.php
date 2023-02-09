<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    @include('layouts.assets.stylesheet')
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* body {
            font-family: "Open Sans";
            color: #fff;
        } */

        section {
            background: url("{{ asset('assets/image/background/soekarno-crop.jpg') }}");
            /* background: wheat; */
            height: 100vh;
            width: 100%;
            background-size: cover;
            background-position: center center;
        }

        .title-container {
            position: absolute;
            top: 15%;
            left: 25%;
            transform: translate(-50%, -50%);
            width: auto;
            padding: 30px 30px;
            /* border-radius: 10px;
            box-shadow: 7px 7px 60px #000; */
            text-align: center;
        }

        .form-container {
            background-color: rgb(15, 16, 14);
            opacity: 0.7;
            position: absolute;
            top: 50%;
            left: 25%;
            transform: translate(-50%, -50%);
            width: 380px;
            padding: 30px 30px;
            border-radius: 10px;
            box-shadow: 7px 7px 60px #000;
            color: #ffffff;
        }

        .button-container {
            background-color: rgb(15, 16, 14);
            opacity: 0.7;
            position: absolute;
            top: 55%;
            left: 25%;
            transform: translate(-50%, -50%);
            /* width: 400px; */
            padding: 30px 30px;
            border-radius: 10px;
            box-shadow: 7px 7px 60px #000;
            color: #ffffff;
        }

        h2 {
            color: #ffffff;
            /* font-size: 2em; */
            /* font-family: 'Helvetica Neue'; */
            text-transform: uppercase;
            text-align: center;
            /* margin-bottom: 2rem; */
        }

        .control input {
            padding: 10px;
            font-size: 16px;
            display: block;
            width: 100%;
            color: #000;
            background: #ddd;
            outline: none;
            border: none;
            margin: 1em 0;

        }

        .control .btn {
            color: #fff;
            text-transform: uppercase;
            background: rgb(28, 134, 220);
            opacity: .7;
            transition: opacity .3s ease;
        }

        .btn:focus {
            opacity: 1;
        }

        p {
            text-align: center;
            vertical-align: center;
        }

        span {
            vertical-align: center;
        }

        a {
            text-decoration: none;
            color: #fff;
            opacity: .7;
        }

        a:hover {
            opacity: 1;
        }

        .button-img {
            /* background: white; */
            border-radius: 10%
        }
    </style>
</head>

<body>
    <section>
        <div class="title-container">
            <div class="row">
                <div class="col"></div>
            </div>
            <img class="logo" src="{{ asset('assets/image/logo/logo-kota-blitar.png') }}" alt="" width="80"
                height="100">
            <h2>SIM PERPUSTAKAAN</h2>
            <h2>PEMERINTAH KOTA BLITAR</h2>
        </div>
        <div class="button-container" id="button-group">
            <div class="row border rounded shadow-lg p-2 btn-custom" data-id="koleksi" style="cursor: pointer">
                <div class="col-sm-2 ">
                    <img class="shadow-lg button-img" src="{{ asset('assets/icon/front-page/sirkulasi.png') }}"
                        alt="" height="50" width="50">
                </div>
                <div class="col-sm-10  d-flex my-auto">
                    <span class="h5">DATA KOLEKSI & PEMUSTAKA</span>
                </div>
            </div>
            <hr>
            <div class="row border rounded shadow-lg p-2 btn-custom" data-id="binaan" style="cursor: pointer">
                <div class="col-sm-2 ">
                    <img class="shadow-lg button-img" src="{{ asset('assets/icon/front-page/library.png') }}"
                        alt="" height="50" width="50">
                </div>
                <div class="col-sm-10  d-flex my-auto">
                    <span class="h5">PERPUSTAKAAN BINAAN</span>
                </div>
            </div>
            <hr>
            <div class="row border rounded shadow-lg p-2 btn-custom" data-id="survey" style="cursor: pointer">
                <div class="col-sm-2 ">
                    <img class="shadow-lg button-img" src="{{ asset('assets/icon/front-page/survey.png') }}"
                        alt="" height="50" width="50">
                </div>
                <div class="col-sm-10  d-flex my-auto">
                    <span class="h5">SURVEY KEPUSTAKAWANAN</span>
                </div>
            </div>
            <hr>
            <div class="row border rounded shadow-lg p-2 btn-custom" data-id="pustakawan" style="cursor: pointer">
                <div class="col-sm-2 ">
                    <img class="shadow-lg button-img" src="{{ asset('assets/icon/front-page/training.png') }}"
                        alt="" height="50" width="50">
                </div>
                <div class="col-sm-10  d-flex my-auto">
                    <span class="h5">KINERJA PUSTAKAWAN</span>
                </div>
            </div>
            <br>
            <div class="row border rounded shadow-lg p-2 btn-custom" data-id="bidang" style="cursor: pointer">
                <div class="col-sm-2 ">
                    <img class="shadow-lg button-img" src="{{ asset('assets/icon/front-page/desk.png') }}"
                        alt="" height="50" width="50">
                </div>
                <div class="col-sm-10  d-flex my-auto">
                    <span class="h5">KINERJA BIDANG</span>
                </div>
            </div>
        </div>

        <div class="form-container mt-3" id="form-login" style="display: none">
            <form id="login-form" method="POST">
                @csrf
                <div class="back-button mt-0" style="cursor: pointer"><i class="fa fa-chevron-circle-left"> </i> Kembali
                </div>
                <hr>
                <div class="control mt-2">
                    <label for="name">E-mail</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="control">
                    <label for="psw">Kata Sandi</label>
                    <input type="password" id="psw" name="password">
                </div>
                <br>
                <div class="control">
                    <input type="submit" class="btn" value="Masuk">
                </div>
            </form>
        </div>
    </section>
    @include('layouts.assets.javascript')
</body>

<script>
    $(document).ready(function() {
        $(".btn-custom").click(function() {
            let val = $(this).data('id');
            let urlCheck = null;
            let csrf_token = '{{ csrf_token() }}'

            console.log(val);

            if (val == 'koleksi') {
                $('#login-form').attr('action', "{{ route('inlisliteLogin') }}");
                urlCheck = "{{ route('inlisliteAuth') }}";
            } else if (val == 'binaan') {
                $('#login-form').attr('action', "{{ route('binaanLogin') }}");
                urlCheck = "{{ route('binaanAuth') }}";
            }

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': csrf_token,
                },
                url: urlCheck,
                dataType: "json",
                success: function(data) {
                    console.log(data.auth)
                    if (data.auth) {
                        window.location.href = data.route;
                    } else {
                        $("#button-group").fadeOut();
                        $("#form-login").delay(500).fadeIn('slow');
                    }
                }
            });

        });

        $(".back-button").click(function() {
            $("#form-login").fadeOut();
            $("#button-group").delay(500).fadeIn('slow');
        });


    });
</script>

</html>
