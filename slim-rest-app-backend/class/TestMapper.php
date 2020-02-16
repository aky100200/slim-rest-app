<?php
class TestMapper extends Mapper
{
    public function getTests()
    {
        $sql = "select count(*) from zipcode";
        $stmt = $this->db->query($sql);
        $results = [];
        while ($row = $stmt->fetch()) {
            $results[] = $row;
        }
        return $results;
    }
}
