<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="../login/style.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form action="signup-check.php" method="post">
                <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
                <div class="form-floating" style="margin-bottom: 12px;">
                    <input 
                        name="uname" 
                        type="text"
                        <?php if (isset($_GET['error'])) { ?>
                            class="form-control is-invalid"
                        <?php } else { ?> class="form-control" <?php } ?>  
                        id="userInput" 
                        placeholder="Username" 
                        maxlength="12"
                    >
                    <label for="floatingInput">Username</label>
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

                <div class="form-floating" style="margin-bottom: 12px;">
                    <input 
                    name="re_password" 
                    type="password"
                    <?php if (isset($_GET['error'])) { ?>
                        class="form-control is-invalid"
                    <?php } else { ?> class="form-control" <?php } ?>  
                    id="rePassword" 
                    placeholder="Password">
                    <label for="floatingPassword">Password repeat</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" style="margin-bottom: 12px;">Sign up</button>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php } ?>
                <a class="mb-3" href="../index.php">Already have an account?</a>
                <p class="mt-5 mb-3">© 2023–2024</p>
            </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>