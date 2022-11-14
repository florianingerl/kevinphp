<?php

final class ActualTime {

    protected int $time;

    public function __construct() {
        $this->time = strtotime( date("Y-m-d h:i:sa") );
    }

    public function getTimestamp() : int {

        return $this->time;
    }

}
