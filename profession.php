<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/profession.controller.php");

$profession = new ProfessionController();

if (isset($_POST['add'])) {
    //memanggil add
    $profession->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $profession->delete($id);
} else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $profession->updateData($id);

    if (isset($_POST['edit'])) {
        //memanggil update
        $profession->update($id, $_POST);
    }
} else {
    $profession->index();
}
