<script src="..\assets\jquery-3.6.0.min.js"></script>
<script src="..\assets\jquery-ui\jquery-ui.min.js"></script>
<script src="..\assets\bootstrap\js\popper.min.js"></script>
<script src="..\assets\bootstrap\js\bootstrap.min.js"></script>

<script src="..\assets\datatables.net\js\jquery.dataTables.min.js"></script>
<script src="..\assets\DataTables\datatables.min.js"></script>
<script src="..\assets\chart.js\Chart.js"></script>
<script src="..\assets\chart.js\Chart.HorizontalBar.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="..\assets\html2canvas.js"></script>
<script src="..\assets\PDFObject-master\pdfobject.min.js"></script>
<script src="..\assets\DOMPurify-main\dist\purify.min.js"></script>
<script src="..\assets\jsPDF-master\dist\jspdf.umd.min.js"></script>

<script src="..\assets\chart.js\dist\chart.min.js"></script>
<script>
    $(function() {
        // enable tooltips everywhere
        $('[data-toggle="tooltip"]').tooltip()
        
        const url = window.location;
        // $(".sidebar-menu a.nav-link").filter(function() {
        //     return this.href == url;
        // }).removeClass("text-white-50").parent().addClass("active");

        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

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

    $(document).on("click","#update_account",function(){
        const id = $(this).attr("data-id");
        $.ajax({
            method:'POST',
            url:"users_row.php",
            data:{
                id
            },
            dataType:"json",
            success:function(res){
                $("#account_fname").val(res.fullname);
                $("#account_uname").val(res.username);
                $("#account_pass").val(res.password);
                $("#account_address").val(res.address);
                $("#account_id").val(res.uID);
                $("#account_gender").val(res.gender).html(res.gender);
            }
        })
    })
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