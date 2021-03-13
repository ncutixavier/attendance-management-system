<?php
    $title = 'Home';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract valuses from $_POST
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $prof = $_POST['prof'];
        $profile = $_POST['profile'];
        $email = $_POST['email'];
        
        //call function to insert and track success or not
        $isSuccess = $crud->insertAttendees($name, $dob, $phone, $prof, $profile, $email);
        
        if($isSuccess){
            include 'includes/successMessage.php';
        }else{
            include 'includes/errorMessage.php';
        }
    }
?>

<div class="d-flex justify-content-center my-5">
    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['name']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['prof']; ?></h6>
            <p class="card-text"><?php echo $_POST['profile']; ?></p>
        </div>
    </div>
</div>
<div class="text-center">
    <?php
    require_once 'includes/footer.php';
    ?>
</div>