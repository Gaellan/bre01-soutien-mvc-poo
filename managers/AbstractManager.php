<?php

abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        $dbInfo = $this->getDatabaseInfo();

        $connexion = "mysql:host=".$dbInfo["host"].";port=3306;charset=utf8;dbname=".$dbInfo["db_name"];
        $this->db = new PDO(
            $connexion,
            $dbInfo["user"],
            $dbInfo["password"]
        );
    }

    private function getDatabaseInfo() : array
    {
        $handle = fopen("config/database.txt", "r");
        $lineNbr = 0;
        $info = [];

        if ($handle) {

            while (($line = fgets($handle)) !== false) {

                if($lineNbr === 0)
                {
                    $info["user"] = trim($line);
                }
                else if($lineNbr === 1)
                {
                    $info["password"] = trim($line);
                }
                else if($lineNbr === 2)
                {
                    $info["host"] = trim($line);
                }
                else if($lineNbr === 3)
                {
                    $info["db_name"] = trim($line);
                }

                $lineNbr++;
            }

            fclose($handle);
        }
        return $info;
    }
}