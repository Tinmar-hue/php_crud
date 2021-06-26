<?php include("db.php") ?>
<?php include('includes/header.php') ?>
<div class="container p-4">
    <div class="col-md-4">

        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset();
        } ?>

        <div class="card card-body">
            <form action="save_task.php" method="POST">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="task title" autofocus>
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="description" autofocus></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save_task" value="save task">
            </form>

        </div>
    </div>
    <br>
    <div class="col-md-8">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created AT</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM task";
                $result_tasks = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
            <tbody>
                <tr>
                    <th><?php echo $row['title']; ?></th>
                    <th><?php echo $row['description']; ?></th>
                    <th><?php echo $row['created_at']; ?></th>
                    <th>
                        <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="far fa-edit"></i></a>
                        <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </th>
                </tr>
            <tbody>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<?php include('includes/footer.php') ?>