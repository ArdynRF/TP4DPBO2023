<?php
include_once("conn.php");
include_once("models/Members.class.php");
include_once("models/Profession.class.php");
include_once("views/Members.view.php");
include_once("views/Form.view.php");

class MembersController
{
    private $members;
    private $profession;

    function __construct()
    {
        $this->members = new Members(Conn::$db_host, Conn::$db_user, Conn::$db_pass, Conn::$db_name);
        $this->profession = new Profession(Conn::$db_host, Conn::$db_user, Conn::$db_pass, Conn::$db_name);
    }

    public function index()
    {
        $this->members->open();
        // $this->profession->open();
        $this->members->getMembersJoin();
        // $this->profession->getProfession();

        $data = array(
            'members' => array(),
            // 'profession' => array()
        );
        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }

        // while ($row = $this->profession->getResult()) {
        //     array_push($data['profession'], $row);
        // }
        $this->members->close();
        // $this->profession->close();

        // Add this code before calling the render function
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $view = new MembersView();
        $view->render($data);

        // $view = new MembersView();
        // $view->render($data);
    }


    public function addData()
    {
        // $this->members->open();
        $this->profession->open();
        // $this->members->getMembersJoin();
        $this->profession->getProfession();

        $data = array(
            // 'members' => array(),
            'profession' => array()
        );
        // while ($row = $this->members->getResult()) {
        //     array_push($data['members'], $row);
        // }

        while ($row = $this->profession->getResult()) {
            array_push($data['profession'], $row);
        }
        // $this->members->close();
        $this->profession->close();

        // Add this code before calling the render function
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $view = new FormView();
        $view->render($data);

        // $view = new MembersView();
        // $view->render($data);
    }


    public function updateData($id)
    {
        $this->members->open();
        $this->profession->open();
        $this->members->getMembersById($id);
        $this->profession->getProfession();

        $data = array(
            'members' => array(),
            'profession' => array()
        );

        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }

        while ($row = $this->profession->getResult()) {
            array_push($data['profession'], $row);
        }
        $this->members->close();
        $this->profession->close();

        // Add this code before calling the render function
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $view = new FormView();
        $view->renderUpdate($data);

        // $view = new MembersView();
        // $view->render($data);
    }



    function add($data)
    {
        $this->members->open();
        $this->members->add($data);
        $this->members->close();

        header("location:index.php");
    }

    function update($id, $data)
    {
        $this->members->open();
        $this->members->update($id, $data);
        $this->members->close();

        header("location:index.php");
    }

    function delete($id)
    {
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();

        header("location:index.php");
    }
}
