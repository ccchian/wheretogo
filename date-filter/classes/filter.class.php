<?php

class Filter extends Dbh
{
    public function doFilter($fromDate, $toDate)
    {
        $fromDate = $_POST["from_date"];
        $toDate = $_POST["to_date"];
        $sql = "SELECT * FROM activityform WHERE a_date_start BETWEEN ? AND ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fromDate, $toDate]);
        $result = $stmt->fetchAll();
        if ($result !== []) {
            //print_r($result);
            foreach ($result as $item) {

                echo '<div class="card card3">
                        <div class="container">
                            <img src="singapore.jpg" alt="las vegas">
                        </div>
                        <div class="details">
                            <h3>' . $item["a_title"] . '</h3>
                            <p>舉辦時間: ' . $item["a_date_start"] . '</p>
                            
                            <p>地址: ' . $item["a_address"] . '</p>
                        </div>
                    </div>';
            }
        } else {
            echo '<h3 style="color: white">No matched result, please search another keyword!<h3>';
        }
    }
}
