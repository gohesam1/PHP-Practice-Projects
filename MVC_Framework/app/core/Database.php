<?php

// Trait Database
// {
//     private function connect()
//     {
//         $string = "mysql:hostname=localhost;dbname=mvc_db";
//         $con = new PDO($string,DBUSER,DBPASS);
//         return $con;
//     }
//     public function query($query, $data = [])
//     {
    
//         $con = $this->connect();
//         $stm = $con->prepare($query);
        
//         $check = $stm->execute($data);
        
//         if($check)
//         {
//             $result = $stm->fetchAll(PDO::FETCH_OBJ);
        
//             if(is_array($result) && count($result))
//             {
//                 return $result;
//             }
//         }

//         return false;
//     }

//     public function get_row($query, $data = [])
//     {
//         $con = $this->connect();
//         $stm = $con->prepare($query);

//         $check = $stm->execute($data);

//         if($check)
//         {
//             $result = $stm->fetchAll(PDO::FETCH_OBJ);
        
//             if(is_array($result) && count($result))
//             {
//                 return $result[0];
//             }
//         }

//         return false;
//     }
// }


Trait Database
{
    private function connect()
    {
        $con = new mysqli("localhost", "root", "", "mvc_db");
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        echo "Connected successfully";
        return $con;
        
        // $string = "mysql:hostname=localhost;dbname=mvc_db";
        // $con = new mysqli($string, DBUSER, DBPASS);
        // return $con;
    }

    public function query($query, $data = [])
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);

        // $con = $this->connect();
        // if (!$con) {
        //     die("Connection failed: " . mysqli_connect_error());
        // }

        if ($stmt) {
            $types = str_repeat('s', count($data));
            $stmt->bind_param($types, ...$data); 

            $check = $stmt->execute();

            if ($check) {
                $result = $stmt->get_result();
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        }

        return false;
    }

    public function get_row($query, $data = [])
    {
        $result = $this->query($query, $data);

        if ($result) {
            return $result[0];
        }

        return false;
    }
}




?>