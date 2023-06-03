<?php
class Profession extends DB
{
    function getProfession()
    {
        $query = "SELECT * FROM profession";
        return $this->execute($query);
    }

    function getProfessionById($id)
    {
        // Query untuk mendapatkan data member berdasarkan id
        $query = "SELECT * FROM profession WHERE profession_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];

        $query = "INSERT into profession values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM profession WHERE profession_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['name'];

        $query = "UPDATE profession SET profession_name = '$name' WHERE profession_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
