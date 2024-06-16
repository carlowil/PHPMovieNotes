<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <link href="login/style.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form action="login/login.php" method="post">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <div class="form-floating" style="margin-bottom: 12px;">
                    <input 
                        name="uname" 
                        type="text"
                        <?php if (isset($_GET['error'])) { ?>
                            class="form-control is-invalid"
                        <?php } else { ?> class="form-control" <?php } ?> 
                        id="userInput" 
                        placeholder="carlowil" 
                        maxlength="12"
                    >
                    <label for="floatingInput">Login</label>
                </div>
                <div class="form-floating" style="margin-bottom: 12px;">
                    <input 
                    name="password" 
                    type="password" 
                    <?php if (isset($_GET['error'])) { ?>
                        class="form-control is-invalid"
                    <?php } else { ?> class="form-control" <?php } ?>  
                    id="userPassword" 
                    placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php } ?>
                <?php 
                if (isset($_GET['success'])) {
                ?> 
                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php } ?>
                <button class="w-100 btn btn-lg btn-primary" style="margin-bottom: 12px;" type="submit">Sign in</button>
                <a class="mb-3" href="registration/reg.php">Create an account</a>
                <p class="mt-5 mb-3">© 2023–2024</p>
            </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>