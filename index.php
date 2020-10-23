<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php session_unset(); } ?>
            

            <div class="car carbody">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="fullname" class="form-control" placeholder="Full name" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="money" class="form-control" placeholder="$ money" required>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Upload">
                </form>

            </div>

        </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>$ Money</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $query = "SELECT * FROM tasks";
                        $resul_tasks = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($resul_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['fullname'] ?></td>
                                <td><?php echo $row['money'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <a href="edit.php? id=<?php echo $row['id'] ?>"class="btn btn-outline-info">
                                    <i class="fas fa-marker"></i></a>

                                    <a href="delete_task.php? id=<?php echo $row['id'] ?>"class="btn btn-outline-danger">
                                    <i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>

                        <?php }
                        ?>


                    </tbody>
                </table>

            </div>

    </div>

</div>

<?php include("includes/footer.php") ?>