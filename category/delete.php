<?php
    require("../include/config.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM categories WHERE id =' $id '";
    $book = $conn->prepare($sql);
    if ($book->execute(['id'=>$id])) {
        header("Location:./../category/view.php");
    };
?>
