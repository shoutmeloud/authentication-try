<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>
<?php require_once 'partials/nav.php'; ?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Darjeeling</title>
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <header>
   
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey! <?php echo htmlspecialchars($_SESSION['username']); ?></strong> Welcome to our website
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <section class="main">
        <h1 class="titile">
            Welcome to Uttar-Banga 
        </h1>
        <h2 class="title2"> The land of Mountains</h2>
        <button class="btn" onclick="log()">know more</button>
    </section>

    <footer>
        <p>&copy; 2024 Explore Darjeeling. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
