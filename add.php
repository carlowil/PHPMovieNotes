<?php
session_start();

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
                        <form class="d-flex" role="logout" action="login/logout.php" method="post">
                            <button class="btn btn-dark" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <main style="width: 100%;">
            <div class="row align-items-start">
                <div class="col-md-6">
                    <image src="images/background/img_background.png">
                </div>
                <div class="col-md-4" style="margin-top: 80px;">
                    <form method="post" action="/add_movie/add_movie.php" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="title">Title</span>
                            <input name="title" type="text" class="form-control" placeholder="Магическая битва 2" aria-label="Магическая битва" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="href">Href</span>
                            <input name="href" type="text" class="form-control" placeholder="https://anixart.me" aria-label="https://anixart.me" aria-describedby="basic-addon1">
                        </div>
                        
                        <div class="input-group mb-3">
                            <input id="img" name="img" type="file" class="form-control">
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="rating">Rating</label>
                            <select class="form-select" id="rating" name="rating">
                                <option selected>Choose...</option>
                                <option value="1">One star</option>
                                <option value="2">Two star</option>
                                <option value="3">Three star</option>
                                <option value="4">Four star</option>
                                <option value="5">Five star</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <textarea name="desc" class="form-control" aria-label="Text" placeholder="All started from..."></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Comment</span>
                            <textarea name="comment" class="form-control" aria-label="Text" placeholder="I like it!"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </form>
                </div>
            </div>
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