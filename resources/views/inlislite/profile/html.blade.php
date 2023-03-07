<section class="content">
    <div class="container-fluid">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">
                <h5>Profil Pengguna</h5>
            </div>
            <div class="card-body">
                @php
                    $avatar = Auth::user()->avatar;
                @endphp
                <div class="mx-auto d-block">
                    <label for="self-foto" class="mx-auto d-block">
                        <a title="Foto Profile">
                            <img id="image-user" src="{{ asset("assets/image/avatar/$avatar") }}" alt="Ruas"
                                class="rounded-circle img-thumbnail mx-auto d-block"
                                style=" height: 150px; width: 150px">
                        </a>
                    </label>

                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item mx-auto d-block ">
                            <h5 class="fs-bold" id="name">{{ Auth::user()->name }}</h5>
                        </li>
                    </ul>
                    <ul class="list-group list-group-flush ml-3 mr-3">
                        <li class="list-group-item mx-auto d-block ">
                            <h6 class="fs-bold" id="username"><i class="fa fa-user pr-2"
                                    aria-hidden="true"></i>{{ Auth::user()->username }}
                            </h6>
                        </li>
                        <li class="list-group-item mx-auto d-block  ">
                            <h6 class="fs-bold"><i class="fa fa-pencil pr-2" aria-hidden="true"></i><a href="#"
                                    data-target="#modal-profile" data-toggle="modal" id="edit">Edit
                                    Profile</a>
                            </h6>
                        </li>
                        <li class="list-group-item mx-auto d-block ">
                            <h6 class="fs-bold"><i class="fa fa-key pr-2" aria-hidden="true"></i><a href="#"
                                    data-target="#modal-pass" data-toggle="modal" id="pass">Edit
                                    Password</a>
                            </h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="modal-edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="self-edit" action="" method="">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Edit Profile - {{ Auth::user()->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mx-auto d-block">
                        <label for="self-image" class="mx-auto d-block">
                            <a title="Foto Profile">
                                <img id="self-foto" src="{{ asset("assets/image/avatar/$avatar") }}" alt="Ruas"
                                    class="rounded-circle img-thumbnail mx-auto d-block"
                                    style="cursor:pointer; height: 150px; width: 150px">
                            </a>
                        </label>
                        <p class="text-center" style="font-style: italic; font-size: 12px">
                            *klik untuk merubah foto</p>
                        <input id="self-image" type="file" style="display: none;"
                            accept="image/png, image/jpg, image/jpeg" />
                    </div>
                    <div class="form-group row">
                        <label for="self-name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="id-user" id="id-user" value=""
                                required>
                            <input type="text" class="form-control" name="self-name" id="self-name" value=""
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="self-username" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="self-username" id="self-username"
                                value="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" id="self-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-pass" tabindex="-1" aria-labelledby="modal-edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="self-edit-pass" action="" method=""
                oninput="newpass2.setCustomValidity(newpass2.value != newpass.value ? 'Passwords tidak sama.' : '')">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Edit Password - {{ Auth::user()->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="old-pass" class="col-sm-4 col-form-label">Password Lama</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" minlength="6" name="old-pass"
                                id="old-pass" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new-pass" class="col-sm-4 col-form-label">Password Baru</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" minlength="6" name="newpass"
                                id="new-pass" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new-pass-2" class="col-sm-4 col-form-label">Ulangi Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" minlength="6" name="newpass2"
                                id="new-pass-2" value="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" id="self-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
