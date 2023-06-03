<?php
class ProfessionView
{
    public function render($data)
    {
        $no = 1;
        $button = "add";
        $x = '';
        $title = "Tambah";
        $dataAuthor = null;
        foreach ($data as $val) {
            list($id, $nama) = $val;
            $dataAuthor .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>
                    <a href='profession.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='profession.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
        }

        $tpl = new Template("templates/profession.html");
        $tpl->replace("STAT_FORM", $title);
        $tpl->replace("DATA_TABEL", $dataAuthor);
        $tpl->replace("STAT_BUTTON", $button);
        $tpl->replace("VALUE_NAME", $x);
        $tpl->write();
    }

    public function renderUpdate($data)
    {
        $no = 1;
        $button = "edit";
        // $x = '';
        $title = "Edit";
        $dataAuthor = null;
        foreach ($data['profession'] as $val) {
            list($id, $nama) = $val;
            $dataAuthor .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>
                    <a href='profession.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='profession.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
        }

        $data['professionById'];
        // $data['professionById'] is the given array

        // Accessing the value of 'profession_name'
        $professionName = $data['professionById'][0]['profession_name'];
        $tpl = new Template("templates/profession.html");
        $tpl->replace("STAT_FORM", $title);
        $tpl->replace("DATA_TABEL", $dataAuthor);
        $tpl->replace("STAT_BUTTON", $button);
        $tpl->replace("VALUE_NAME", $professionName);
        $tpl->write();
    }
}
