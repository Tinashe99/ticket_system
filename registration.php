<?php
// include 'functions.php';

function pdo_connect_mysql() {
    // connection details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'phpticket';

    try {
        //code...
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } 
    
    catch (PDOException $exception) {
        //throw $th;
        // (\Throwable $th)
        exit('Failed to connect to database!');
    }
}

// header template
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Ticketing System</h1>
            </div>
        </nav>
    EOT;
    }

        // Template footer
    function template_footer() {
        echo <<<EOT
        </body>
    </html>
    EOT;
    }


$pdo = pdo_connect_mysql();

// When form submitted, insert values into the database.
if (isset($_POST['username'], $_POST['password'])) {
    // Validation checks... make sure the POST data is not empty
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $msg = 'Please complete form!';
    } 
    
    else {
        //new record into the tickets table
        $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
        $stmt->execute([ $_POST['username'], $_POST['password']]);

        // Redirect to the view ticket
        header('Location: create.php?id=' . $pdo->lastInsertId());
    }
}
        // if ($stmt) 
        // {
        //     echo "<div class='form'>
        //           <h3>You are registered successfully.</h3><br/>
        //           <p class='link'>Click here to <a href='login.php'>Login</a></p>
        //           </div>";
        // } 
        
        // else {
        //     echo "<div class='form'>
        //           <h3>Required fields are missing.</h3><br/>
        //           <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
        //           </div>";
        // }
    // }
?>

<?=template_header('Register')?>
<center>
<div class="content create">
    <h1 class="login-title">Registration</h1>
    <form action="registration.php" method="post">
        <label for="username">Username</label>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <label for="Password">Password</label>
        <input type="password" class="login-input" name="password" placeholder="Password">
        
        <center>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
        </center>
    </form>
</div>
</center>

<?=template_footer()?>