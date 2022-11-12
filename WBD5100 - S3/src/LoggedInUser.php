<?php

abstract class LoggedInUser {

    public function getUserId() : string {

        return $_SESSION['userid'];
    }

}
