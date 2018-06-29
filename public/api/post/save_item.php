<?php

$title = $_POST['title'];
$details = $_POST['details'];

if(!$title){
    $output['errors'][] = 'no title found';
};

if(!$details){
    $output['errors'][] = 'no details found';
};

if (empty($output['errors'])){
    $query = "INSERT INTO `items` (`title`, `details`) VALUES ('$title','$details')";

    $result = mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn) > 0 ){
        $output['success'] = true;
        $output['insertId'] = mysqli_insert_id($conn);
    } else {
        $output['errors'][] = 'error inserting item';
    }
};