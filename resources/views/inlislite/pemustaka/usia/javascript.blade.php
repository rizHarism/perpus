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

        // Filter catalog berdasarkan range tahun terbit
        $('#filter-usia').on('submit', (e) => {
            e.preventDefault()
            var lokasi = $('#lokasi').val();
            var memberStatus = $('#status').val();
            var url = "{{ route('memberUsiaFilter', ':request') }}";
            url = url.replace(':request', memberStatus)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    $('#card-header').html('');
                    $('#card-header').html(data.message);
                    $('#member-anak').html('');
                    $('#member-anak').html(data.member_anak);
                    $('#member-sd').html('');
                    $('#member-sd').html(data.member_sd);
                    $('#member-smp').html('');
                    $('#member-smp').html(data.member_smp);
                    $('#member-sma').html('');
                    $('#member-sma').html(data.member_sma);
                    $('#member-remaja').html('');
                    $('#member-remaja').html(data.member_remaja);
                    $('#member-dewasa').html('');
                    $('#member-dewasa').html(data.member_dewasa);
                    $('#member-lansia').html('');
                    $('#member-lansia').html(data.member_lansia);
                }
            });
        })
    })
</script>
