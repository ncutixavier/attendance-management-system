<?php
$title = 'login';
require_once 'includes/header.php';
require_once 'db/conn.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password . $username);

    $result = $auth->getUser($username, $new_password);
    if (!$result) {
        echo '<div class="alert alert-danger">Wrong email or password</div>';
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $result['id'];
        header('Location: viewRecord.php');
    }
}

?>

<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Log in</h3>
            <div class="card-text">
                <!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <!-- to error: add class "has-danger" -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control form-control-sm" id="exampleInputEmail1" value="<?php if ($_SERVER['REQUEST_METHOD'] == "post") echo $_POST['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>