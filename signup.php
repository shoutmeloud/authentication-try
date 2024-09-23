<?php
$showAlert = false;
$showError = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/database.php'; 

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

  
    $stmt = $conn->prepare("SELECT * FROM users2002 WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $numexistr = $result->num_rows;

  
    if ($numexistr > 0) {
        $showError = "Username already exists";
    } else {
      
        if ($password == $cpassword) {
          
            $stmt = $conn->prepare("INSERT INTO users2002 (username, password, date) VALUES (?, ?, current_timestamp())");
            $stmt->bind_param("ss", $username, $password); 
            $result = $stmt->execute();

       
            if ($result) {
                $showAlert = true; 
            } else {
                $showError = "An error occurred while creating the account";
            }
        } else {
            $showError = "Passwords do not match"; 
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'partials/nav.php'; ?>

    <?php
    
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        echo '<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Account created </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>login to visit the site .</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"> done</button>
      </div>
    </div>
  </div>
</div>'
header("Location: ");
    }
    
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> '.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';   
    }
    ?>

    <div class="container p-4">
        <h1 class="text-center">Signup to the website</h1>
        <form action="/login/signup.php" method="POST"> 
            <div class="mb-3 p-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3 p-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3 p-4">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                <div id="emailHelp" class="form-text">Use the same password.</div>
            </div>
            <div class="p-4">
                <button type="submit" class="btn btn-primary">Signup</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
