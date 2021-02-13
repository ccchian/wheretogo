<?php

// Simply Fetch..data

class AdrsView extends Adrs
{
    public function showAdrs($address)
    {
        $result = $this->getAdrs($address);
        print_r($result);
        //echo "Address: " . $result[0]['address'] . "<hr>";
    }
}
