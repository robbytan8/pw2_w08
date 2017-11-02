<?php

/**
 * Description of Student
 *
 * @author Robby
 */
class Student extends Person {

    private $id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

}
