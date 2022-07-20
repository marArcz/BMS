<?php 
include "./includes/session.php";

if(!isset($_GET['id'])){
    header("Location: ballot.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballot Configuration</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="bg-light">
    <?php include "./includes/topbar.php" ?>
    <div class="">
        <div class="row gx-1">
            <?php include "./includes/sideMenu.php" ?>

            <main class="col pt-3 px-1 pr-2 mx-0">
                <!-- Fetch baranggay info -->
                <?php 
                    $query = run_query("SELECT * FROM baranggay WHERE id=" .$_GET['id']);
                    $baranggay = $query->fetch_assoc();
                ?>
                <div class="container-fluid">
                    <section class="row my-0 py-0">
                        <div class="col-sm my-0">
                            <h5 class="text-black-50 m-0">Ballot Form</h5>
                        </div>
                        <div class="col-sm-auto">
                            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="justify-content-end text-right m-0">
                                <ol class="breadcrumb bg-light my-0 mx-0">
                                    <li class="breadcrumb-item"><a href="success.php">Home</a></li>
                                    <li class="breadcrumb-item active d-flex align-items-center" aria-current="page"><i class="fa fa-sticky-note mx-1"></i> Ballot</li>
                                </ol>
                            </nav>
                        </div>
                    </section>
                    <hr>
                    <?php
                    include "./includes/alert.php";
                    ?>
                    <section>
                        <div class="card m-0">
                            <div class="card-body">
                            <p class="mt-0 mb-4 text-black-50 text-center"><small> <i class="fa-info-circle fa"></i> Here you can edit the order of the ballot.</small></p>
                                <hr>
                                <p><?php echo $baranggay['description'] ?> Ballot Form</p>
                                <div class="row row-cols-1 justify-content-center">
                                    <!-- fetch -->
                                    <?php
                                    $sql = "SELECT *, id AS posID,description AS position FROM position ORDER BY priority ASC";
                                    $posQuery = run_query($sql);
                                    while ($row = $posQuery->fetch_assoc()) {
                                        $sql = "SELECT * FROM candidate WHERE positionID = ? AND baranggayID = ?";
                                        $query = prep_stmt($sql);
                                        $id = 2;
                                        $query->bind_param('ii',$row['posID'],$_GET['id']);
                                        $query->execute();
                                        $res = $query->get_result();
                                    ?>
                                        <div class="col-8">
                                            <div class="card shadow mb-3">
                                                <div class="card-body pb-5">
                                                    <div class="row row-cols-2">
                                                        <div class="col">
                                                            <p><?php echo $row['position'] ?></p>
                                                        </div>
                                                        <div class="col text-right">
                                                            <div class="dflex">
                                                            <?php 
                                                                if($row['priority'] == 1){
                                                            ?>
                                                                <button class="btn disabled" data-id="<?php echo $row['posID'] ?>" data-priority="<?php echo $row['priority'] ?>">
                                                                    <span class="bx-up-arrow bx"></span>
                                                                </button>
                                                                <button class="down btn" data-id="<?php echo $row['posID'] ?>" data-priority="<?php echo $row['priority'] ?>">
                                                                    <span class="bxs-down-arrow bx"></span>
                                                                </button>
                                                            <?php
                                                                }else if($row['priority'] == $posQuery->num_rows){
                                                            ?>
                                                                <button class="up btn" data-id="<?php echo $row['posID'] ?>" data-priority="<?php echo $row['priority'] ?>">
                                                                    <span class="bxs-up-arrow bx"></span>
                                                                </button>
                                                                <button class="btn disabled " data-id="<?php echo $row['posID'] ?>" data-priority="<?php echo $row['priority'] ?>">
                                                                    <span class="bx-down-arrow bx"></span>
                                                                </button>
                                                            <?php
                                                                }else{
                                                            ?>
                                                                  <button class="up btn" data-id="<?php echo $row['posID'] ?>" data-priority="<?php echo $row['priority'] ?>">
                                                                    <span class="bxs-up-arrow bx"></span>
                                                                </button>
                                                                <button class="down btn disabled " data-id="<?php echo $row['posID'] ?>" data-priority="<?php echo $row['priority'] ?>">
                                                                    <span class="bxs-down-arrow bx"></span>
                                                                </button>
                                                            <?php
                                                                }
                                                            ?>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="text-secondary"><small> <i class="fa-info-circle fa"></i> <?php echo $row['maxVote'] > 1? "You may select ".$row['maxVote']." candidate":"Select only one candidate" ?></small></p>
                                                    <?php
                                                        while($can = $res->fetch_assoc()){
                                                    ?>
                                                    <div class="row row-cols-2 mb-5">
                                                        <div class="col-2 align-self-center">
                                                            <?php
                                                                if($row['maxVote'] > 1){
                                                            ?>
                                                                <input type="checkbox" name="<?php echo remove_space($row['position']).'[]' ?>" id="" value="<?php echo $can['id'] ?>" required>
                                                            <?php
                                                                }else{
                                                            ?>
                                                                <input type="radio" name="<?php echo remove_space($row['position']) ?>" id="" class="form-control-md ml-3 " value="<?php echo $can['id'] ?>" required>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="col text-center">
                                                            <div class="row">
                                                                <div class="col">
                                                                <img src="<?php echo $can['image'] ?>" alt="" class="img-fluid ballot-img rounded" width="100px" height="100px">
                                                                </div>
                                                                <div class="col align-self-center">
                                                                    <h4><?php echo $can['firstname']." ".$can['lastname'] ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <?php
                                                        }
                                                        ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
    <?php include "./includes/scripts.php" ?>
    <?php include "./includes/votesModal.php" ?>
    <script>
        function moveUp(id){
            $.ajax({
                type: 'POST',
                url: "up_ballot.php",
                data: {
                    id
                },
                dataType: "json",
                success: (response) => {
                    console.log("res: ",response)
                    location.reload();
                }
            })

        }
        function moveDown(id){            
            $.ajax({
                type: 'POST',
                url: "down_ballot.php",
                data: {
                    id
                },
                dataType: "json",
                success: (response) => {
                    console.log("res: ",response)
                    location.reload();
                }
            })

        }
        

        $(document).on("click",".up",function(e){
            const id = $(this).attr("data-id");
            moveUp(id);
        })
        $(document).on("click",".down",function(e){
            const id = $(this).attr("data-id");
            moveDown(id);
        })
    </script>
</body>


</html>