<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php require "partials/_header.php"; ?>
    <?php include "partials/_dbconnect.php"; ?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM categories WHERE category_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $category_name = $row['category_name'];
        $category_description = $row['category_description'];
    }
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //insert thread into db
        $th_title = $_POST['threadtitle'];
        $th_desc = $_POST['threaddesc'];
        $sql = "INSERT INTO threads (`thread_title`,`thread_desc`,`thread_user_id`,`thread_category_id`) VALUES ('$th_title','$th_desc','0','$id')";
        $result = mysqli_query($conn, $sql);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Your thread has been added! Please wait for community to respond.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to
                <?php echo $category_name; ?> forums
            </h1>
            <p class="lead">
                <?php echo $category_description; ?>
            </p>
            <hr class="my-4">
            <p>This is peer to peer forum. No Spam / Advertising / Self-promote in this forum is not allowed. Do not
                post copyright-infringing material. Do not post "offensive" posts, links, images. Do not cross post
                questions. Remain respectful of others at all times.</p>
        </div>
    </div>
    <?php
    if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
            <div class="form-group">
                <label for="threadtitle">Thread Title</label>
                <input type="text" class="form-control" id="threadtitle" name="threadtitle"
                    aria-describedby="titleHelp">
                <small id="titleHelp" class="form-text text-muted">Keep your title as short and crisp as
                    possible</small>
            </div>
            <div class="form-group">
                <label for="threaddesc">Ellaborate Your Concerns</label>
                <textarea class="form-control" id="threaddesc" name="threaddesc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
    } else {
        echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <p class="lead">You are not logged in. Please login to be able to start a Discussion.</p>
    </div>';
    }
    ?>
    <div class="container">
        <h1 class="py-2">Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM threads WHERE thread_category_id = $id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $description = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $date = new DateTime($thread_time);
            echo '<div class="media">
                    <img src="images/user.jpg" class="mr-3" width="40px" alt="...">
                    <div class="media-body">
                        <p class="font-weight-bold my-0">Anonymous User at ' . date_format($date, 'd-m-Y') . '</p>
                        <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
                        <p>' . $description . '</p>
                    </div>
                </div>';
        }
        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No Threads Found</p>
              <p class="lead">Be the first person to ask the question.</p>
            </div>
          </div>';
        }
        ?>
    </div>
    <?php require "partials/_footer.php"; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>