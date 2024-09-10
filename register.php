<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
        <?php
            include("config.php");
            if (isset($_POST["submit"])) {
                $username = $_POST["name"]; 
                $email = $_POST["email"];
                $age = $_POST["age"];
                $password = $_POST["password"];

                $verify_query = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                            Error: Email already exists!
                        </div>";
                    echo "<a href='javascript:self.history.back()'>
                            <button class='btn'>Back to submit page</button>
                        </a>";
                } else {
                    $query = "INSERT INTO users (name, email, age, password) VALUES ('$username', '$email', $age,'$password')";
                    mysqli_query($conn, $query) or die("Error Occurred");

                    echo "<div class='messagee'>
                           Registration Successful!
                          </div>";
                    echo "<a href='index.php'>
                            <button class='btn'>Login Now</button>
                          </a>";
                }
            } else {
        ?>
            <header>Register</header>

            <form action="" method="post">

                <div class="field input">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" name="submit" value="Register" class="btn" required>
                </div>

                <div class="links">
                    Already have an account? <a href="index.php">Login</a>
                </div>
                
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>