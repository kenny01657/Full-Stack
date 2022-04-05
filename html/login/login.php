<?php
include_once("../../db/db.php");
include_once("../header/header.php"); 
include_once("../error_handeling/errorHandeling.php");
?>
<form action="#" method="post" class="register">
    <div class="form-item center">
        <h2>Login</h2>
    </div>
    <div class="form-item">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="form-item">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="form-item">
        <a class="link center" href="../register/register.php">Create an account</a>
        <a class="link center" href="#">Reset password</a>
    </div>
    <div class="form-item">
        <input class="btn center" type="submit" name="submit" value="Login">
    </div>
</form>

<?php
if(isset($_POST["submit"])) {
    $_SESSION["logedIn"] = $conn->login($_POST["username"], $_POST["password"]);
    if($_SESSION["logedIn"]) {
        echo '<script type="text/javascript">location.reload(true);</script>';
    } else {
        checkCredentials();
    }
}
include_once("../footer/footer.php");