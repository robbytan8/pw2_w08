<?php

/**
 * Description of User
 *
 * @author Robby
 */
class User {

    private $id;
    private $name;
    private $email;
    private $password;
    private $active;
    private $role;

    public function __construct() {
        $this->role = new Role();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getActive() {
        return $this->active;
    }

    /**
     *
     * @return Role
     */
    public function getRole() {
        return $this->role;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function __set($name, $value) {
        if (!isset($this->role)) {
            $this->role = new Role();
        }
        if (!isset($value)) {
            switch ($name) {
                case 'category_id':
                    $this->role->setId($value);
                    break;
                case 'role_name':
                    $this->role->setName($value);
                    break;
                default:
                    break;
            }
        }
    }

}
