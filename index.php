<?php
$title = 'Home';
require_once 'includes/header.php';
require_once 'db/conn.php';
$results = $crud->getProfessionals();
?>
<h1>Register</h1>
<form class="my-5" method="post" action="success.php" enctype="multipart/form-data">
    <div class="mb-3 form-group">
        <label for="name" class="form-label">Name</label>
        <input required type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
    </div>

    <div class="mb-3 form-group">
        <label for="email" class="form-label">Email</label>
        <input required type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 form-group">
        <label for="dob" class="form-label">Date of birth</label>
        <input required type="date" class="form-control" name="dob" id="dob">
    </div>
    <div class="mb-3 form-group">
        <label for="phone" class="form-label">Phone</label>
        <input required type="text" class="form-control" name="phone" id="phone">
    </div>
    <div class="mb-3 form-group">
        <label for="phone" class="form-label">Professional</label>
        <select class="form-select" name="prof">
            <option selected>select</option>
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['professional_id'] ?>"><?php echo $r['professional_name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="profile" class="form-label">Profile</label>
        <textarea class="form-control" id="profile" name="profile" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="avatar" class="form-label">Upload Photo</label>
        <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
<?php require_once 'includes/footer.php' ?>