<?php

// Simply Insert or Update..databases

class AdrsContr extends Adrs
{
    public function createAdrs($address, $latitude, $longitude)
    {
        $this->addAdrs($$address, $latitude, $longitude);
    }
}
