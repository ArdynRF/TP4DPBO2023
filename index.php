<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/members.controller.php");

$members = new MembersController();

if (isset($_POST['add'])) {
  //memanggil add
  $members->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
  //memanggil add
  $id = $_GET['id_hapus'];
  $members->delete($id);
}
// } else if (!empty($_GET['id_edit'])) {
//   //memanggil add
//   $id = $_GET['id_edit'];
//   $members->edit($id);

// pindah Page ke Form untuk add Data
else if (!empty($_GET['id_edit'])) {
  $id = $_GET['id_edit'];
  $members->updateData($id);

  if (isset($_POST['edit'])) {
    //memanggil update
    $members->update($id, $_POST);
  }
}

// pindah Page ke Form untuk add Data
else if (!empty($_GET['flag'])) {
  $members->addData();
} else {
  $members->index();
}
