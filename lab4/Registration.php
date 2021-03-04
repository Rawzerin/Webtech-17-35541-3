<html>
<head>
    <title>Registration</title>
    <style>
        html {
            overflow-y: scroll;
        }

        .rounded-input-field {
            border-radius: 15px;
            border: transparent;
            background-color: #eeeeee;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .input-field-margin {
            margin: 10px;
        }

        .content {
            margin: auto;
            text-align: center;
            padding: 50px;
            max-height: 780px;
        }

        .sign-in {
            padding: 30px;
            margin: 20px auto auto;
            width: fit-content;
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }


        body {
            overflow: scroll;
            background-image: url("img/bp_1.jpg");
            background-size: cover;
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

        .gender-fieldset {
            border-radius: 15px;
            text-align: center;
            font-weight: bold;
        }
        .action-button-margin{
            margin: 25px;
        }
    </style>

</head>
<body>
<?php
$GLOBALS['activeHomePage'] = $GLOBALS['activeLoginPage'] = "";
$GLOBALS['activeRegistrationPage']="active";
include "header.php";

?>

<form action="<?php echo htmlspecialchars(@$_SERVER['PHP_SELF']); ?>">
    <div class="content" id="reg">
        <div class="sign-in">
            <h2>Registration</h2>
            <input class="rounded-input-field input-field-margin" type="text" name="name" placeholder="Name"><br>
            <input class="rounded-input-field input-field-margin" type="text" name="email" placeholder="Email"><br>
            <input class="rounded-input-field input-field-margin" type="text" name="username"
                   placeholder="Username"><br>
            <input class="rounded-input-field input-field-margin" type="password" name="password"
                   placeholder="Password"><br>
            <fieldset class="input-field-margin gender-fieldset">
                <legend><h4>Gender</h4></legend>
                <input type="radio" name="gender" value="Female">Female
                <input type="radio" name="gender" value="Male">Male
            </fieldset><br>
            <div class="input-field-margin">
                <p style="font-weight: bold">Date of birth</p>
                <input class="rounded-input-field" type="date" name="dob"><br>
            </div>
            <input class="rectangular-button action-button-margin" type="submit" name="submit" value="Registration">
        </div>
    </div>
</form>
<?php include "footer.php" ?>
</body>
</html>
