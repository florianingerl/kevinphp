<?php

class SessionIdGenerator {

    protected string $sessionid;

    public function __construct() {
        //An dieser Funktion brauchst du nichts zu verändern nehme diese einfach so hin.
        $len = 25;
        $tmp = "";
        $pos = array();
        while (strlen($tmp) < $len) $tmp .= md5(uniqid());
        foreach ($pos as $p)
            if ($p <= $len) $tmp[$p] = "-";
        $this->sessionid = substr($tmp, 0, $len);
    }

    public function getSessionId() : string {

        return $this->sessionid;
    }

}
