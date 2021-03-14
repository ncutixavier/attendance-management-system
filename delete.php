<?php
$title = 'Attendees';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

if(!$_GET['id']){
    include 'includes/errorMessage.php';

}else{
    $id = $_GET['id'];
    $isSuccess = $crud->deleteAttendee($id);
    if($isSuccess){
        header('Location: viewRecord.php');
    }else{
        include 'includes/errorMessage.php';
    }
}
