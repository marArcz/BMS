<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Memos</title>
    <?php include "./includes/header.php" ?>
    <style>
        .nicEdit-selected{
            outline: none;            
        }
    </style>
</head>

<body class="hold-transition sidebar-mini theme-light-blue">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Memorandum
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home </a> </li>
                    <li class="active"> Memos</li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
            <!-- Main content -->
            <section class="content">
                <div class="card shadow-sm">
                    <div class="card-header d-flex align-items-center">
                        <button data-target="#printModal" id="preview" data-toggle="modal" class="btn btn-primary btn-sm btn-rounded">Preview</button>
                        <button data-target="#purposeModal" id="" data-toggle="modal" class="btn btn-default ml-2 btn-sm">New <i class="bx bx-plus"></i></button>
                        <p class="ml-auto my-1 text-black-50" id="save-status-txt">Changes are save automatically...</p>
                    </div>
                    <div class="card-body bg-white">
                        <textarea name="memo" id="memo" class="memo-editor form-control rounded-0 border-light position-relative" style="height:1056px">
                        <?php
                        // get baranggay 
                        $query = run_query("SELECT * FROM baranggay");
                        $baranggay = $query->fetch_assoc();
                        $query = run_query("SELECT * FROM officials INNER JOIN positions ON officials.position = positions.id WHERE positions.description LIKE '%Captain%'");
                        $captain = $query->fetch_assoc();
                        ?>
                       
                        </textarea>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <?php include "./includes/scripts.php" ?>
    <script type="text/javascript" src="./includes/niceEdit.js"></script>
    <?php include "./includes/memo-modal.php" ?>

    <script>
        bkLib.onDomLoaded(function() {
            new nicEditor({
                fullPanel: false,
                buttonList: [
                    'bold',
                    'italic',
                    'left',
                    'center',
                    'right',
                    'ul',
                    'ol',
                    'fontSize'
                ]
            }).panelInstance('memo');
        });

        function setBaranggayDetails() {
            $("#baranggayLogo").attr("src", "<?php echo $baranggay['baranggayLogo'] ?>")
            $("#cityLogo").attr("src", "<?php echo $baranggay['cityLogo'] ?>")
            $("#city-txt").html("<?php echo $baranggay['city'] ?>")
            $("#baranggay-name").html("<?php echo $baranggay['name'] ?>")
            $("#captain").html("<?php echo $captain['firstname'] ?> <?php echo $captain['lastname'] ?>")
        }
        $("#print").click(function() {
            var element = document.getElementById('memo-form');
            var opt = {
                margin: 0,
                padding: 0,
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: "in",
                    format: "letter",
                    orientation: 'portrait',
                    font: 'Times New Roman'
                }
            };
            html2pdf().set(opt).from(element).toPdf().get('pdf').then(function(pdfObj) {
                // pdfObj has your jsPDF object in it, use it as you please!
                // For instance (untested):
                pdfObj.autoPrint();
                window.open(pdfObj.output('bloburl'), '_blank');
            });
        })
        // load recently saved memo 
        $(function() {
            $.post("get-memo.php", function(res) {
                console.log(res);
                $($(".nicEdit-main")[0]).html(res);
                setBaranggayDetails()
            })
        })

        // save memo's content for every 10 secs 
        $(function() {
            let interval = setInterval(function() {
                $("#save-status-txt").html("Saving changes...");
                $.post("save-memo.php", {
                    'content': $($(".nicEdit-main")[0]).html()
                }, function(res) {
                    console.log(res);
                    setTimeout(() => {
                        $("#save-status-txt").html("Changes Saved<i class='bx bx-check'></i>")
                    }, 2000);
                    // setTimeout($("#save-status-txt").html("Changes are save automatically..."),5000);
                })
            }, 10000);
        })
        $("#purpose-form").submit(function(e) {
            e.preventDefault();
            let purpose = $("#purposeBox").val();
            $.ajax({
                url: "get-default-memo.php",
                dataType: "json",
                method: "POST",
                success: function(res) {
                    console.log("response", res.data.content);
                    $($(".nicEdit-main")[0]).html(res.data.content);
                    setBaranggayDetails()
                    $("#purpose-txt").html(purpose)
                    $("#purposeModal").modal('hide')
                    $($(".nicEdit-main")[0]).focus();

                    $.post("save-memo.php", {
                        'content': $($(".nicEdit-main")[0]).html()
                    }, function(res) {
                        console.log(res);
                    })
                }
            })
        })
        $("textarea").keydown(function(e) {
            if (e.keyCode === 9) { // tab was pressed
                // get caret position/selection
                var start = this.selectionStart;
                var end = this.selectionEnd;

                var $this = $(this);
                var value = $this.val();

                // set textarea value to: text before caret + tab + text after caret
                $this.val(value.substring(0, start) +
                    "\t" +
                    value.substring(end));

                // put caret at right position again (add one for the tab)
                this.selectionStart = this.selectionEnd = start + 1;

                // prevent the focus lose
                e.preventDefault();
            }
        });




        $("#preview").click(function() {
            $("#memo-form").html($($(".nicEdit-main")[0]).html());
        })

        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "permit_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    var fullname = `${res.firstname} ${res.middlename} ${res.lastname}`
                    $("#edit_resident").val(res.resID).html(fullname);
                    $("#edit_bname").val(res.businessName);
                    $("#edit_btype").val(res.type);
                    $("#edit_baddress").val(res.businessAddress);
                    $("#edit_ornumber").val(res.orNumber);
                    $("#edit_amount").val(res.amount);
                    $(".modal .id").val(id);
                    $(".modal .bname").html(res.businessName);
                }
            })
        }

        $(document).on("click", ".edit", function() {
            const id = $(this).attr("data-id");
            getRow(id);
        })
        $(document).on("click", ".delete", function() {
            const id = $(this).attr("data-id");
            getRow(id);
        })
    </script>
</body>


</html>