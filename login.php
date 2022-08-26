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

    session_start();
    if (isset($_POST['username'], $_POST['password'])) {
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";  
              $statement = $pdo->prepare($query);  
              $statement->execute(  
                   array(  
                        'username'     =>     $_POST["username"],  
                        'password'     =>     $_POST["password"]  
                   )  
              );  
              $count = $statement->rowCount(); 

              if($count > 0)  
              {  
                //    $_SESSION["username"] = $_POST["username"];  
                   header("location:index.php");  
              }  
              else  
              {  
                   $message = '<label>Wrong Data</label>';  
              }  
            }

?>

<?=template_header('Login')?>
<center>
<div class="content create">
    <h1 class="login-title">Login</h1>
    <form action="login.php" method="post">
    <label for="username">Username</label>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <label for="Password">Password</label>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        
        <center>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">Sign Up / Register</a></p>
        </center>
    </form>
</center>
<?=template_footer()?>