<?php

/**
 * Description of Person
 *
 * @author Robby
 */
class Person {

    private $name;
    private $birthDate;

    public function getName() {
        return $this->name;
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;
    }

}
