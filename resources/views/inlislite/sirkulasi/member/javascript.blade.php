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
        $('#filter-peminjam').on('submit', (e) => {
            e.preventDefault()
            var lokasi = $('#lokasi').val();
            var year1 = $('#year-1').val();
            var year2 = $('#year-2').val();
            var request = [lokasi, year1, year2];
            var url = "{{ route('circulationMemberFilter', ':request') }}";
            url = url.replace(':request', request)
            console.log(request)
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    $('#card-header').html('');
                    $('#card-header').html(data.message);
                    $('#member-total').html('');
                    $('#member-total').html(data.memberLoan);
                    $('#member-blitar').html('');
                    $('#member-blitar').html(data.memberLoanBlitar);
                    $('#member-nonblitar').html('');
                    $('#member-nonblitar').html(data.memberLoanNonBlitar);
                    $('#member-male').html('');
                    $('#member-male').html(data.memberLoanMale);
                    $('#member-female').html('');
                    $('#member-female').html(data.memberLoanFemale);
                }
            });
        })
    })
</script>
