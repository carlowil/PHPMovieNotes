<?php
session_start();
include "login/db_conn.php";
include "lib.php";
if (isset($_SESSION['uid']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <title>Library</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home.php">MyLib</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarMain" aria-controls="navbarMain" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarMain">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;" >
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">Profile</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" action="home.php" method="get">
                            <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                        <form class="d-flex" role="logout" action="login/logout.php" method="post">
                            <button class="btn btn-dark" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <main style="width: 100%;">
            <?php
                $uid = $_SESSION['uid'];
                $sql = "SELECT * FROM posts WHERE user_uid='$uid'";
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql = "SELECT * FROM posts WHERE user_uid='$uid' AND title LIKE '%$search%'";
                }
                $res = mysqli_query($conn, $sql); 
                if (mysqli_num_rows($res) > 0) { ?>
            <div class="row row-cols-1 row-cols-md-2 g-2" style="
                    padding: 12px; 
                    margin-left: 12px;
                    margin-right: 12px;
                    ">
                <?php
                        while ($films = mysqli_fetch_assoc($res)) {
                            $img = $films['image'];
                            $active = $films['active'];
                            $title = truncate($films['title'], 70);
                            $rating = $films['rating'];
                            $desc = truncate($films['description'], 280);
                            $id = $films['id'];
                            if ($active == 1) {
                                echo "<div class='col'>
                            <div class='card'>
                                <div class='row g-0'>
                                    <div class='col'>
                                        <a href=''>
                                            <img src='$img' class='img-fluid rounded-start' alt='$title'>
                                        </a>
                                    </div>
                                    <div class='col'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$title</h5>
                                            <p class='card-text'><small class='text-muted'>Rating: $rating</small></p>
                                            <p class='card-text'>$desc</p>
                                            <div style='display: flex;'>
                                                <a href='del_movie/del_movie.php?id={$id}'>
                                                    <button type='button' class='btn btn-danger' aria-label='Close'>Delete</button>
                                                </a>
                                                <a href='update.php?id={$id}' style='margin-left: 12px;'>
                                                    <button type='button' class='btn btn-primary' aria-label='Edit'>Edit</button>
                                                </a>
                                                <a href='innactive_movie/innactive_movie.php?id={$id}' style='margin-left: 12px;'>
                                                    <button type='button' class='btn btn-secondary' aria-label='Innactive'>Innactive</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                            } else if ($active == 0) {
                                echo "<div class='col'>
                            <div class='card'>
                                <div class='row g-0'>
                                    <div class='col'>
                                        <a href='' style='pointer-events: none;'>
                                            <img src='$img' class='img-fluid rounded-start' alt='$title'>
                                        </a>
                                    </div>
                                    <div class='col'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$title</h5>
                                            <p class='card-text'><small class='text-muted'>Rating: $rating</small></p>
                                            <p class='card-text'>$desc</p>
                                            <div style='display: flex;'>
                                                <a href='del_movie/del_movie.php?id={$id}' style='pointer-events: none;'>
                                                    <button type='button' class='btn btn-danger' aria-label='Close' true disabled>Delete</button>
                                                </a>
                                                <a href='update.php?id={$id}' style='margin-left: 12px; pointer-events: none;'>
                                                    <button type='button' class='btn btn-primary' aria-label='Edit' disabled>Edit</button>
                                                </a>
                                                <a href='innactive_movie/innactive_movie.php?id={$id}' style='margin-left: 12px;'>
                                                    <button type='button' class='btn btn-secondary' aria-label='Innactive'>Innactive</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                            }
                            
                        }
                    
                ?>
                <?php } else {
                        echo "<p style='text-align: center; margin-top: 52px;'>Empty database! Add some films</p?";
                    } ?>
        </main>
        <div style="position: fixed; right: 0; bottom: 0; z-index: 3; margin-bottom: 12px; margin-right: 12px;">
                <form method="get" action="add.php">
                    <button class="btn btn-primary" style="width: 120px; height: 45px;" type="submit">Add</button>
                </form>
            <div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>