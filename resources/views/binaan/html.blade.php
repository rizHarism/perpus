<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Profile</div>
            <div class="card-body">
                {{-- @foreach ($user as $u)
                    {{ $u->name }}
                    {{ $u->perpustakaan->nama_sekolah }}
                    {{ $u->perpustakaan->nama_perpustakaan }}
                    {{ $u->perpustakaan->nama_kepala }}
                    {{ $u->perpustakaan->no_hp_kepala }}
                @endforeach --}}
                Nama :{{ $user['name'] }}
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
                No. Telepon : {{ $user->perpustakaan['no_hp_kepala'] }}
            </div>
        </div>
    </div>
</section>
