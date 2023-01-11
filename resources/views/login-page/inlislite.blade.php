<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Open Sans";
            color: #fff;
        }

        section {
            background: url("{{ asset('assets/image/background/soekarno.jpg') }}");
            height: 100vh;
            width: 100%;
            background-size: cover;
            background-position: center center;
        }

        .form-container {
            position: absolute;
            top: 50%;
            left: 30%;
            transform: translate(-50%, -50%);
            width: 380px;
            padding: 50px 30px;
            border-radius: 10px;
            box-shadow: 7px 7px 60px #000;
        }

        h1 {
            color: #ffffff;
            font-size: 2em;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 2rem;
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
        }

        a {
            text-decoration: none;
            color: #fff;
            opacity: .7;
        }

        a:hover {
            opacity: 1;
        }
    </style>
</head>

<body>
    <section>
        <div class="form-container">
            <h1>Inlislite Login</h1>
            <form action="index.html">
                <div class="control">
                    <label for="name">Nama Pengguna</label>
                    <input type="text" id="name">
                </div>
                <div class="control">
                    <label for="psw">Kata Sandi</label>
                    <input type="password" id="psw">
                </div>
                <span>.</span>
                {{-- <br> --}}
                <div class="control">
                    <input type="submit" class="btn" value="Masuk">
                </div>
            </form>
            {{-- <p><a href="#">Forget password ?</a></p> --}}
        </div>
    </section>
</body>

</html>
