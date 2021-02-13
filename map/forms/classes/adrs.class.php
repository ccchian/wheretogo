<?php

// Connect with databases

class Adrs extends Dbh
{
    // Fetch all from Database
    public function getAdrs()
    {
        $sql = "SELECT * FROM activityInput ORDER BY id DESC";
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll();
        return $result;
    }

    // Insert Address into database
    public function insertAdrs($actName, $cityName, $areaName, $roadName, $startDate, $startTime, $endDate, $endTime, $actAddress, $latitude, $longitude)
    {
        $sql = "INSERT INTO activityInput(actName, city_name, area_name, road_name, startDate,startTime,endDate,endTime,actAddress,latitude,longitude) VALUES(:actName,:city_name,:area_name,:road_name,:startDate,:startTime,:endDate,:endTime,:actAddress,:latitude,:longitude)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            'actName' => $actName,
            'city_name' => $cityName,
            'area_name' => $areaName,
            'road_name' => $roadName,
            'startDate' => $startDate,
            'startTime' => $startTime,
            'endDate' => $endDate,
            'endTime' => $endTime,
            'actAddress' => $actAddress,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
        return true;
    }

    // Update LatLng
    public function update($id, $address, $latitude, $longitude)
    {
        $sql = 'UPDATE users SET address=:address, latitude=:latitude, longitude=:longitude WHERE id=:id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            'address' => $address,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'id' => $id,
        ]);
        return true;
    }
}
