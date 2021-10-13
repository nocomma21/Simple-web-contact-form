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
    <div class="container mt-3">
        <div class="w-50 mx-auto border p-3 mt-5">
            <a href="dashboard.php" class='btn btn-m btn-primary mt-2'><i class="fa fa-arrow-left"></i> Back To Home</a>
            <h3 class="mb-3 d-flex justify-content-center">Simple Web Contact Form</h3>
            <div class="row">
                <div class="col">
                    <form action="form.php" method="post">
                        <label for="username">Input User Name</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="example: diana" required>

                        <label for="user_email" class="mt-3">Input User Email Address</label>
                        <input type="text" id="user_email" name="user_email" class="form-control" placeholder="example: diana@gmail.com" required>

                        <label for="user_issue" class="mt-3">Select User Issue</label>
                        <select name="user_issue" id="user_issue" class="form-select" required>
                            <option value="Select User's Issue">Select User's Issue</option>
                            <option value="query">Query</option>
                            <option value="feedback">Feedback</option>
                            <option value="complaint">Complaint</option>
                            <option value="other">Other</option>
                        </select>

                        <label for="user_comment" class="mt-3">User Comment</label>
                        <br>
                        <textarea name="user_comment" id="user_comment" class="text-area" cols="75" rows="10" placeholder="Type Comment"></textarea>
                        <br>
                        <input class="btn btn-success mt-3" type="submit" name="add" value="Submit Form">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php

    if (isset($_POST['add'])) {
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_issue = $_POST['user_issue'];
        $user_comment = $_POST['user_comment'];

        $issueSelect = $_POST['user_issue'];
        if ($issueSelect == 'query') {
            $user_issue = 'Query';
        }
        if ($issueSelect == 'feedback') {
            $user_issue = 'Feedback';
        }
        if ($issueSelect == 'complaint') {
            $user_issue = 'Complaint';
        }
        if ($issueSelect == 'other') {
            $user_issue = 'Other';
        }

        $sqlGet = "SELECT * FROM user WHERE user_email='$user_email'";
        $queryGet = mysqli_query($conn, $sqlGet);
        $check = mysqli_num_rows($queryGet);

        $sqlInsert = "INSERT INTO user(username, user_email, user_issue, user_comment)
                      VALUES('$username', '$user_email', '$user_issue', '$user_comment')";
        $queryInsert = mysqli_query($conn, $sqlInsert);

        if (isset($sqlInsert) && $check <= 0) {
            echo "
                <div class='alert alert-success w-50 mt-5 d-flex justify-content-center'>Add Data Success <a href='dashboard.php'> View Data</a></div>
            ";
        } else if ($check >= 1) {
            echo "
                <div class='alert alert-danger w-50 mt-5 d-flex justify-content-center'>Failed, User Email Already Exist <a href='dashboard.php'> View Data</a></div>
            ";
        }
    }
    ?>

</body>