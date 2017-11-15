<?php

/**
 * Description of UserDaoImpl
 *
 * @author Robby
 */
class UserDaoImpl {

    /**
     *
     * @param User $user
     * @return stdClass
     */
    public function login(User $user) {
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT u.name, r.name AS role_name FROM user u JOIN role r WHERE u.email = ? AND u.password = PASSWORD(?) LIMIT 1";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(2, $user->getPassword(), PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result = $stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }

}
