<?php

/**
 * This class is used to create instance of PDO Connection
 *
 * @author Robby
 */
class PDOUtil {

    public static function createPDOConnection() {
        $link = new PDO("mysql:host=localhost;dbname=pwl20171", "username",
                "password");
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }

    public static function closePDOConnection(PDO $link) {
        $link = NULL;
    }

}
