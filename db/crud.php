<?php

class crud
{
    //private database object
    private $db;

    //constructor to initialize private variable tro the database connection
    function __construct($conn)
    {
        $this ->db = $conn;
    }
    // function that creates records for database
    public function insertPatient($fname,$lname,$dob,$gender,$phone,$email,$treat,$imgpath) //php var
    {
       try
       {                                        //database                  
        $sql="INSERT INTO patients (FirstName, LastName, DateOfBirth,Gender,Contact,Email,Treatment_id,Img_Path) VALUES(:fname,:lname,:dob,:gender,:phone,:email,:treat,:imgpath)";
       // binding all placeholders to actual values
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':fname',$fname);
        $stmt->bindparam(':lname',$lname);
        $stmt->bindparam(':dob',$dob);
        $stmt->bindparam(':gender',$gender);
        $stmt->bindparam(':phone',$phone);
        $stmt->bindparam(':email',$email);
        $stmt->bindparam(':treat',$treat);
        $stmt->bindparam(':imgpath',$imgpath);
        

        $stmt->execute();
        return true;

        }catch(\PDOException $e)
            {
                //throw $th;
                echo $e->getMessage();
                return false;
            }
    } 


  // function that views records from database

    public function getPatients()

    {
       try
       { $sql="SELECT *FROM `patients`p inner join `treatment`t on p.Treatment_id = t.treatment_id";
        $results = $this->db->query($sql);
        return $results;
       }
       catch(\PDOException $e)
            {
                //throw $th;
                echo $e->getMessage();
                return false;
            }
    }

    public function getTreatment()
    {
        try
        {
            $sql="SELECT *FROM `treatment`";
            $results = $this->db->query($sql);
            return $results;
        }
        catch(\PDOException $e)
            {
                //throw $th;
                echo $e->getMessage();
                return false;
            }

    }

    public function getPatientDetails($id)
    {
       try
       { 
           $sql="select * from `patients`p inner join `treatment`t on p.treatment_id = t.treatment_id where Patient_id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $results=$stmt->fetch();
            return $results;
       }
       catch(\PDOException $e)
            {
                //throw $th;
                echo $e->getMessage();
                return false;
            }
    }

    public function editPatient($id,$fname,$lname,$dob,$gender,$phone,$email,$treat)
    { 
        $sql = "UPDATE `patient` SET `FirstName`=:fname,`LastName`=:lname,`DateOfBirth`=:dob,`Gender`=:gender,`Contact`=:phone,`Email`=:email,
        `Treatment_id`=:treat 
        WHERE Patient_id = :id ";
        try
        {

            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':id',$id);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':gender',$gender);
            $stmt->bindparam(':phone',$phone);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':treat',$treat);

         $stmt->execute();
         return true;
 
         }catch(\PDOException $e)
             {
                 //throw $th;
                 echo $e->getMessage();
                 return false;
             }

   
   
    }// end of the edit function

    public function deletePatient($id)
    {
        try{
            $sql="delete from patients where Patient_id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
        }
        catch(\PDOException $e)
        {
            //throw $th;
            echo $e->getMessage();
            return false;
        }
    }   


    public function getTreatmentByID($treat)
    {
        try
        {
            $sql="SELECT *FROM `treatment` WHERE `Treatment_id` =:treat";
            $stmt= $this->db->prepare($sql);
            $stmt->bindparam(':treat',$treat);
            $stmt->execute();
            $results=$stmt->fetch();
            
            return $results;
        }
        catch(\PDOException $e)
            {
                //throw $th;
                echo $e->getMessage();
                return false;
            }

    }


}

?>