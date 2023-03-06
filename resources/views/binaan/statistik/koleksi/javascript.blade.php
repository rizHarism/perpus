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
    // char js koleksi judul

    const jPelajaran = {{ json_encode($pelajaran_judul) }};
    const jPanduan = {{ json_encode($panduan_judul) }};
    const jFiksi = {{ json_encode($fiksi_judul) }};
    const jNonFiksi = {{ json_encode($non_fiksi_judul) }};
    const jReferensi = {{ json_encode($referensi_judul) }};
    const jKaryaGuru = {{ json_encode($guru_judul) }};
    const jKaryaSiswa = {{ json_encode($siswa_judul) }};

    // setup blog
    const jData = {
        labels: ['Buku Pelajaran', 'Buku Panduan', 'Buku FIksi', 'Buku Non Fiksi', 'Karya Guru', 'Karya Siswa'],
        datasets: [{
            label: '# Jumlah',
            data: [jPelajaran, jPanduan, jFiksi, jNonFiksi, jKaryaGuru, jKaryaSiswa],
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
    const config = {
        type: 'bar',
        data: jData,
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
    const koleksiJudul = new Chart(
        $('#koleksi-judul'),
        config
    );


    // chart js koleksi Eksemplar

    const ePelajaran = {{ json_encode($pelajaran_eksemplar) }};
    const ePanduan = {{ json_encode($panduan_eksemplar) }};
    const eFiksi = {{ json_encode($fiksi_eksemplar) }};
    const eNonFiksi = {{ json_encode($non_fiksi_eksemplar) }};
    const eReferensi = {{ json_encode($referensi_eksemplar) }};
    const eKaryaGuru = {{ json_encode($guru_eksemplar) }};
    const eKaryaSiswa = {{ json_encode($siswa_eksemplar) }};

    // setup blog
    const eData = {
        labels: ['Buku Pelajaran', 'Buku Panduan', 'Buku FIksi', 'Buku Non Fiksi', 'Buku Referensi', 'Karya Guru',
            'Karya Siswa'
        ],
        datasets: [{
            label: '# Jumlah',
            data: [ePelajaran, ePanduan, eFiksi, eNonFiksi, eReferensi, eKaryaGuru, eKaryaSiswa],
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
    const eConfig = {
        type: 'bar',
        data: eData,
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
    const koleksiEks = new Chart(
        $('#koleksi-eks'),
        eConfig
    );


    // chart js Standart Referensi

    const standarReferensi = {{ json_encode($referensi_judul) }};

    // setup blog
    const rData = {
        labels: ['Jumlah Standar', 'Jumlah Buku Referensi'],
        datasets: [{
            label: '# Jumlah',
            data: [10, standarReferensi],
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
    const rConfig = {
        type: 'bar',
        data: rData,
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
    const standRef = new Chart(
        $('#standar-referensi'),
        rConfig
    );

    // chart js Standart Sumber Belajar

    const standarSumber = {{ json_encode($sumber_belajar) }};

    // setup blog
    const sData = {
        labels: ['Jumlah Standar', 'Jumlah Sumber Belajar'],
        datasets: [{
            label: '# Jumlah',
            data: [10, standarSumber],
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
    const standSum = new Chart(
        $('#standar-sumber'),
        sConfig
    );

    // chart js Perbandingan fiksi/non-fiksi Judul

    // setup blog
    const fjData = {
        labels: ['Buku Fiksi (Judul)', 'Buku Non Fiksi (Judul)'],
        datasets: [{
            label: '# Jumlah',
            data: [jFiksi, jNonFiksi],
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
    const fjConfig = {
        type: 'pie',
        data: fjData,
    };

    // render block
    const fiksiJudul = new Chart(
        $('#fiksi-judul'),
        fjConfig
    );

    // chart js Perbandingan fiksi/non-fiksi Eksemplar

    // setup blog
    const feData = {
        labels: ['Buku Fiksi (Eksemplar)', 'Buku Non Fiksi (Eksemplar)'],
        datasets: [{
            label: '# Jumlah',
            data: [eFiksi, eNonFiksi],
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
    const feConfig = {
        type: 'pie',
        data: feData,
    };

    // render block
    const fiksiEks = new Chart(
        $('#fiksi-eks'),
        feConfig
    );

    // chart js Perbandingan text/pengayaan Judul

    // setup blog
    const tjData = {
        labels: ['Buku Text (Judul)', 'Buku Pengayaan (Judul)'],
        datasets: [{
            label: '# Jumlah',
            data: [jPelajaran + jPanduan, jFiksi + jNonFiksi + jReferensi],
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
    const tjConfig = {
        type: 'pie',
        data: tjData,
    };

    // render block
    const textJudul = new Chart(
        $('#teks-judul'),
        tjConfig
    );

    // chart js Perbandingan text/pengayaan Eksemplar

    // setup blog
    const teData = {
        labels: ['Buku Text (Eksemplar)', 'Buku Pengayaan (Eksemplar)'],
        datasets: [{
            label: '# Jumlah',
            data: [ePelajaran + ePanduan, eFiksi + eNonFiksi + eReferensi],
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
    const teConfig = {
        type: 'pie',
        data: teData,
    };

    // render block
    const textEks = new Chart(
        $('#teks-eks'),
        teConfig
    );
</script>
