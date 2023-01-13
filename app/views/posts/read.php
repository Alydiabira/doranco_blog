<?php require APP_ROOT . '/views/layout/head.php'; ?>

<div class="navbar">
    <?php require APP_ROOT . '/views/layout/nav.php'; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h1><?php echo $data['post']->title; ?></h1>
        </div>

        <p><?php echo $data['post']->content; ?></p>
        <p>Category: <?php echo $data['post']->category; ?></p>
        <p>Created at: <?php echo $data['post']->date; ?></p>
        <p>Created by: <?php echo $data['post']->author; ?></p>
    </div>
</div>

<div class="footer">
    <?php require APP_ROOT . '/views/layout/footer.php'; ?>
</div>