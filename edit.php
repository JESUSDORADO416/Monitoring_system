<?php

    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM tasks WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)  == 1){
            $row = mysqli_fetch_array($result);
            $fullname = $row['fullname'];
            $money = $row['money'];
            
        }
    }
    if(isset($_POST['update'])){
        //echo 'updating';
        $id = $_GET['id'];
        $fullname = $_POST['fullname'];
        $money = $_POST['money'];

        $query = "UPDATE tasks set fullname = '$fullname', money = '$money' WHERE id = $id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'Player updated successfully';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php? id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="fullname" value="<?php echo $fullname; ?>" class="form-control" placeholder="Update name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="money" value = "<?php echo $money; ?>" class="form-control" placeholder="Update money" required >
                    </div>
                    <button class="btn btn-success" name="update">
                        Update

                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>