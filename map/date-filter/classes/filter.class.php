<?php

class Filter extends Dbh
{
    public function doFilter($fromDate, $toDate)
    {
        $fromDate = $_POST["from_date"];
        $toDate = $_POST["to_date"];
        $sql = "SELECT * FROM activityInput WHERE startDate BETWEEN ? AND ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fromDate, $toDate]);
        $result = $stmt->fetchAll();
        file_put_contents("myDate.json", "");
        if ($result !== []) {
            //print_r($result);
            foreach ($result as $x) {
                //print_r($x);
            }
            $json = json_encode($result);

            file_put_contents("myDate.json", $json);
        } else {
            echo '<h3 style="color: red">No matched result, please search another keyword!<h3>';
        }
    }
}
