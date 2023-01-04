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
        $('#filter-pekerjaan').on('submit', (e) => {
            e.preventDefault()

            var status = $('#status').val();
            var url = "{{ route('memberPekerjaanFilter', ':request') }}";
            url = url.replace(':request', status)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data)
                    $('#card-header').html('');
                    $('#card-header').html(data.message);
                    $.each(data.result, (i, data) => {
                        $('#status-' + data.id).html('');
                        $('#status-' + data.id).html(data.total);
                    })

                }
            });
        })
    })
</script>
