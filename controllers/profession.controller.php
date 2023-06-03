<?php
ob_start();
include_once("conn.php");
include_once("models/Members.class.php");
include_once("models/Profession.class.php");
include_once("views/Profession.view.php");

class ProfessionController
{
    private $profession;
    private $professionById;

    function __construct()
    {
        $this->professionById = new Profession(Conn::$db_host, Conn::$db_user, Conn::$db_pass, Conn::$db_name);
        $this->profession = new Profession(Conn::$db_host, Conn::$db_user, Conn::$db_pass, Conn::$db_name);
    }

    public function index()
    {
        $this->profession->open();
        $this->profession->getProfession();
        $data = array();
        while ($row = $this->profession->getResult()) {
            array_push($data, $row);
        }

        $this->profession->close();

        $view = new ProfessionView();
        $view->render($data);
    }

    public function updateData($id)
    {
        // $this->members->open();
        $this->profession->open();
        $this->professionById->open();
        // $this->members->getMembersJoin();
        $this->professionById->getProfessionById($id);
        $this->profession->getProfession($id);

        $data = array(
            'professionById' => array(),
            'profession' => array()
        );
        while ($row = $this->profession->getResult()) {
            array_push($data['profession'], $row);
        }

        while ($row = $this->professionById->getResult()) {
            array_push($data['professionById'], $row);
        }

        // $this->members->close();
        $this->profession->close();
        $this->professionById->close();

        // Add this code before calling the render function
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $view = new ProfessionView();
        $view->renderUpdate($data);
    }


    function add($data)
    {
        $this->profession->open();
        $this->profession->add($data);
        $this->profession->close();

        header("location:profession.php");
    }

    function update($id, $data)
    {
        $this->profession->open();
        $this->profession->update($id, $data);
        $this->profession->close();

        header("location:profession.php");
    }

    function delete($id)
    {
        $this->profession->open();
        $this->profession->delete($id);
        $this->profession->close();

        header("location:profession.php");
    }
}
