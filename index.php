<?php
    include 'functions.php';

// Connecting to db
    $pdo = pdo_connect_mysql();

	session_start();
// MySQL query that retrieves  all the tickets from the databse
    $stmt = $pdo->prepare('SELECT * FROM tickets ORDER BY date_created DESC');
    $stmt->execute();
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Tickets')?>

<div class="content home">

	<h2>Tickets</h2>

	<p>Welcome to the Home page. You can view the list of tickets below.</p>

	<div class="btns">
		<a href="create.php" class="btn">Create Ticket</a>
	</div>

	<div class="tickets-list">
		<?php foreach ($tickets as $ticket): ?>
		<a href="view.php?id=<?=$ticket['id']?>" class="ticket">
			<span class="con">
				<?php if ($ticket['status'] == 'open'): ?>
				<i class="far fa-clock fa-2x"></i>
				<?php elseif ($ticket['status'] == 'resolved'): ?>
				<i class="fas fa-check fa-2x"></i>
				<?php endif; ?>
			</span>
			<span class="con">
				<span class="title"><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?></span>
				<span class="msg"><?=htmlspecialchars($ticket['msg'], ENT_QUOTES)?></span>
			</span>
			<span class="con created"><?=date('F dS, G:ia', strtotime($ticket['date_created']))?></span>
		</a>
		<?php endforeach; ?>
	</div>

</div>

<?=template_footer()?>