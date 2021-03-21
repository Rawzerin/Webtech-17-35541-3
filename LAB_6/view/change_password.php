<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
</head>
<style type="text/css">
  .error {
    color: red;
  }

  body {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }


  #back-button{
      position: absolute;
      right: 0px;
  }
  .rounded-input-field {
      border-radius: 15px;
      border: transparent;
      background-color: #eeeeee;
      padding: 15px;
      font-size: 18px;
      font-weight: bold;
  }
  .rectangular-button {
      border-radius: 15px;
      border: transparent;
      color: white;
      padding: 10px 15px 10px 15px;
      background-color: dodgerblue;
      font-weight: bold;
      font-size: 18px;
      text-align: center;
      elevation: 8deg;
  }

  .input-field-margin{
      margin: 10px;
  }

  .action-button-margin {
      margin: 25px;
  }
</style>

<body>


  <?php

  session_start();

  require $_SERVER['DOCUMENT_ROOT'] . "/controller/player_profile_controller.php";

  $savedCurrentPassword = getOldPassword($_SESSION['userId']);
   $currentPassword = $newPassword = $confirmPassword = $message =  "";
  $newPasswordErr = $confirmPasswordErr = $currentPasswordErr = null;


  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['currentPassword'])) {
      $currentPassword = $_POST['currentPassword'];

      if ($_POST['currentPassword'] != $savedCurrentPassword) {
        $currentPasswordErr = "Current password do not match!";
      }
    }

    if (isset($_POST['newPassword'])) {
      $newPassword = $_POST['newPassword'];

      if ($_POST['newPassword'] == $currentPassword) {
        $newPasswordErr = "New password should be different from current password";
      }
      if (strlen($_POST['newPassword']) >= 6) {
        if (preg_match("^(?=.*[A-Za-z])(?=.*)(?=.*[@$!%*#?&])[A-Za-z@$%#]^", $_POST['newPassword']) == 1) {
          $newPasswordErr = "";

          if (isset($_POST['confirmPassword']) && isset($_POST['newPassword'])) {
            $confirmPassword = $_POST['confirmPassword'];
            if ($_POST['confirmPassword'] != $_POST['newPassword']) {
              $confirmPasswordErr = "Password do not match! Please write the same password you provided on New Password field";
            }else{
                if (changeUserPassword($_SESSION['userId'], $newPassword)){
                    echo "<script>alert('Password successfully changed')</script>";
                }else{
                    echo "<script>alert('Something went wrong! Couldn\'t change the password. Try again)</script>";
                }
              $message = "Well done! Your password has been changed.";
            }
          }
        } else {
          $newPasswordErr = ". Password must contain at least one of the special characters (@, #, $,%)";
        }
      } else {
        $newPasswordErr = "Password must be at least 8 character!";
      }
    }
  }

  ?>


  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <h2 style="text-align: center;"> Change Password</h2><br><br>
    <fieldset>
      <legend>
        <h3>NAME</h3>
      </legend>

        <input class="rounded-input-field input-field-margin" placeholder="Current Password" type="text" name="currentPassword" value="<?php echo $currentPassword?>"><br>
        <span class="error"><?php echo $currentPasswordErr; ?></span><br>

        <input class="rounded-input-field input-field-margin" placeholder="New Password" type="text" name="newPassword" value="<?php echo $newPassword?>"><br>
        <span class="error"><?php echo $newPasswordErr; ?></span><br>

        <input class="rounded-input-field input-field-margin" placeholder="Confirm Password" type="text" name="confirmPassword" value="<?php echo $confirmPassword?>"><br>
        <span class="error"><?php echo $confirmPasswordErr; ?></span><br>
      <hr>
       <h4><?php echo $message?></h4>

      <input class="rectangular-button" type="Submit" value="Submit" style="margin-top: 20px">
        <a href="../view/profile.php">Back to profile</a>
    </fieldset>
  </form>
</body>

</html>