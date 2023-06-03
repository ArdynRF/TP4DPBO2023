<?php
class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMembersJoin()
    {
        // Query untuk mendapatkan data member yang sudah di join dengan tabel profession
        $query = "SELECT members.*, profession.profession_name FROM members JOIN profession ON members.profession_id=profession.profession_id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        // Query untuk mendapatkan data member berdasarkan id
        $query = "SELECT members.*, profession.profession_name FROM members JOIN profession ON members.profession_id=profession.profession_id WHERE members.member_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function add($data)
    {
        $member_name = $data['member_name'];
        $member_email = $data['member_email'];
        $member_phone = $data['member_phone'];
        $profession_id = $data['profession_id'];
        $joining_date = $data['joining_date'];

        // $dateParts = explode('/', $joining_date);
        // $formattedDate = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

        $query = "INSERT INTO members (member_id, member_name, member_email, member_phone, profession_id, joining_date) VALUES ('','$member_name', '$member_email', '$member_phone', '$profession_id', '$joining_date')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM members WHERE member_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $member_name = $data['member_name'];
        $member_email = $data['member_email'];
        $member_phone = $data['member_phone'];
        $profession_id = $data['profession_id'];
        $joining_date = $data['joining_date'];

        $query = "UPDATE members SET member_name='$member_name', member_email='$member_email', member_phone='$member_phone', profession_id='$profession_id', joining_date='$joining_date' WHERE member_id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
