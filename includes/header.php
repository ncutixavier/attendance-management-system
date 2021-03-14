<?php
include_once "includes/session.php"
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>AMS - <?php echo $title; ?></title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Attendance</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav me-auto">
                        <a class="nav-item nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-item nav-link" href="viewRecord.php">View Attendees</a>
                    </div>
                    <div class="navbar-nav">
                        <?php
                        if (!isset($_SESSION["id"])) {
                        ?>
                            <a class="nav-item nav-link active" href="login.php">Login</a>
                        <?php } else { ?>
                            <span class="navbar-text mr-3"> Hello <?php echo $_SESSION["username"]?>, </span>
                            <a class="nav-item nav-link active" href="logout.php">Logout</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>