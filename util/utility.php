<?php

function createMySQLConnection() {
    $link = mysqli_connect("localhost", "username", "password", "pwl20171",
            "3306") or die(mysqli_connect_error());
    mysqli_autocommit($link, FALSE);
    return $link;
}
