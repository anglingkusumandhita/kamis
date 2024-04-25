<?php

include("../config/database.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $note = $_POST['note'];

    try {
        if ($id) { //jika id ada, maka update
            $sql = "update categories set name='$name', note='$note' where id=$id";
        } else { // id tidak ada maka insert
            $sql = "insert into categories(name, note)values('$name','$note')";
        }
        $result = mysqli_query($db, $sql);

        if($result) {
            header("Location: index.php?success=Eksekusi data success");
        } else {
            header("Location: index.php?error=Eksekusi data error");
        }
    } catch (Exception $exception) {
        header("Location: index.php?error=" . $exception->getMessage());
    }

}
