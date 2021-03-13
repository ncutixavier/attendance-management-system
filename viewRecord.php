<?php
$title = 'Attendees';
require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getAttendees();
?>
<table class="table my-5 table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Professional</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <th scope="row"><?php echo $r['attendee_id'] ?></th>
                <td><?php echo $r['name'] ?></td>
                <td><?php echo $r['email'] ?></td>
                <td><?php echo $r['phone'] ?></td>
                <td><?php echo $r['professional_name'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-outline-light">view</a>
                    <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-outline-primary">edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?')" 
                    href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-outline-danger">delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require_once 'includes/footer.php' ?>