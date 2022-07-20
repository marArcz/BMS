<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Memos</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini skin-blue-light">
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
            // get baranggay 
            $query = run_query("SELECT * FROM baranggay");
            $baranggay = $query->fetch_assoc();
            $query = run_query("SELECT * FROM officials INNER JOIN positions ON officials.position = positions.id WHERE positions.description LIKE '%Captain%'");
            $captain = $query->fetch_assoc();

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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="page1-tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true">Page 1</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-target-editor="#page2-editor" data-index='1' id="page2-tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false">Page 2</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-target-editor="#page3-editor" data-index='2' id="page3-tab" data-toggle="tab" href="#page3" role="tab" aria-controls="page3" aria-selected="false">Page 3</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="page1-tab">
                                <textarea name="" id="page1-editor" data-instanced="1" class="memo-editor form-control rounded-0 border-light position-relative" style="height:1056px">
                                    <div class="container my-4 f-roman text-primary">
                                        <div class="row my-0">
                                            <div class="col">
                                                <div class="row justify-content-end">
                                                    <div class="col-6 ">
                                                    <img src="<?php echo $baranggay['cityLogo'] ?>" class="img-fluid"  alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-center">
                                                <p class="my-0"><small>Republic of the Philippines</small></p>
                                                <p class="my-0"><small>Province of <?php echo $baranggay['province'] ?></small></p>
                                                <p class="text-uppercase my-0"><small>Municipality of <?php echo $baranggay['city'] ?></small></p>
                                                <p class="text-uppercase my-0">
                                                    <small><strong>Barangay <?php echo $baranggay['name'] ?></strong></small>
                                                </p>
                                                <p class="mt-3">OFFICE OF THE LUPONG TAGAPAMAYAPA</p>
                                            </div>
                                            <div class="col text-right">
                                            <div class="row justify-content-start">
                                                <div class="col-6 text-right">
                                                <img src="<?php echo $baranggay['baranggayLogo'] ?>" class="img-fluid"  alt="">
                                                </div>
                                            </div>
                                                
                                            </div>
                                        </div>
                                        <hr class="my-1">
                                        <div>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control border-left-0 border-top-0  border-right-0 text-primary">
                                                    <input type="text" class="form-control border-left-0 border-top-0  border-right-0 text-primary">
                                                    <p class="mt-3">Complainant/s</p>
                                                </div>
                                                <div class="col text-right">
                                                    <div class="text-right">
                                                        <div class="d-flex justify-content-start">
                                                            <p for="" class="my-1 w-100">Brgy. Case No:</p>
                                                            <input type="text" class="form-control border-left-0 border-top-0  border-right-0 w-100 text-primary">
                                                        </div>
                                                        <div class="d-flex justify-content-start">
                                                            <p for="" class="my-1 w-100">For:</p>
                                                            <input type="text" class="form-control border-left-0 border-top-0  border-right-0 w-100 text-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <ul class="pl-3 mb-0">
                                            <li class="m-0 p-0 ">Against-</li>
                                        </ul>
                                       <div class="row mt-0">
                                            <div class="col-5">
                                                <input type="text" class="form-control border-left-0 border-top-0  border-right-0 text-primary">
                                                <input type="text" class="form-control border-left-0 border-top-0  border-right-0 text-primary">
                                            </div>
                                       </div>
                                        <p class="mt-3">Respondent/s</p>
                                        <br>
                                        <div class="text-center">
                                            <p class="f-poppins">COMPLAINT/S</p>
                                            <p class="f-poppins my-0">
                                                I/WE hereby complain against above named person/s for violating my/our 
                                                rights and interest in the following manner:
                                            </p>
                                        </div>
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <p class="f-poppins my-0">THEREFORE, I/WE pray that the following relief/s be granted to me/us in accordance with law and/or equity.</p>
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">

                                        <br>
                                    <div class="f-poppins d-flex text-primary align-items-end justify-content-center">
                                        <p class="my-0 f-poppins">Made this</p>
                                        <input type="text" style="width: 70px;" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="my-0 f-poppins">day of</p>
                                        <input type="text" style="width: 100px;" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="my-0 f-poppins"><?php echo date('Y') ?>.</p>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-5">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                            <p class="f-poppins text-center">Complaint/s</p>
                                        </div>
                                    </div>
                                    <div class="f-poppins d-flex text-primary align-items-end justify-content-start">
                                        <p class="my-0 f-poppins">Recieved and filed this</p>
                                        <input type="text" style="width: 70px;" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="my-0 f-poppins">day of</p>
                                        <input type="text" style="width: 100px;" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="my-0 f-poppins"><?php echo date('Y') ?>.</p>
                                    </div>
                                    <br><br>
                                    
                                    <div class="">
                                        <p class="f-poppins mb-0 text-uppercase"><strong class="f-poppins"><?php echo $captain['firstname'] . ' ' . $captain['middlename'][0] . '. ' . $captain['lastname'] ?></strong></p>
                                        <p class="f-poppins ">Punong Barangay / Lupon chairman</p>
                                    </div>
                                    </div>
                                    

                                </textarea>
                            </div>
                            <div class="tab-pane fade w-100" id="page2" role="tabpanel" aria-labelledby="page2-tab">
                                <textarea name="" data-instanced='0' id="page2-editor" class="memo-editor form-control rounded-0 border-light position-relative" style="height:1056px"></textarea>
                            </div>
                            <div class="tab-pane fade w-100" id="page3" role="tabpanel" aria-labelledby="page3-tab">
                                <textarea name="" data-instanced='0' id="page3-editor" class="memo-editor form-control rounded-0 border-light position-relative" style="height:1056px"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </div>
    <?php include "./includes/scripts.php" ?>
    <script type="text/javascript" src="./includes/niceEdit.js"></script>
    <?php include "./includes/summon-modal.php" ?>

    <script>
        const loadPage1 = () => {
            let content = $("#page1-editor").val()
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
                    'fontSize',
                    'forecolor'
                ]
            }).panelInstance('page1-editor')

            // set page 1 content
            setTimeout(() => $($(".nicEdit-main")[0]).html(content), 300)
        }
        bkLib.onDomLoaded(function() {
            loadPage1()
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(event) {
            let editor = $(this).data("target-editor")

            if (String($(editor).data("instanced")) === '0') {
                console.log("not yet instanced: ", $(editor))
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
                }).panelInstance($(editor).attr('id'));
                $(editor).attr("data-instanced", '1')
            }
        })

        function setBaranggayDetails() {
            $("#baranggayLogo").attr("src", "<?php echo $baranggay['baranggayLogo'] ?>")
            $("#cityLogo").attr("src", "<?php echo $baranggay['cityLogo'] ?>")
            $("#city-txt").html("<?php echo $baranggay['city'] ?>")
            $("#baranggay-name").html("<?php echo $baranggay['name'] ?>")
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
                    format: "legal",
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
            // $.post("get-memo.php", function(res) {
            //     console.log(res);
            //     $($(".nicEdit-main")[0]).html(res);
            //     setBaranggayDetails()
            // })
        })

        // save memo's content for every 10 secs 
        $(function() {
            let interval = setInterval(function() {
                let saved = true
                $.each($('.memo-editor'), function(index, editor) {
                    if (Boolean($(editor).data('instanced')) == false) {
                        saved = false;
                        return;
                    }
                })
                if (saved) {
                    $("#save-status-txt").html("Saving changes...");
                    $.post("save-summon.php", {
                        'page1': $($(".nicEdit-main")[0]).html(),
                        'page2': $($(".nicEdit-main")[1]).html(),
                        'page3': $($(".nicEdit-main")[2]).html(),
                    }, function(res) {
                        console.log(res);
                        setTimeout($("#save-status-txt").html("Changes Saved<i class='bx bx-check'></i>"), 1000);
                        // setTimeout($("#save-status-txt").html("Changes are save automatically..."),5000);
                    })
                } else {
                    console.log("nothing to save yet")
                }
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