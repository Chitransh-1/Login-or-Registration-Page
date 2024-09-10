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
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p> <a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
            <?php
                $idd = $_SESSION['user_id'];
                $myquery = "SELECT * FROM users WHERE user_id=$idd";
                $qurry = mysqli_query($conn, $myquery);

                while($result = mysqli_fetch_assoc($qurry)){
                    $username = $result['name'];
                    $email = $result['email'];
                    $iidd = $result['user_id'];
                    $age = $result['age'];
                }
                echo "<a href='edit.php?user_id=$iidd'>Change Profile</a>";
            ?>
            <a href="logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>
        <div class="main-box top">

            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $username?></b>, Welcome to Your Profile Page!</p>

                </div>
                <div class="box">
                    <p>Your Email <b><?php echo $email?></b>.</p>
                </div>
            </div>

            <div class="bottom">
                <div class="box">
                    <p>And Your'e <b><?php echo $age?> Year Old </b>.</p> 
                </div>
            </div>
        </div>
    </main>
</body>
</html>