<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/database.php';

    $username = $_POST["username"];
    $password = $_POST["password"];


    echo 'Username: ' . htmlspecialchars($username) . '<br>';


    $stmt = $conn->prepare("SELECT * FROM users2002 WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        echo 'Password from DB: ' . $user['password'] . '<br>';
        
   
        if ($password === $user['password']) {
            $login = true;
            session_start();
            $_SESSION['logedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            $showError = "Invalid username or password";
        }
    } else {
        $showError = "Invalid username or password";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'partials/nav.php'; ?>

    <?php
    
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> '.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';   
    }
    ?>

    <div class="container p-4">
        <h1 class="text-center">Login to the website</h1>
        <form action="./login.php" method="POST"> 
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3 p-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <div id="emailHelp" class="form-text">Remember to use the same credentials.</div>
            </div>
            <div class="p-4">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
