<?php
$title = 'Edit Attendee';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
$results = $crud->getProfessionals();

//Get attendee by id
if (!isset($_GET['id'])) {
    include 'includes/errorMessage.php';
} else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);
?>
    <h1>Edit Attendee</h1>
    <form class="my-5" method="post" action="editSuccess.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']; ?>">
        <div class="mb-3 form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $attendee['name']; ?>">
        </div>

        <div class="mb-3 form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $attendee['email']; ?>">
        </div>
        <div class="mb-3 form-group">
            <label for="dob" class="form-label">Date of birth</label>
            <input type="date" class="form-control" name="dob" id="dob" value="<?php echo date('Y-m-d', strtotime($attendee['dob'])); ?>">
        </div>
        <div class="mb-3 form-group">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $attendee['phone']; ?>">
        </div>
        <div class="mb-3 form-group">
            <label for="phone" class="form-label">Professional</label>
            <select class="form-select" name="prof">
                <option selected>select</option>
                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['professional_id'] ?>" <?php if ($r['professional_id'] == $attendee['professional_id']) echo 'selected' ?>><?php echo $r['professional_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="profile" class="form-label">Profile</label>
            <textarea class="form-control" id="profile" name="profile" rows="3" value="">
            <?php echo $attendee['profile']; ?>
            </textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
    </form>
<?php } ?>

<?php require_once 'includes/footer.php' ?>