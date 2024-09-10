<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
        <?php
            include("config.php");

            if(isset($_POST["submit"])) {
                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                $password = mysqli_real_escape_string($conn, $_POST["password"]);

                $myquery = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                $result = mysqli_query($conn, $myquery) or die("Failed to query database!");
                $row = mysqli_fetch_assoc($result);
                
                if(is_array($row) && !empty($row)) {
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["name"] = $row["name"];
                    $_SESSION["user_id"] = $row["user_id"];
                    
                    header("Location: home.php");
                    exit();
                } else {
                    echo "<div class='message'>
                            Error: Wrong Email or Password!
                          </div>";
                    echo "<a href='index.php'>
                            <button class='btn'>Back to Login page</button>
                          </a>";
                }
            } else {
        ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" name="submit" value="Login" class="btn">
                </div>

                <div class="links">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>

                <div class="linkss">
                    <p>Don't remember your password? <a href="forgot.php">Forgot Password</a></p>
                </div>

            </form>
        </div>
        <?php }; ?>
    </div>
</body>
</html>