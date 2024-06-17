<?php
    include "../login/db_conn.php";
    include "../lib.php";
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uid = $_SESSION['uid'];
        $id = $_POST['id'];
        $date = date("Y:m:d");
        $sql1 = "SELECT active, title FROM posts WHERE id = '$id'";
        $result = mysqli_query($conn, $sql1);
        $active = mysqli_fetch_assoc($result);
        if($active['active'] == 1) {
            $sql2 = "UPDATE posts SET active = 0 WHERE id = '$id'";
            mysqli_query($conn, $sql2);
            $res1 = [
                'message' => 'Movie ' . $active['title'] . ' ' . 'innactive!',
                'uid' => $uid,
                'date' => $date,
                'status' => 0
            ];
            echo json_encode($res1);
        } else {
            $sql2 = "UPDATE posts SET active = 1 WHERE id = '$id'";
            mysqli_query($conn, $sql2);
            $res2 = [
                'message' => 'Movie ' . $active['title'] . ' ' . 'active!',
                'uid' => $uid,
                'date' => $date,
                'status' => 1
            ];
            echo json_encode($res2);
        };
    };
?>