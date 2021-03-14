<?php
$title = 'Attendees';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

//Get attendee by id
if (!isset($_GET['id'])) {
    include 'includes/errorMessage.php';
} else {
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);
?>

    <div class="d-flex justify-content-center my-5">
        <div class="card" style="width: 30rem;">
            <div style="width: 250px; height: 250px">
                <img src="<?php echo empty($result['avatar_path']) ? 'uploads/download.png' : $result['avatar_path'] ?>" 
                class="card-img-top" width="100%">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $result['name']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['professional_name']; ?></h6>
                <p class="card-text"><?php echo $result['profile']; ?></p>
            </div>
        </div>
    </div>

    <div class="my-5">
        <a href="viewRecord.php" class="btn btn-outline-warning">back to list</a>
        <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-outline-primary">edit</a>
        <a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-outline-danger">delete</a>
    </div>

<?php } ?>

<div class="text-center">
    <?php
    require_once 'includes/footer.php';
    ?>
</div>