<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <?php
    // Get the value of id and check if every part of it is a digit
    if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        // Redirect to index.php if id is not set.
        header('Location: index.php');
    }

    $name = $email = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $ok = true;
        $form_error = "<div class='container mt-4 alert alert-danger'>❌ Please all form fiels are required</div>";
        if (empty($_POST['name'])) {
            $ok = false;
            echo $form_error;
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['email'])) {
            $ok = false;
            echo $form_error;
        } else {
            $email = $_POST['email'];
        }

        if ($ok) {
            require 'DatabaseConnection.php';

            $newUpdateInstance = new DatabaseConnection();
            $newUpdateInstance->updateData($name, $email, $id);
        } else {
            $newDatabaseSelect = new DatabaseConnection();
            $result = $newDatabaseSelect->selectSingleRecord('registered_users', $id);

            foreach ($result as $row) {
                $name = $row['name'];
                $email = $row['email'];
            }
        }
    }

  
    ?>
    <h1 class="text-center pt-4">Update This Record</h1>
    <form action="" method="POST" class="container mt-4">
        <div class="form-group mb-4">
            <label for="name" class="pb-3">Name</label>
            <input type="text" class="form-control" name="name" id="" placeholder="Enter Your Name" value="<?php echo htmlspecialchars($name, ENT_QUOTES) ?>">
        </div>
        <div class="form-group mb-4">
            <label for="job-title" class="pb-3">Email</label>
            <input type="text" class="form-control" name="email" id="" placeholder="Enter Your Name" value="<?php echo htmlspecialchars($email, ENT_QUOTES) ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-success" name="submit">Update</button>
        </div>

    </form>
</body>

</html>