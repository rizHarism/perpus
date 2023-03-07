<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="#" class="brand-link">
        <div class="row">
            <div class="col-sm-2">
                <img src="{{ asset('assets/image/logo/logo-kab.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-rounded " style="opacity: .8">
            </div>
            <div class="col-sm-4">
                <p class="brand-text font-weight-light">Dinas Perumahan dan Kawasan Permukiman </p>
            </div>
        </div>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 ">
            <div class="row">
                <div class="col-2 ml-0">
                    {{-- <div class="image"> --}}
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/Lambang_Kota_Blitar.png"
                        class="img-rounded mt-1" alt="User Image">
                    {{-- </div> --}}
                </div>
                <div class="col-10 ">
                    <a class="d-block h7 font-italic mt-0">Dinas Perpustakaan</a>
                    <a class="d-block h7 font-italic mb-0">Kota Blitar</a>
                </div>
            </div>
            {{-- <div class="info">
            </div> --}}
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header">Integrasi Inlislite</li>
                @can('menu.koleksi')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Data Koleksi
                                <i class="fas fa-angle-left right"></i>
                                {{-- <span class="badge badge-info right">6</span> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview ms-5">
                            <li class="nav-item ">
                                <a href="{{ route('collectionCatalogue') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Katalog</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('collectionKlas') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Klas DDC</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('collectionSource') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Sumber</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('collectionLocation') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Lokasi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('menu.sirkulasi')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Data Sirkulasi
                                <i class="fas fa-angle-left right"></i>
                                {{-- <span class="badge badge-info right">6</span> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview ms-5">
                            <li class="nav-item ">
                                <a href="{{ route('circulationCatalogue') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Sirkulasi Katalog</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('circulationKlas') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Sirkulasi Klas DDC</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('circulationMember') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Sirkulasi Pemustaka</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('circulationUsia') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Sirkulasi Usia Pemustaka</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('circulationPekerjaan') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Sirkulasi Pekerjaan Pemustaka</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('menu.pemustaka')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Data Pemustaka
                                <i class="fas fa-angle-left right"></i>
                                {{-- <span class="badge badge-info right">6</span> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview ms-5">
                            <li class="nav-item ">
                                <a href="{{ route('memberUmum') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Data Umum</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview ms-5">
                            <li class="nav-item ">
                                <a href="{{ route('memberUsia') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Usia Pemustaka</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview ms-5">
                            <li class="nav-item ">
                                <a href="{{ route('memberPekerjaan') }}" class="nav-link">
                                    <i class="far fa-file nav-icon ml-3"></i>
                                    <p>Pekerjaan Pemustaka</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('menu.administrator')
                    <li class="nav-header">Administrator</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users-cog nav-icon "></i>
                            <p>
                                Administrator
                                <i class="fas fa-angle-left right"></i>
                                {{-- <span class="badge badge-info right">6</span> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview ms-5">
                            {{-- <li class="nav-item ">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-user-tag nav-icon ml-3"></i>
                                    <p>Hak Akses</p>
                                </a>
                            </li> --}}
                            <li class="nav-item ">
                                <a href="{{ route('inlisliteUser') }}" class="nav-link">
                                    <i class="fas fa-users nav-icon ml-3"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <li class="nav-header">KDR With Love</li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
