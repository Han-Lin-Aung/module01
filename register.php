<?php

include("connection.php");

if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "SELECT username FROM users WHERE username = ?"
    );

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        echo "User already exists";
    } else {

        $stmt = $conn->prepare(
            "INSERT INTO users (username, password) VALUES (?, ?)"
        );

        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "Register Successful";
        } else {
            echo "Register Failed: " . $stmt->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <?php include("header.php") ?>

    <div class="container">
        <form method="post" class="w-50 mx-auto p-2 rounded" style="border: 2px solid black;">
            <h2 class="text-center">register</h2>
            <div class="mb-4">
                <label for="form-label">Name</label>
                <input class="form-control" type="text" name="username">
            </div>
            <div class="mb-4">
                <label for="form-label">password</label>
                <input class="form-control" type="text" name="password">
            </div>
            <button class="btn btn-success" type="submit" name="submit">register</button>
        </form>
        <p class="text-center mp-5">already account?<a href="login.php">login</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>