<?php
session_start();
include "login/db_conn.php";
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
                                <a class="nav-link" aria-current="page" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="profile.php">Profile</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="logout" action="login/logout.php" method="post">
                            <button class="btn btn-dark" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <?php
                $uid = $_SESSION['uid'];
                $sql = "SELECT * FROM user_info WHERE uid='$uid'"; 
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $name = $row['name'];
                $surname = $row['surname'];
                $age = $row['age'];
                $about = $row['about'];
                $mail = $row['mail'];
                $tel = $row['tel'];

                echo "<p>$name</p>
                <p>$surname</p>
                <p>$age</p>
                <p>$about</p>
                <p>$mail</p>
                <p>$tel</p>";
            ?>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>