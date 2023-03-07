<section class="content">
    <div class="container-fluid">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">Profile</div>
            <div class="card-body">
                @php
                    $avatar = Auth::user()->avatar;
                @endphp
                <div class="mx-auto d-block">
                    {{-- <label for="foto-user" class="col-sm-4 col-form-label">FOTO PENGGUNA</label> --}}
                    <label for="self-image" class="mx-auto d-block">
                        <a title="Foto Ruas">
                            <img id="self-foto" src="{{ asset("assets/image/avatar/$avatar") }}" alt="Ruas"
                                class="rounded-circle img-thumbnail mx-auto d-block"
                                style="cursor:pointer; height: 150px; width: 150px">
                        </a>
                    </label>
                    <p class="text-center" style="font-style: italic; font-size: 12px">
                        *klik untuk merubah foto</p>
                    <input id="self-image" type="file" style="display: none;"
                        accept="image/png, image/jpg, image/jpeg" />

                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item mx-auto d-block ">
                            <h5 class="fs-bold">{{ Auth::user()->name }}</h5>
                        </li>
                    </ul>
                </div>
                {{-- @foreach ($user as $u)
                    {{ $u->name }}
                    {{ $u->perpustakaan->nama_sekolah }}
                    {{ $u->perpustakaan->nama_perpustakaan }}
                    {{ $u->perpustakaan->nama_kepala }}
                    {{ $u->perpustakaan->no_hp_kepala }}
                @endforeach --}}
                {{-- Nama :{{ $user['name'] }}
                <br>
                email : {{ $user['email'] }}
                <br>
                Institusi : {{ $user->perpustakaan['nama_sekolah'] }}
                <br>
                Alamat Institusi : {{ $user->perpustakaan['alamat_sekolah'] }}
                <br>
                Nama Perpustakaan : {{ $user->perpustakaan['nama_perpustakaan'] }}
                <br>
                Kepala Perpustakaan : {{ $user->perpustakaan['nama_kepala'] }}
                <br>
                No. Telepon : {{ $user->perpustakaan['no_hp_kepala'] }} --}}



            </div>
        </div>
    </div>
</section>
