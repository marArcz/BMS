<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<script src="..\assets\bootstrap\js\popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="..\assets\datatables.net\js\jquery.dataTables.min.js"></script>
<script src="..\assets\DataTables\datatables.min.js"></script>
<!-- <script src="..\assets\jquery-3.6.0.min.js"></script> -->
<!-- <script src="..\assets\jquery-ui\jquery-ui.min.js"></script> -->

<!-- <script src="..\assets\bootstrap\js\bootstrap.min.js"></script> -->

<!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js" integrity="sha512-tVYBzEItJit9HXaWTPo8vveXlkK62LbA+wez9IgzjTmFNLMBO1BEYladBw2wnM3YURZSMUyhayPCoLtjGh84NQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.3/purify.min.js" integrity="sha512-gtcrasYnyeB27+IejClswFlb/eggt+khRr+lLAeNcgg5x2ijlWaiBOPXZkwivNj15LaE6s9CzV57hsoTPrQ5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js" integrity="sha512-V/C9Axb8EEL4ix79ERIJmpRd6Mp1rWVSxa2PIBCdCxqhEsfCBWp/R0xJ4U495czhcuDWrGOFYo8+QI3lJ9DK5g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        // enable tooltips everywhere
        $('[data-toggle="tooltip"]').tooltip()

        const url = window.location;
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        // for treeview
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu  .treeview-menu").addClass('active');


        // $('#table').DataTable({
        //     'paging': true,
        //     'lengthChange': true,
        //     'searching': true,
        //     'ordering': true,
        //     'info': true,
        //     'autoWidth': false
        // })
        $(document).ready(function() {
            $('#table').DataTable();
        });
        $(".pagination li").addClass("page-item");
        $(".pagination li a").addClass("page-link");
    })

    $(document).on("click", "#update_account", function() {
        const id = $(this).attr("data-id");
        $.ajax({
            method: 'POST',
            url: "users_row.php",
            data: {
                id
            },
            dataType: "json",
            success: function(res) {
                $("#account_fname").val(res.fullname);
                $("#account_uname").val(res.username);
                $("#account_pass").val(res.password);
                $("#account_address").val(res.address);
                $("#account_id").val(res.uID);
                $("#account_img_preview").attr("src", res.photo);
                $("#account_gender").val(res.gender).html(res.gender);
            }
        })
    })

    document.getElementById("account_fileBox").onchange = function(e) {
        $("#account_img_preview").attr("src", URL.createObjectURL(e.target.files[0]))
    }
</script>

<?php
$count = run_query("SELECT * FROM baranggay");
if ($count->num_rows == 0) {
    $curr_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $_SESSION['prev_page'] = $curr_link;
?>
    <script>
        $("#add-baranggay-modal").modal("show");
    </script>
<?php
}
?>