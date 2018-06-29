<?php

// do data sanitization here
$complete = (int) $_PATCH['complete'];
$id = $_PATCH['id'];

$query = "UPDATE `items` SET `complete`=$complete WHERE `id`=$id";

$response = mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) > 0) {
    $output['success'] = true;
} else {
    $output['error'] = "failed to update item with ID: $_PATCH[id]";
}