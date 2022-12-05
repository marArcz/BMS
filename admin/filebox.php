<?php
include "./includes/session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Blotter</title>
    <?php include "./includes/header.php" ?>

    <style>
        #view_reason #text {
            word-wrap: break-word;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini theme-light-blue">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h6 style="font-family:poppins">
                    Resident's Files
                </h6>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home </a> </li>
                    <li class="active"> Resident's Files</li>
                </ol>
            </section>
            <hr class="mb-1">
            
            <!-- Main content -->
            <section class="content">
                <?php
                // get resident
                $query = run_query("SELECT * FROM residents WHERE id = " . $_GET['id']);
                $resident = $query->fetch_assoc();
                ?>
                <a href="residents.php" class="btn btn-sm btn-dark mb-2">
                    <i class="bx bx-arrow-back"></i>
                </a>
                <div class="card">

                    <div class="card-body bg-white">
                        <p class="mb-1"><?php echo $resident['firstname'] . ' ' . $resident['lastname']  ?></p>
                        <hr>
                        <div class="row">
                            <div class="col-md">
                                <!-- <p>
                                    <small>
                                        <strong>Stored Files</strong>
                                    </small>
                                </p> -->
                                <?php
                                $photos_ext = ['png', 'jpg', 'jpeg', 'webp', 'tiff', 'svg'];
                                $word_ext = ['doc', 'docx'];
                                $pdf_ext = ['pdf'];
                                $excel_ext = ['xlsx'];

                                $query = run_query("SELECT * FROM resident_files WHERE resident_id = " . $resident['id']);
                                while ($row = $query->fetch_assoc()) {
                                    $ext = substr(strrchr($row['file'], '.'), 1);
                                    $filename = substr(strrchr($row['file'], "/"), 1);
                                ?>
                                    <div class="card rounded-1 mb-3">
                                        <div class="card-body p-2">
                                            <div class="d-flex align-items-center">
                                                <?php
                                                // check if image
                                                if (in_array($ext, $photos_ext)) {
                                                    $type = "Image";
                                                ?>
                                                    <img src="../<?php echo $row['file'] ?>" class="img-fluid rounded-1" width="70" alt="<?php echo $row['file'] ?>">
                                                <?php
                                                } else if (in_array($ext, $word_ext)) {
                                                    $type = "Word Document";
                                                ?>
                                                    <img src="../assets/img/word-icon-png-4001.png" class="img-fluid rounded-1" width="70" alt="<?php echo $row['file'] ?>">

                                                <?php
                                                } else if (in_array($ext, $pdf_ext)) {
                                                    $type = "PDF";
                                                ?>
                                                    <img src="../assets/img/pdf-icon-png-2069.png" class="img-fluid rounded-1" width="60" alt="<?php echo $row['file'] ?>">
                                                <?php
                                                } else if (in_array($ext, $excel_ext)) {
                                                    $type = "Spreadsheet";
                                                    // $type = strtoupper($ext) . " file";

                                                ?>
                                                    <img src="../assets/img/Excel-Icon.png" class="img-fluid rounded-1" width="70" alt="<?php echo $row['file'] ?>">
                                                <?php
                                                } else {
                                                    $type = strtoupper($ext) . " file";
                                                ?>
                                                    <img src="../assets/img/file-icon.jpg" class="img-fluid rounded-1" width="50" alt="<?php echo $row['file'] ?>">
                                                <?php
                                                }
                                                ?>
                                                <div class="ml-3">
                                                    <p class="my-0">
                                                        <small><?php echo $filename ?></small>
                                                    </p>
                                                    <p class="text-gray my-0">
                                                        <small><?php echo $type ?></small>
                                                    </p>
                                                </div>
                                                <div class="ml-auto ">
                                                    <a target="_blank" download href="../<?php echo $row['file'] ?>" class="btn btn-sm btn-primary" type="button">
                                                        <span>Download</span>
                                                        <i class="bx bx-download"></i>
                                                    </a>
                                                    <a href="delete-file.php?id=<?php echo $row['id'] ?>&resident_id=<?php echo $row['resident_id'] ?>" class="btn btn-sm btn-danger delete">
                                                        <i class="bx bx-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }

                                if($query->num_rows == 0){
                                    ?>
                                    <p class="text-secondary">No files to show.</p>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="form-text mb-2">
                                            <small>Selected files</small>
                                        </p>
                                        <ul class="my-1 list-group mb-3" id="attachments-list"></ul>
                                        <button class="btn shadow-sm text-primary btn-light border btn-block" id="select-file"><i class="bx bx-plus"></i> Add a file</button>
                                        <input type="file" multiple name="file[]" class="d-none" id="file-chooser">

                                        <form enctype="multipart/form-data" action="upload-files.php" method="post" class="mt-2">
                                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                                            <div id="file-input-list"></div>
                                            <button class="btn btn-dark btn-block" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
              </div>

        </section>
    </div>

    </div>
    <?php include "./includes/scripts.php" ?>
    <?php include "./includes/blotterModal.php" ?>

    <script>
        $(function() {
            var files = [];
            var id = 1;
            const FILETYPE = {
                SPREADSHEET: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                WORDDOC: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                IMAGE: ['image/png', 'image/jpeg', 'image/gif', 'image/webp'],
                PDF: "application/pdf",
            }

            $("#select-file").on('click', function(e) {
                $("#file-chooser").trigger("click")
            })
            $("#file-chooser").on('change', function(e) {
                let files_chosen = e.target.files;
                var newFileInput = $("#file-chooser").clone().attr("id", `file-chooser-${id}`).addClass("file-input");

                $("#file-input-list").append(newFileInput);
                for (let file of files_chosen) {
                    files.push({
                        file,
                        id
                    });
                    var image = `../assets/img/file-icon.jpg`;

                    if (file.type == FILETYPE.SPREADSHEET) {
                        image = `../assets/img/Excel-Icon.png`;
                    } else if (file.type == FILETYPE.WORDDOC) {
                        image = `../assets/img/word-icon-png-4001.png`;
                    } else if (FILETYPE.IMAGE.includes(file.type)) {
                        image = URL.createObjectURL(file);
                    } else if (file.type == FILETYPE.PDF) {
                        image = `../assets/img/pdf-icon-png-2069.png`;
                    }

                    var item = `
                                        <li class="list-group-item" data-id="${id}">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div class="mr-2">
                                                            <img src="${image}" class="img-fluid" width="70" alt="">
                                                        </div>
                                                        <p class="my-0" title="${file.name}">
                                                            <small>${file.name.length > 15? file.name.substr(0,10)+"...":file.name}</small>
                                                        </p>
                                                        <div class="ml-auto">
                                                            <button class="btn btn-light pb-1 rounded-1 remove-attachment" data-id="${id}">
                                                                <i class="bx bx-x fs-5 text-secondary"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                        `

                    $("#attachments-list").prepend(item)
                    id += 1;
                }

                $(".remove-attachment").on("click", function(e) {
                    let id = $(this).data("id");

                    let newFiles = files.filter((item, index) => item.id !== id);
                    files = newFiles;
                    $(this).parent().parent().parent().remove()
                    console.log(files);
                })
            })

            $(".delete").on('click', function(e) {
                e.preventDefault();
                const url = $(this).attr('href')
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
            })
        })
    </script>
</body>


</html>