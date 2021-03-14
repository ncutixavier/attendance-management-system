<?php
class crud
{
    //private database object
    private $db;

    // constructor to initialize private variable to the db
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertAttendees($name, $dob, $phone, $prof, $profile, $email, $avatar_path)
    {
        try {
            //define sql to be executed
            $sql = "INSERT INTO attendee (email,dob,phone,professional_id,profile,name,avatar_path) VALUES (:email,:dob,:phone,:prof,:profile,:name,:avatar_path)";

            //prepare sql statetement for executed
            $stmt = $this->db->prepare($sql);

            //bind all placeholder to actual values
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':prof', $prof);
            $stmt->bindparam(':profile', $profile);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':avatar_path', $avatar_path);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editAttendee($id, $name, $dob, $phone, $prof, $profile, $email)
    {
        try {
            $sql = "UPDATE attendee SET email=:email,dob=:dob,phone=:phone,professional_id=:prof,profile=:profile,name=:name WHERE attendee_id = :id";
            //prepare sql statetement for executed
            $stmt = $this->db->prepare($sql);

            //bind all placeholder to actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':prof', $prof);
            $stmt->bindparam(':profile', $profile);
            $stmt->bindparam(':name', $name);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendees()
    {
        try {
            $sql = "SELECT * FROM `attendee` a inner join professional p on a.professional_id = p.professional_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getProfessionals()
    {
        try {
            $sql = "SELECT * FROM `professional`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getProfessionalsById($id)
    {
        try {
            $sql = "SELECT * FROM `professional` WHERE professional_id='$id'";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendeeDetails($id)
    {
        try {
            $sql = "select * FROM `attendee` a inner join professional p on a.professional_id = p.professional_id where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAttendee($id)
    {
        try {
            $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
