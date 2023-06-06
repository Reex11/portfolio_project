<div class="main-message">
    <h1> Messages </h1>
    <p> Here are the messages our visitors sent </p>
</div>

<div class="messages">
    <?php 
        require_once PROJECT_HOME . '/lib/message_model.php';
        $messages = Message::all();
        foreach($messages as $message):
    ?>
        <div class="message">
            <div class="message-header">
                <h2> <?php echo $message['title']; ?> </h3>
                <span> <b><?php echo $message['sender_name']; ?></b> - <?php echo $message['sender_email']; ?> - <?= date('d/m/Y',$message['created_at']) ?> </span> 
                <div class="body"> <?php echo $message['body']; ?> </div>
            </div>
        </div>
        <?php endforeach; ?>
</div>