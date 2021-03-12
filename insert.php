<?php
$name = '';
$email = '';
$form_error_message = "<div class='alert alert-danger'>All Fields are required</div>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ok = true;
    if (empty($_POST['name'])) {
        $ok = false;
        echo $form_error_message;
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        $ok = false;
        echo $form_error_message;
    } else {
        $email = $_POST['email'];
    }

    if ($ok === true) {
        //create new database instance so we can insert data into database
        $newInsertDatabaseInstance = new DatabaseConnection();
        $newInsertDatabaseInstance->insertData($name, $email);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Tutorial</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container my-4">
    <h1 class="text-center">Registration Form</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="name" class="py-2">Name</label>
                <input name="name" type="text" class="form-control my-3" placeholder="Please Enter Your Name">
            </div>
            <div class="form-group">
                <label for="email" class="py-2">Email</label>
                <input name="email" type="email" class="form-control my-3" placeholder="Please Enter Your Email">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
</body>

</html>