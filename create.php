<?php
include 'functions.php';
$pdo = pdo_connect_mysql();

session_start();
//message variable
    $msg = '';
    // Check if POST data exists (user submitted the form)
    if (isset($_POST['title'], $_POST['user'], $_POST['msg'])) {
        // Validation checks... make sure the POST data is not empty
        if (empty($_POST['title']) || empty($_POST['user']) || empty($_POST['msg'])) {
            $msg = 'Please complete form!';
        } 
        
        else {
            //new record into the tickets table
            $stmt = $pdo->prepare('INSERT INTO tickets (title, user, msg) VALUES (?, ?, ?)');
            $stmt->execute([ $_POST['title'], $_POST['user'], $_POST['msg'] ]);

            // Redirect to the view ticket
            header('Location: view.php?id=' . $pdo->lastInsertId());
        }
    }
?>

<?=template_header('Create Ticket')?>
<center>
<div class="content create">
	<h2>Create Ticket</h2>
    <form action="create.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" id="title" required>
        <label for="user">User</label>
        <input type="user" name="user" placeholder="your name" id="user" required>
        <label for="msg">Message</label>
        <textarea name="msg" placeholder="Enter your message here..." id="msg" required></textarea>
        
        <center>
        <input type="submit" value="Create">
        </center>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</center>
<?=template_footer()?>