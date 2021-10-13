<?php

include 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Web Contact Form</title>
</head>

<body>
    <div class="container">
        <div>
            <a href="form.php" class='btn btn-m btn-primary mt-4'><i class="fa fa-plus"></i> Add Contact Form</a>
        </div>
        <table class="table table-striped table-hover table-bordered mt-3">
            <thead class="table-dark">
                <th>User Name</th>
                <th>User Email</th>
                <th>User Issue</th>
                <th>User Comment</th>
                <th>Action</th>
            </thead>

            <?php

            $sqlGet = "SELECT * FROM user";
            $query = mysqli_query($conn, $sqlGet);

            while ($data = mysqli_fetch_array($query)) {
                echo "
                    <tbody>
                        <tr>
                            <td>$data[username]</td>
                            <td>$data[user_email]</td>
                            <td>$data[user_issue]</td>
                            <td>$data[user_comment]</td>
                            <td>
                            <div class='row'>
                                <div class='col d-flex justify-content-center'>
                                    <a href='edit.php?user_email=$data[user_email]' class='btn btn-sm btn-warning'><i class='fa fa-edit'></i> Edit</a>
                                </div>
                                <div class='col d-flex justify-content-center'>
                                    <a href='delete.php?user_email=$data[user_email]' class='btn btn-sm btn-danger' name='delete'><i class='fa fa-trash'></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                ";
            }
            ?>
        </table>
    </div>
</body>