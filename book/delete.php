<?php
    require("../include/config.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM books WHERE id =' $id '";
    $book = $conn->prepare($sql);
    if ($book->execute(['id'=>$id])) {
        header("Location:./../book/view.php");
    };
?>
