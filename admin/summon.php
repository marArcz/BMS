<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Memos</title>
    <?php include "./includes/header.php" ?>
    <style>
        .nicEdit-panel {
            /* background: white !important; */
            border: none !important;
            padding: 10px !important;
        }

        .nicEdit-selected {
            border: 2px solid #0000ff !important;
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
                    Summon
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
                <div class="card shadow-sm  mx-auto" style="width:768px">
                    <div class="card-header">
                        <button data-target="#printModal" id="preview" data-toggle="modal" class="btn btn-primary btn-sm btn-rounded">Print Summon</button>

                    </div>
                    <div class="card-body bg-white">
                        <div id="page1-editor" data-instanced="1" class="memo-editor rounded-0 border-light" style="min-height: 1248px;">
                            <div class="container p-4 f-roman text-primary">
                                <div class="row my-0">
                                    <div class="col">
                                        <div class="row justify-content-end">
                                            <div class="col-6 ">
                                                <img src="<?php echo $baranggay['cityLogo'] ?>" class="img-fluid" alt="">
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
                                                <img src="<?php echo $baranggay['baranggayLogo'] ?>" class="img-fluid" alt="">
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
                                <ul class="pl-3 mb-0">
                                    <li class="m-0 p-0 ">Against-</li>
                                </ul>
                                <div class="row mt-0">
                                    <div class="col-5">
                                        <input type="text" class="form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    </div>
                                </div>
                                <p class="mt-2">Respondent/s</p>
                                <p class="text-center">SUMMONS</p>
                                <div class="row gx-0">
                                    <div class="col-auto m-0">
                                        <p class="m-0">TO:</p>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <p class="text-center">Respondent/s</p>

                                    </div>
                                </div>

                                <p class="text-center my-0">
                                    You are hereby summoned to appear before me, in person together with your
                                </p>
                                <div class="d-flex align-items-end justify-content-center">
                                    <p class="my-0"> witnesses on the </p>
                                    <input type="text" style="width: 70px;" class="py-0 pb-0 text-center my-0 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    <p class="my-0"> day of</p>
                                    <input type="text" style="width: 120px;" class="py-0 text-center my-0 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    <p class="my-0"><?php echo date("Y") ?> at</p>
                                    <input type="text" style="width: 70px;" class="py-0 text-center my-0 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    <p class="my-0">o'clock in the</p>

                                </div>
                                <div class="my-2 text-center">
                                    morning/afternoon then and there to answer to a complianant made before me, copy of which is attached hereto for the mediation / conciliation of your dispute with complainant
                                </div>
                                <br>
                                <p class="text-center">You are hereby warned that if you refuse or witfully fail to appear in obedience to this summons, you shall be barred from filing any counterclaim arising from said complainant.</p>
                                <br>
                                <p class="text-center">FAIL NOT or else face punishment as for contempt of court</p>
                                <div class="d-flex align-items-end justify-content-center">
                                    <p class="my-0">This</p>
                                    <input type="text" style="width: 70px;" class="py-0 pb-0 text-center my-0 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    <p class="my-0">day of</p>
                                    <input type="text" style="width: 70px;" class="py-0 pb-0 text-center my-0 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    <p class="my-0"><?php echo date('Y') ?>.</p>
                                </div>
                                <br><br><br><br>

                                <div class="text-right">
                                    <p class="f-poppins mb-0 text-uppercase"><strong class="f-poppins"><?php echo $captain['firstname'] . ' ' . $captain['middlename'][0] . '. ' . $captain['lastname'] ?></strong></p>
                                    <p class="f-poppins ">Punong Barangay / Lupon chairman</p>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
                <div class="card mt-3 mx-auto" style="width:768px">
                    <div class="card-body">
                        <div name="" id="page2-editor" class="  memo-editor rounded-0 border-light position-relative" style="min-height:1248px">
                            <div class="container p-4 text-primary">
                                <p class="text-center"><strong>OFFICER'S RETURN</strong></p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p class="text-center">
                                            I served this summon upon respondent
                                        </p>
                                        <input type="text" class="py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    </div>

                                </div>
                                <div class="d-flex align-items-end">
                                    <p class="my-0">On this</p>
                                    <input type="text" class="mx-1 py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary" style="width: 80px">
                                    <p class="my-0">day of</p>
                                    <input type="text" class="mx-1 py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary" style="width:200px">
                                    <p class="my-0">. 2022 and upon respondent</p>
                                </div>
                                <div class="d-flex align-items-end">
                                    <input type="text" class="mx-1 py-1 my-1 w-50 form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    <p class="my-0">on the</p>
                                    <input type="text" class="mx-1 py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary" style="width: 85px">
                                    <p class="my-0">day of</p>
                                    <input type="text" class="mx-1 py-1 my-1 form-control border-left-0 border-top-0  border-right-0 text-primary" style="width: 85px">
                                    <p class="my-0">. 2022.</p>
                                </div>

                                <p class="mt-2">(Write name/s of respondent/s before mode by which he/they was/were served)</p>
                                <p>Respondent/s</p>
                                <div class="mt-2 row">
                                    <div class="col-md">
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                    </div>
                                    <div class="col-md">
                                        <p class="my-2">1. Handling to him / them said summon in person, or</p>
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="col-md">
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                    </div>
                                    <div class="col-md">
                                        <p class="my-2">2. Handling to him / them said summon but he / they refused to receive it, or</p>
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="col-md">
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                    </div>
                                    <div class="col-md">
                                        <p class="my-2">3. Leaving said summons at his/ their dwelling with</p>
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="text-center">Name</p>
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="col-md"></div>
                                    <div class="col-md">
                                        <p class="my-2">
                                            A person of suitable age and discretion residing therein, or
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="col-md">
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                    </div>
                                    <div class="col-md">
                                        <p class="my-2">4. Leaving said summons at his/ their office / place of business with</p>
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="text-center">Name</p>

                                        <p>A competent person in charge thereof.</p>

                                        <input type="text" class="mt-3 text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="text-center">Officer</p>

                                    </div>
                                </div>
                                <p class="text-start">
                                    Received by respondent/s representative/s.
                                </p>
                                <div class="mt-2 row">
                                    <div class="col-md">
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="text-center">Signature</p>
                                    </div>
                                    <div class="col-md">
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="text-center">Date</p>
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="col-md">
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="text-center">Signature</p>
                                    </div>
                                    <div class="col-md">
                                        <input type="text" class=" text-center f-poppins border-top-0 border-left-0 border-right-0 form-control mx-1">
                                        <p class="text-center">Date</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mt-3 mx-auto" style="width:768px">
                    <div class="card-body">
                        <div name="" id="page3-editor" class="  memo-editor rounded-0 border-light position-relative" style="min-height:1248px">
                            <div class="container p-4  f-roman text-primary">
                                <div class="row my-0">
                                    <div class="col">
                                        <div class="row justify-content-end">
                                            <div class="col-6 ">
                                                <img src="<?php echo $baranggay['cityLogo'] ?>" class="img-fluid" alt="">
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
                                                <img src="<?php echo $baranggay['baranggayLogo'] ?>" class="img-fluid" alt="">
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
                                <ul class="pl-3 mb-0">
                                    <li class="m-0 p-0 ">Against-</li>
                                </ul>
                                <div class="row mt-0">
                                    <div class="col-5">
                                        <input type="text" class="form-control border-left-0 border-top-0  border-right-0 text-primary">
                                        <input type="text" class="form-control border-left-0 border-top-0  border-right-0 text-primary">
                                    </div>
                                </div>
                                <p class="mt-2">Respondent/s</p>
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
                                    <p class="my-0 f-poppins">Received and filed this</p>
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
        var myNicEditor = new nicEditor()

        const loadPages = () => {


        }
        bkLib.onDomLoaded(function() {
            // loadPages()
        });

        function setBaranggayDetails() {
            $("#baranggayLogo").attr("src", "<?php echo $baranggay['baranggayLogo'] ?>")
            $("#cityLogo").attr("src", "<?php echo $baranggay['cityLogo'] ?>")
            $("#city-txt").html("<?php echo $baranggay['city'] ?>")
            $("#baranggay-name").html("<?php echo $baranggay['name'] ?>")
        }
        $("#print").click(function() {
            var opt = {
                margin: 0,
                padding: 0,
                html2canvas: {
                    scale: 1
                },
                jsPDF: {
                    unit: "in",
                    format: [8, 15],
                    orientation: 'portrait',
                    font: 'Times New Roman'
                }
            };
            var page1 = $("#page1-form")[0]
            var page2 = $("#page2-form")[0]
            var page3 = $("#page3-form")[0]
            var pages = [page1, page2, page3]
            let doc = html2pdf().set(opt).from(pages[0]).toPdf()
            for (let x = 1; x < pages.length; x++) {
                doc = doc.get('pdf').then(
                    pdf => {
                        pdf.addPage()
                    }
                ).from(pages[x]).toContainer().toCanvas().toPdf()
            }
            console.log('proccessing to print')
            doc.get('pdf').then(pdf => {
                console.log("printing")
                pdf.autoPrint()
                window.open(pdf.output('bloburl'), '_blank');
            })

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
                        page1: nicEditors.findEditor("page1-editor").getContent(),
                        page2: nicEditors.findEditor("page2-editor").getContent(),
                        page3: nicEditors.findEditor("page3-editor").getContent(),
                    }, function(res) {
                        console.log(res);
                        setTimeout(() => {
                            $("#save-status-txt").html("Changes Saved<i class='bx bx-check'></i>")
                        }, 1000);
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





        $("#preview").click(function() {
            var page1 = $('#page1-editor')
            var page2 = $('#page2-editor')
            var page3 = $('#page3-editor')
            $("#page1-form").html(page1.html());
            $("#page2-form").html(page2.html());
            $("#page3-form").html(page3.html());

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