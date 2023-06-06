<?php extract($data); ?>
<div class="main-message">

<h1> Seeding result </h1>

<?php if($status): ?>
    <table class="status-table">
        <thead>
            <tr>
                <th> Item </th>
                <th> Status </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($status as $item => $result): ?>
                <tr>
                    <td> <?= $item ?> </td>
                    <td> <?= $result ?> </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif; ?>

    <div style="margin-top: 20px;">
        <a href="/index.php" class="btn"> Go to Homepage </a>
        <a href="/seed_db.php" class="btn"> Retry seeding </a>
    </div>

</div>