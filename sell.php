<?php
    require 'connect.php';
        $id = (int) $_GET['id'];
        $sql = "DELETE FROM sanpham WHERE id = {$id}";
        $result = $conn->$query($sql);
        if ($result)
        {
            header("Location:index.php");
        }
?>