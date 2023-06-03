<?php

class MembersView
{
    public function render($data)
    {
        $no = 1;
        $dataMembers = null;
        $dataProffesion = null;
        foreach ($data['members'] as $val) {
            list($id, $nama, $email, $phone, $profession_id, $date, $profession_name) = $val;
            $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $profession_name . "</td>
                <td>" . $date . "</td>";

            $dataMembers .= "
                <td>
                  <a href='index.php?id_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";

            $dataMembers .= "</tr>";
        }
        $tpl = new Template("templates/index.html");

        $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->write();
    }
}
