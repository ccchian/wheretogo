<?php

class Search extends Dbh
{
    public function doSearch($searchBar)
    {

        $searchBar = "%$searchBar%";
        $sql = "SELECT * FROM activityform WHERE a_title like ?
                OR a_address like ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$searchBar, $searchBar]);
        $result = $stmt->fetchAll();
        if ($result !== []) {
            //print_r($result);
            foreach ($result as $item) {
                echo '<div class="card card1">
                        <div class="container">
                            <img src="newyork.jpg" alt="las vegas">
                        </div>
                        <div class="details">
                            <h3>' . $item["a_title"] . '</h3>
                            <p>' . $item["a_date_start"] . '</p>
                            <p>' . $item["startTime"] . '</p>
                            <p>' . $item["a_address"] . '</p>
                        </div>
                    </div>';
            }
        } else {
            echo '<h3 style="color: white">No matched result, please search another keyword!<h3>';
        }
    }
}
