<?php
class ZipcodeMapper extends Mapper
{
    public function getAddress($zipcode = null)
    {
        $sql = "SELECT a.zipcode, b.prefecture, b.city, b.town ";
        $sql .= "FROM zipcode a LEFT OUTER JOIN address b ";
        $sql .= "ON a.zipcode = b.id ";
        if ($zipcode) $sql .= "WHERE a.zipcode = '$zipcode'";
        $stmt = $this->db->query($sql);
        $results = [];
        while ($row = $stmt->fetch()) $results[] = $row;
        return $results;
    }
}
