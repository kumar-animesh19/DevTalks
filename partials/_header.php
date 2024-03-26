<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/FORUM"><img src="images/logo.png" width=100px></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/FORUM">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        Top Categories
      </a>
      <div class="dropdown-menu">';
      $sql = "SELECT category_name, category_id FROM  categories";
      $result = mysqli_query($conn,$sql);
      while( $row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="threadlist.php?catid=' . $row['category_id'] . '">'.$row['category_name'].'</a>';
      }
echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact</a>
    </li>
  </ul>
  <form action="search.php" method="GET" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
  </form>';
if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  echo '<p class="text-light my-0 px-3">Welcome, ' . $_SESSION['user_email'] . '</p>
  <a href="partials/_logout.php" class="btn btn-outline-success">Logout</a>';
} else {
  echo '<div class="mx-2">
    <button class="btn btn-outline-success" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-success" data-toggle="modal" data-target="#signupModal">Signup</button>
  </div>';
}
echo '</div>
</nav>';

require "partials/_loginModal.php";
require "partials/_signupModal.php";
if (isset ($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Your can login!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
}
if (isset ($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success! </strong>' . $_GET['error'] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
}
if (isset ($_GET['login']) && $_GET['login'] == "error") {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Invalid Credentials!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
}
?>