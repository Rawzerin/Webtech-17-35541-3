<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../styles/player_profile_styles.css">
</head>

<body>
<?php
session_start();
include 'header.php';
require $_SERVER['DOCUMENT_ROOT'] . "/controller/player_profile_controller.php";

if (!isset($_SESSION['userId'])) {
    header('Location: ../view/profile.php');
}


$name = $email = $phone = $address = $region = $shopName = "N/A";

$userInfo = getUserInfo($_SESSION['userId'])[0];


$message = "";
$imagePath = "../img/avatar_icon.png";
$target_dir = "../uploads/";
if (isset($_FILES["profilePictureUpload"]) && isset($_POST["submit"])) {
    $message = "working";
    $target_file = $target_dir . basename($_FILES["profilePictureUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $message = "checking file type";
        $message = "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    } else {
        if (file_exists($target_file)) {
            $message = "Sorry, file already exists.";
            $uploadOk = 0;
        } else {
            if ($_FILES["profilePictureUpload"]["size"] > 4194304) {
                $message = "checking file size";
                $message = "Sorry, your file is too large. <br> Picture size should not be more than 4MB";
                $uploadOk = 0;
            } else {
                $uploadOk = 1;
            }
        }
    }
    if ($uploadOk == 1) {
        $message = "File successfully uploaded";
        if (move_uploaded_file($_FILES["profilePictureUpload"]["tmp_name"], $target_file)) {
            $message = "The file " . htmlspecialchars(basename($_FILES["profilePictureUpload"]["name"])) . " has been uploaded.";
            $imagePath = "$target_file";
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<div class="flex-container">
            <div class="sidenav">
                <a href="#Profile">Profile</a><br>
                <a href="#Friends">Friends</a><br>
                <a href="#Players">Players</a><br>
                <a href="#Store">Store</a><br>
                <a href="../view/change_password.php">Change Password</a>
            </div>
          <div class="content rounded-input-field">
            <table>
                <tr>
                    <td>Name</td>
                    <td> : <?php echo $userInfo['name']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> : <?php echo $userInfo['email']; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td> : <?php echo $userInfo['phone']; ?></td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td> : <?php echo $userInfo['region']; ?></td>
                </tr>
                <tr>
                    <td>Date of birth</td>
                    <td> : <?php echo $userInfo['dob'] ?></td>
                </tr>
            </table>
              <input id="edit_profile" class="rectangular-button" type="button" value="Edit Profile"/>
        </div>
    <div class="profile-picture rounded-input-field">
                <p>Profile Picture</p>
            <img src="<?php echo $imagePath; ?>" alt="Avatar Icon" height="100" width="100"
                 style="align-content: center"><br>
            <input type="file" name="profilePictureUpload" id="profilePictureUpload">
            <p><?php echo $message ?></p>
            <input type="submit" value="Upload Profile Picture" name="submit">
    </div>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>

<script type="text/javascript" src="../scripts/profile_view.js"></script>
</body>

</html>