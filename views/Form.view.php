<?php

class FormView
{
    public function render($data)
    {
        $x = '';
        $button = 'add';
        $dataProfession = null;
        $title = "Tambah";
        foreach ($data['profession'] as $val) {
            list($id, $nama) = $val;
            $dataProfession .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $tpl = new Template("templates/form.html");
        $tpl->replace("STAT_FORM", $title);
        $tpl->replace("VAL_NAMA", $x);
        $tpl->replace("VAL_EMAIL", $x);
        $tpl->replace("VAL_PHONE", $x);
        $tpl->replace("VALUE_DATE", $x);
        $tpl->replace("STAT_BUTTON", $button);
        $tpl->replace("OPTION", $dataProfession);
        // $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->write();
    }

    public function renderUpdate($data)
    {
        // $x = '';
        $button = 'edit';
        $dataProfession = null;
        $title = "Edit";
        $membersName = $data['members'][0]['member_name'];
        $membersEmail = $data['members'][0]['member_email'];
        $membersPhone = $data['members'][0]['member_phone'];
        $membersDate = $data['members'][0]['joining_date'];
        $professionId = $data['members'][0]['profession_id'];
        foreach ($data['profession'] as $val) {
            list($id, $nama) = $val;
            $dataProfession .= "<option value='" . $id . "'";
            if ($id == $professionId) {
                $dataProfession .= " selected";
            }
            $dataProfession .= ">" . $nama . "</option>";
        }

        $tpl = new Template("templates/form.html");
        $tpl->replace("STAT_FORM", $title);
        $tpl->replace("VAL_NAMA", $membersName);
        $tpl->replace("VAL_EMAIL", $membersEmail);
        $tpl->replace("VAL_PHONE", $membersPhone);
        $tpl->replace("STAT_BUTTON", $button);
        $tpl->replace("VALUE_DATE", $membersDate);
        $tpl->replace("OPTION", $dataProfession);
        // $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->write();
    }
}
