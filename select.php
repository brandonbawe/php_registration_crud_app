<?php
// require 'DatabaseConnection.php';

$newSelectInstance = new DatabaseConnection();
$results = $newSelectInstance->selectData('registered_users');

?>
<table class="table container mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <?php
    foreach ($results as $row) {
        printf(
            "<tbody>
            <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>
                    <button class='btn btn-primary'><a href='update.php?id=%d' class='text-white text-decoration-none'>Edit</a></button> 
                    <button class='btn btn-danger'><a href='index.php?id=%d' class='text-white text-decoration-none'>Delete</a></button>
                </td>
            </tr>
        </tbody>",
            htmlspecialchars($row["id"], ENT_QUOTES),
            htmlspecialchars($row["name"], ENT_QUOTES),
            htmlspecialchars($row["email"], ENT_QUOTES),
            htmlspecialchars($row["id"], ENT_QUOTES),
            htmlspecialchars($row["id"], ENT_QUOTES)
        );
    }
    ?>
</table>