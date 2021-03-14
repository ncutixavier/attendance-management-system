<?php
$title = 'Home';
require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'sendEmail.php';

if (isset($_POST['submit'])) {
    //extract valuses from $_POST
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $prof = $_POST['prof'];
    $profile = $_POST['profile'];
    $email = $_POST['email'];

    $orig_file = $_FILES['avatar']['tmp_name'];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = "uploads/";
    $destination = "$target_dir$phone.$ext";
    move_uploaded_file($orig_file, $destination);

    //call function to insert and track success or not
    $isSuccess = $crud->insertAttendees($name, $dob, $phone, $prof, $profile, $email, $destination);
    $professionalName = $crud->getProfessionalsById($prof);

    if ($isSuccess) {
        SendEmail::SendMail($email, "Welcome to the meeting today!", "You have successfull registered for this year\'s conference");
        include 'includes/successMessage.php';
    } else {
        include 'includes/errorMessage.php';
    }
}
?>

<div class="d-flex justify-content-center my-5">
    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['name']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $professionalName["professional_name"]; ?></h6>
            <p class="card-text"><?php echo $_POST['profile']; ?></p>
        </div>
    </div>
</div>
<div class="text-center">
    <?php
    require_once 'includes/footer.php';
    ?>
</div>