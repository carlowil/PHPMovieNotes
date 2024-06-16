<?php
    include "../login/db_conn.php";
    include "../lib.php";
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id = $_GET['id'];
        $sql1 = "SELECT active FROM posts WHERE id = '$id'";
        $result = mysqli_query($conn, $sql1);
        $active = mysqli_fetch_assoc($result);
        if($active['active'] == 1) {
            $sql2 = "UPDATE posts SET active = 0 WHERE id = '$id'";
            mysqli_query($conn, $sql2);
        } else {
            $sql2 = "UPDATE posts SET active = 1 WHERE id = '$id'";
            mysqli_query($conn, $sql2);
        }
        header("Location: ../home.php");
    }
?>