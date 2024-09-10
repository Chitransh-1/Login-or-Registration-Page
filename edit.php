<?php
    session_start();
    include("config.php");
    if (isset($_SESSION["valid"])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p> <a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
        <?php
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $idid = $_SESSION['user_id'];
                $query = "UPDATE users SET name='$name', email='$email', age='$age' WHERE user_id='$idid'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 

                if($result){
                    echo "<div class='messagee'>
                        Profile Updated Successful!
                        </div>";
                    echo "<a href='home.php'>
                            <button class='btn'>Go Home</button>
                        </a>";
                }
            }else{
                $idid = $_SESSION["user_id"];
                $myqurry = "SELECT * FROM users WHERE user_id='$idid'";
                $querry = mysqli_query($conn, $myqurry) or die(mysqli_error($conn));

                while($result = mysqli_fetch_assoc($querry)){
                    $name = $result['name'];
                    $email = $result['email'];
                    $age = $result['age'];
                }
        ?>
            <header>Change Profile</header>
            <form action="" method="post">
                
                <div class="field input">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" value="<?php echo $name;?>" autocomplete="off" required>
                </div>
                    
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"value="<?php echo $email;?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $age;?>" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" name="submit" value="update" class="btn">
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>