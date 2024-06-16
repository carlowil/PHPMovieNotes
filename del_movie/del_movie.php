<?php
    include "../login/db_conn.php";
    include "../lib.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['uid'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM posts WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: ../home.php");
    }
?>