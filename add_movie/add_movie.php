<?php
    include "../login/db_conn.php";
    include "../lib.php";
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uid = $_SESSION['uid'];
        $img = $_FILES['img'];
        $title = $_POST['title'];
        $href = $_POST['href'];
        $rating = $_POST['rating'];
        $desc = $_POST['desc'];
        $comment = $_POST['comment'];
        $date = date("Y:m:d");
    
        $target = "../images";
        move_uploaded_file($img['tmp_name'], $target.'/'.$img['name']);
        $folder = "images/".$img['name'];
        $sql = "INSERT INTO posts (user_uid, title, description, comment, rating, href, image, date) 
        VALUES('$uid','$title', '$desc', '$comment', '$rating', '$href', '$folder', '$date')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $res = [
                'message' => 'Movie ' . $title . ' ' . 'successfully added!',
                'uid' => $uid,
                'date' => $date,
                'status' => 0
            ];
            echo json_encode($res);
        } else {
            $res = [
                'message' => 'Movie ' . $title . ' ' . 'error while adding!',
                'uid' => $uid,
                'date' => $date,
                'status' => 1
            ];
            echo json_encode($res);
        }
    }
?>