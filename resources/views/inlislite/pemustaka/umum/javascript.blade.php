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
        $('#filter-umum').on('submit', (e) => {
            e.preventDefault()
            var memberStatus = $('#member-status').val();
            var url = "{{ route('memberUmumFilter', ':status') }}";
            url = url.replace(':status', memberStatus)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#card-header').html('');
                    $('#card-header').html(data.message);
                    $('#total-member').html('');
                    $('#total-member').html(data.total_member);
                    $('#member-male').html('');
                    $('#member-male').html(data.member_male);
                    $('#member-female').html('');
                    $('#member-female').html(data.member_female);
                    $('#member-blitar').html('');
                    $('#member-blitar').html(data.member_blitar);
                    $('#member-nonblitar').html('');
                    $('#member-nonblitar').html(data.member_non_blitar);
                }
            });
        })
    })
</script>
