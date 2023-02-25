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
    // char js Statistik anggota siswa

    const siswa = {{ json_encode($siswa) }};
    const sPengunjung = {{ json_encode($pengunjung_siswa) }};
    const sPeminjam = {{ json_encode($peminjam_siswa) }};
    const guru = {{ json_encode($guru) }};
    const gPengunjung = {{ json_encode($pengunjung_guru) }};
    const gPeminjam = {{ json_encode($peminjam_guru) }};

    console.log(guru)
    // setup blog
    const sData = {
        labels: ['Jumlah Siswa', 'Jumlah Anggota', 'Pengunjung/Bulan', 'Peminjam/Bulan', 'Pengunjung/Hari',
            'Peminjam/Hari'
        ],
        datasets: [{
            label: '# Jumlah',
            data: [siswa, siswa, Math.round(sPengunjung / 12), Math.round(sPeminjam / 12), Math.round(
                    sPengunjung / 240),
                Math.round(sPeminjam / 240)
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const sConfig = {
        type: 'bar',
        data: sData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    // render block
    const anggotaSiswa = new Chart(
        $('#anggota-siswa'),
        sConfig
    );

    // char js Statistik anggota guru

    // setup blog
    const gData = {
        labels: ['Jumlah Guru', 'Jumlah Guru', 'Pengunjung/Bulan', 'Peminjam/Bulan', 'Pengunjung/Hari',
            'Peminjam/Hari'
        ],
        datasets: [{
            label: '# Jumlah',
            data: [guru, guru, Math.round(gPengunjung / 12), Math.round(gPeminjam / 12), Math.round(
                    gPengunjung / 240),
                Math.round(gPeminjam / 240)
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const gConfig = {
        type: 'bar',
        data: gData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    // render block
    const anggotaGuru = new Chart(
        $('#anggota-guru'),
        gConfig
    );

    // chart.js Statistik Kunjungan Angota siswa bulan

    // setup blog
    const ksbData = {
        labels: ['Berkunjung', 'Tidak Berkunjung'],
        datasets: [{
            label: '# Jumlah',
            data: [Math.round(sPengunjung / 12), siswa - Math.round(sPengunjung / 12)],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const ksbConfig = {
        type: 'pie',
        data: ksbData,
    };

    // render block
    const ksbSiswa = new Chart(
        $('#ksb-siswa'),
        ksbConfig
    );

    // chart.js Statistik Kunjungan Angota siswa perhari

    // setup blog
    const kshData = {
        labels: ['Berkunjung', 'Tidak Berkunjung'],
        datasets: [{
            label: '# Jumlah',
            data: [Math.round(sPengunjung / 240), siswa - Math.round(sPengunjung / 240)],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const kshConfig = {
        type: 'pie',
        data: kshData,
    };

    // render block
    const kshSiswa = new Chart(
        $('#ksh-siswa'),
        kshConfig
    );

    // chart.js Statistik Peminjaman Angota siswa perbulan

    // setup blog
    const psbData = {
        labels: ['Meminjam', 'Tidak Meminjam'],
        datasets: [{
            label: '# Jumlah',
            data: [Math.round(sPeminjam / 12), siswa - Math.round(sPeminjam / 12)],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const psbConfig = {
        type: 'pie',
        data: psbData,
    };

    // render block
    const psbSiswa = new Chart(
        $('#psb-siswa'),
        psbConfig
    );

    // chart.js Statistik Peminjaman Angota siswa perhari

    // setup blog
    const pshData = {
        labels: ['Meminjam', 'Tidak Meminjam'],
        datasets: [{
            label: '# Jumlah',
            data: [Math.round(sPeminjam / 240), siswa - Math.round(sPeminjam / 240)],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const pshConfig = {
        type: 'pie',
        data: pshData,
    };

    // render block
    const pshSiswa = new Chart(
        $('#psh-siswa'),
        pshConfig
    );

    // chart.js Statistik Kunjungan guru perbulan

    // setup blog
    const kgbData = {
        labels: ['Berkunjung', 'Tidak Berkunjung'],
        datasets: [{
            label: '# Jumlah',
            data: [Math.round(gPengunjung / 12), guru - Math.round(gPengunjung / 12)],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const kgbConfig = {
        type: 'pie',
        data: kgbData,
    };

    // render block
    const kgbGuru = new Chart(
        $('#kgb-guru'),
        kgbConfig
    );

    // chart.js Statistik Kunjungan Angota guru perhari

    // setup blog
    const kghData = {
        labels: ['Berkunjung', 'Tidak Berkunjung'],
        datasets: [{
            label: '# Jumlah',
            data: [Math.round(gPengunjung / 240), guru - Math.round(gPengunjung / 240)],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const kghConfig = {
        type: 'pie',
        data: kghData,
    };

    // render block
    const kghGuru = new Chart(
        $('#kgh-guru'),
        kghConfig
    );

    // chart.js Statistik Peminjaman Angota guru perbulan

    // setup blog
    const pgbData = {
        labels: ['Meminjam', 'Tidak Meminjam'],
        datasets: [{
            label: '# Jumlah',
            data: [Math.round(gPeminjam / 12), guru - Math.round(gPeminjam / 12)],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const pgbConfig = {
        type: 'pie',
        data: pgbData,
    };

    // render block
    const pgbGuru = new Chart(
        $('#pgb-guru'),
        pgbConfig
    );

    // chart.js Statistik Peminjaman Angota guru perhari

    // setup blog
    const pghData = {
        labels: ['Meminjam', 'Tidak Meminjam'],
        datasets: [{
            label: '# Jumlah',
            data: [Math.round(gPeminjam / 240), guru - Math.round(gPeminjam / 240)],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

    // setup config
    const pghConfig = {
        type: 'pie',
        data: pghData,
    };

    // render block
    const pghGuru = new Chart(
        $('#pgh-guru'),
        pghConfig
    );
</script>
