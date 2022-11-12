<?php

final class ActualTime {

    protected string $time;

    public function __construct() {
        $this->time = date("h:i:sa");
    }

    public function getTimestamp() : string {

        return $this->time;
    }

}
