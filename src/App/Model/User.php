<?php

namespace App\Model;

use PDO;

class User extends Model
{

    private $errorMessages = [];

    public function getAll() {

        $sql = "SELECT * FROM users";
        $sth = $this->pdo->prepare( $sql );
        $sth->execute();

        return $sth->fetchAll();
        
    }
}