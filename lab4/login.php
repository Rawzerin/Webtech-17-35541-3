<html>
<head>
    <title>Login</title>
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
            padding: 20px;

        }

        .sign-in {
            padding: 30px;
            margin: 20px auto auto;
            width: fit-content;
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .checkbox-style {
            font-weight: bold;
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

        .action-button-margin{
            margin: 30px;
        }
    </style>
</head>
<body>
<?php
$GLOBALS['activeHomePage'] = $GLOBALS['activeRegistrationPage']="";
$GLOBALS['activeLoginPage']="active";
include "header.php";
?>
<form action="<?php echo htmlspecialchars(@$_SERVER['PHP_SELF']);?>">
    <div class="content">
        <div class="sign-in">
            <h2>Sign In</h2>
            <input class="rounded-input-field input-field-margin" type="text" name="email" placeholder="Your Email"><br>
            <input class="rounded-input-field input-field-margin" type="password" name="password" placeholder="Password"><br>
            <input class="input-field-margin checkbox-style" type="checkbox" name="rememberMe"><span class="checkbox-style">Remember Me</span><br>
            <input class="rectangular-button input-field-margin" type="submit" name="submit" value="Login"><br>
            <a href="FogetPassword.php" class="action-button-margin">Forget Password?</a>
        </div>
    </div>
</form>
<?php include "footer.php" ?>
</body>

</html>
