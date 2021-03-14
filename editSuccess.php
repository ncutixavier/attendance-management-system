<?php
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

//get values from post
if (isset($_POST['submit'])) {
    //extract valuses from $_POST
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $prof = $_POST['prof'];
    $profile = $_POST['profile'];
    $email = $_POST['email'];
    
    echo $id, $name, $dob, $phone, $prof, $profile, $email;
    //call crud function 
    $isSuccess = $crud->editAttendee($id, $name, $dob, $phone, $prof, $profile, $email);

    //redirect to index
    if($isSuccess){
        // echo $isSuccess;
        header('Location: viewRecord.php');
    }else{
        include 'includes/errorMessage.php';
    }
    }else{
    include 'includes/errorMessage.php';
    }
