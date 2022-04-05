<?php
include_once("../../db/db.php");
include_once("../header/header.php");
?>
<form action="#" method="post" class="register">
    <div class="form-item center">
        <h2>Sign up</h2>
    </div>
    <div class="form-item">
        <label for="firstname">firstname:</label>
        <input type="text" name="firstname" id="firstname">
    </div>
    <div class="form-item">
        <label for="lastname">Lastname:</label>
        <input type="text" name="lastname" id="lastname">
    </div>
    <div class="form-item">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email">
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
        <a class="link center" href="../login/login.php">Already have an account, login here</a>
    </div>
    <div class="form-item">
        <input class="btn center" type="submit" value="Signup" name="submit">
    </div>
</form>

<?php 
if(isset($_POST["submit"])) {
    $_SESSION["signedUp"] = $conn->register($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["username"], $_POST["password"]);
    if($_SESSION["signedUp"]) {
        echo '<script type="text/javascript">location.reload(true);</script>';
    }
}

include_once("../footer/footer.php");