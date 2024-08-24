<?php 

class model
{
     public $connection;

        public function __construct()
    {

        try
        {
            $this->connection = new mysqli("localhost","root","","shippika");
        }
         catch (\Throwable $th)
        {
            // echo "connection was not successful";
        }
    }

    
    public function register($data)
    {
        //  $connection = new mysqli("localhost","root","","shippika");
        // if($connection)
        // {
        //     echo "Success<br>";
        // }
        // else
        // {
        //         echo "fail<br>";
        //     }

        array_pop($data);
        
        $keysdata = array_keys($data);
        $valuesdata = array_values($data);

        $keysdata = implode(",",$keysdata);
        $valuesdata = implode("','",$valuesdata);

        


            $starr = "INSERT INTO users ($keysdata) VALUES ('$valuesdata')";
        
            $this->connection->query($starr);
        }

        public function login($data)
        {
             if(isset($_REQUEST['log']))
             {
                $SQL = "SELECT * FROM users WHERE email = '$data[email]' AND password = '$data[password]'";
                $sqlex = $this->connection->query($SQL);  
             

             if($sqlex->num_rows > 0)
             {
                 $userdata = $sqlex->fetch_object();
                 if($userdata->role_as == 1)
                 {
                    echo "Admin side";
                    header("location:admin/adminhome");
                }
                else
                {
                    header("location:home");
                 }
     
             }
             else
             {
                 echo "<script> alert('Invalid Username or Password')  </script>";
     
             } }
        }

        public function select($table)
        {
            $SQL = "SELECT * FROM $table";
            $sqlex = $this->connection->query($SQL);
            
            if($sqlex->num_rows > 0)
            {
                   while($data = $sqlex->fetch_object())
                {
                    $datas[] = $data;
                }
                    return $datas;
             }
        }

        public function insert($table,$data)
        {   
            array_pop($data);
            $keysdata = array_keys($data);
            $valuesdata = array_values($data);
    
            $keysdata = implode(",",$keysdata);
            $valuesdata = implode("','",$valuesdata);

            $sql = "INSERT INTO $table ($keysdata) VALUES ('$valuesdata')";
            $this->connection->query($sql);

        }

        public function count()
        {
            $sql1 = "SELECT * FROM users";
            $fetchuser1 = $this->connection->query($sql1);

            $sql2 = "SELECT * FROM queries";
            $fetchuser2 = $this->connection->query($sql2);
            
            
            $numberofrows1 = mysqli_num_rows($fetchuser1);
            $numberofrows2 = mysqli_num_rows($fetchuser2);
            echo "$numberofrows1 : Total Users<br>"; 
            echo "$numberofrows2: Total Queries"; 
        }

        public function delete($table,$id)
        {
            $sql = "DELETE FROM $table WHERE user_id = $id";
            // echo $sql;
            // echo "$table $id";
            // exit;
    
    
            $this->connection->query($sql);
            // header("location:$_SERVER[PHP_SELF]");
    
            // header
        }
    


}

    $obj = new model;









?>