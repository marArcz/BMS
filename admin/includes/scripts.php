<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
<script src="../assets/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.0/js/adminlte.min.js" integrity="sha512-4LW2vmg8t+drPiNqhkUrtVZ3M/UCyhEhVasHYx7d+mXKjcw/G0BSuQ78FnkzPyWU23QBXtTUrKoPmX95KTLE4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="../assets//sweetalert2//dist//sweetalert2.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="../assets//qrcodejs-master//qrcode.min.js"></script>
<script src="../assets//Toast.js-master//dist//js//Toast.min.js"></script>
<script src="../assets//simditor-2.3.28//site//assets//scripts//module.js"></script>
<script src="../assets//simditor-2.3.28//site//assets//scripts//hotkeys.js"></script>
<script src="../assets//simditor-2.3.28//site//assets//scripts//uploader.js"></script>
<script src="../assets//simditor-2.3.28//site//assets//scripts//simditor.js"></script>
<script>
    <?php
    if (isset($_SESSION['success'])) {
    ?>
        Swal.fire('Success',"<?php echo $_SESSION['success'] ?>", "success")
    <?php
        unset($_SESSION['success']);
    } else if (isset($_SESSION['error'])) {

    ?>
        Swal.fire('Failed',"<?php echo $_SESSION['error'] ?>", "error")
    <?php
        unset($_SESSION['error']);
    }
    ?>

    <?php

    ?>

    $(function() {
        // enable tooltips everywhere
        // $('[data-toggle="tooltip"]').tooltip()

        const url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).addClass('border-primary').parent().addClass('active');

        // for treeview
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu  .treeview-menu").addClass('active');


        $('#table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
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