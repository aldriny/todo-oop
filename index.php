<?php
require_once 'inc/header.php';
require_once 'inc/connection.php';
require_once 'App.php';
?>

<body>

    <div class="container mb-5">
        <div class="row d-flex justify-content-center">

            <div class="container mb-5 d-flex justify-content-center">
                <div class="col-md-6">
                    <form action="handle/addToDo.php" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="Enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-primary mt-3">Add To Do</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="row d-flex justify-content-between">
            <?php
            require_once 'inc/success.php';
            require_once 'inc/error.php';
            ?>
            <!-- all -->
            <div class="col-md-3">
                <h4 class="text-secondary">All Notes</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">

                        <?php
                        $query = "SELECT * FROM todo WHERE status='created' ORDER BY created_at DESC";
                        $runQuery = $conn->query($query);
                        if ($runQuery->rowCount() > 0) {
                            while ($row = $runQuery->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <div class="alert alert-light border border-secondary p-3">
                                    <h5 class="text-dark"><?php echo $row['title'] ?></h5>
                                    <p class="text-muted"><?php echo $row['created_at'] ?></p>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="edit.php?id=<?php echo $row['id'] . '&title=' . $row['title'] ?>" class="btn btn-outline-secondary p-1">Edit</a>
                                        <a href="handle/goto.php?id=<?php echo $row['id'] . "&status=doing" ?>" class="btn btn-outline-secondary p-1">Doing</a>
                                    </div>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div class="item">
                                <div class="alert-light text-center border border-secondary mb-1">
                                    Empty to do
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- doing -->
            <div class="col-md-3">
                <h4 class="text-secondary">Doing</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">
                        <?php
                        $query = "SELECT * FROM todo WHERE status = 'doing'";
                        $runQuery = $conn->query($query);
                        if ($runQuery->rowCount() > 0) {
                            while ($row = $runQuery->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                                <div class="alert alert-light border border-warning p-3">
                                    <h5 class="text-dark"><?php echo $row['title'] ?></h5>
                                    <p class="text-muted"><?php echo $row['created_at'] ?></p>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="handle/goto.php?id=<?php echo $row['id'] . "&status=Done" ?>" class="btn btn-outline-secondary p-1">Done</a>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="item">
                                <div class="alert-light text-center border border-warning mb-1">
                                    Empty to do
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>

            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-secondary">Done</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">

                        <?php
                        $query = "SELECT * FROM todo WHERE status = 'done'";
                        $runQuery = $conn->query($query);
                        if ($runQuery->rowCount() > 0) {
                            while ($row = $runQuery->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                                <div class="alert alert-light border border-success p-3">
                                    <a href="handle/delete.php?id= <?php echo $row['id'] ?>" onclick="confirm('Are you sure?')" class="remove-to-do text-muted d-flex justify-content-end">
                                        <i class="fa fa-close" style="font-size:16px;"></i>
                                    </a>
                                    <h5 class="text-dark"><?php echo $row['title'] ?></h5>
                                    <p class="text-muted"><?php echo $row['created_at'] ?></p>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="item">
                                <div class="alert-light text-center border border-success mb-1">
                                    Empty to do
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>