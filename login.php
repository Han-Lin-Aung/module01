<?php
session_start();
include("connection.php");

$message = "";

if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT username, password FROM users WHERE username = ?"
    );

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['username'] = $user['username'];

        header("Location: index.php");
        exit();
    } else {

        $message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

    <?php include("header.php"); ?>

    <div class="container mt-5">

        <form
            method="POST"
            class="w-50 mx-auto p-4 rounded"
            style="border: 2px solid black;">

            <h2 class="text-center mb-4">
                Login
            </h2>

            <?php if ($message): ?>

                <div class="alert alert-danger">
                    <?php echo $message; ?>
                </div>

            <?php endif; ?>

            <!-- Username -->
            <div class="mb-4">

                <label class="form-label">
                    Username
                </label>

                <input
                    class="form-control"
                    type="text"
                    name="username"
                    required>

            </div>

            <!-- Password -->
            <div class="mb-4">

                <label class="form-label">
                    Password
                </label>

                <input
                    class="form-control"
                    type="password"
                    name="password"
                    required>

            </div>

            <!-- Login Button -->
            <button
                class="btn btn-success w-100"
                type="submit"
                name="submit">
                Login
            </button>

        </form>

        <p class="text-center mt-3">
            No account?
            <a href="register.php">Register</a>
        </p>

    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>