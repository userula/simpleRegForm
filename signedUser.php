<?php 
    session_start();
    $f = $_SESSION['signedUser']['fname'];
    $l = $_SESSION['signedUser']['lname'];
    $e = $_SESSION['signedUser']['email'];
    $p = $_SESSION['signedUser']['pass'];
    $b = $_SESSION['signedUser']['bday'];
    $id = $_SESSION['signedUser']['id'];
    $url = $_SESSION['signedUser']['url'];
 ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<div class="container">
<div class="col-md-6 signup">
                <h2>Welcome</h2>
                <form id="signupform">
                    <div class="form-group">
                        <label for="fname">First name</label>
                        <input type="text" class="form-control" id="fname" value="<?php echo $f; ?>">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" id="lname" value="<?php echo $l; ?>" >
                    </div>
                    
                    <div class="form-group">
                        <label for="regEmail">Email</label>
                        <input type="email" class="form-control" id="regEmail" value="<?php echo $e; ?>">
                    </div>
                    <div class="form-group">
                        <label for="regPass">Password</label>
                        <input type="password" class="form-control" id="regPass" value="<?php echo $p; ?>">
                    </div>
                    <div class="form-group">
                        <label for="photo">URL Avatar</label>
                        <img src="<?php echo $url; ?>" style="width: 200px;">
                    </div>
                    <div class="form-group">
                        <label for="bday">Birthday</label>
                        <input type="date" class="form-control" value="<?php echo $b; ?>">
                    </div>
                </form>

</div>
<div class="col-md-1">
    <a href="goOut.php" class="btn btn-primary">Sign Out</a>
</div>
                
</div>