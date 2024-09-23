<?php
if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
    $logedin = true;
} else {
    $logedin = false;
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/login/index.php">Priyo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/login/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/login/logout.php">Logout</a></li>
            <li><a class="dropdown-item" href="#">Help</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>

      <?php if (!$logedin): ?>
      <form class="d-flex" role="search">
        <button class="btn btn-outline-success m-1" type="button" onclick="location.href='/login/login.php';">Login</button>
        <button class="btn btn-outline-success m-1" type="button" onclick="location.href='/login/signup.php';">Signup</button>
      </form>
      <?php endif; ?>

    </div>
  </div>
</nav>
