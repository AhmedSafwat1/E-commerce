
<form class='login img-fluid' action="../controller/logincontroller.php" method="post">
    <h4 class="text-center mb-4">LOgin Admin</h4>
    <div class="form-group mb-3">
        <input type="text" class="form-control input-group-lg " name="username" autocomplete="off" aria-describedby="emailHelp" placeholder="Enter user name">
    </div>
    <div class="form-group mb-3">
        <input type="password" class="form-control input-group-lg" autocomplete="new-password" name="password" placeholder="Password">
    </div>
    <input type='submit' name="submit" value="Login" class="btn btn-primary btn-block ">
</form>