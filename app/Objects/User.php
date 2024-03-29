<?php

namespace App\Objects;

use App\Database;
use App\ErrorLogTrait;

class User
{
    private $database;

    use ErrorLogTrait;

    public function __construct()
    {
        $this->database = Database::connect();
    }

    public function getUserByNumber($customer_number)
    {
        $data = [
            'customer_number' => $customer_number,
        ];

        try {
            $query = 'SELECT * FROM customers WHERE customer_number = :customer_number';
            $stmt = $this->database->prepare($query);
            $stmt->execute($data);

            return $stmt->fetch(\PDO::FETCH_OBJ);
        } catch (\Exception $e){
            $this->message = $e->getMessage();
            $this->writeError();

            return false;
        }
    }
}