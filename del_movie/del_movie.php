<?php
    include "../login/db_conn.php";
    include "../lib.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
        $id = $_POST['id'];
        $title = $_POST['title'];
        $sql = "DELETE FROM posts WHERE id = '$id'";
        $date = date("Y:m:d");
        $result = mysqli_query($conn, $sql);
        if($result) {
            $res = [
                'message' => 'Movie ' . $title . ' ' . 'deleted successfully!',
                'uid' => $uid,
                'date' => $date,
                'status' => 0
            ];
            echo json_encode($res);
        } else {
            $res = [
                'message' => 'Movie ' . $title . ' ' . 'error while deleting!',
                'uid' => $uid,
                'date' => $date,
                'status' => 1
            ];
            echo json_encode($res);
        }
    }
?>