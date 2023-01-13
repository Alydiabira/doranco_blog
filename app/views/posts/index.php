<?php require APP_ROOT . '/views/layout/head.php'; ?>

<div class="navbar">
    <?php require APP_ROOT . '/views/layout/nav.php'; ?>
</div>

<div class="container">
    <?php if(isLoggedIn() && ($_GET['url'] == 'posts/index')): ?>
        <a href="<?php URL_ROOT; ?>create" class="btn-green">Create</a>
    <?php else: ?>
        <a href="<?php URL_ROOT; ?>posts/create" class="btn-green">Create</a>
    <?php endif; ?>

    <div class="row">
        <div class="col-10">
            <h1>Blog</h1>
        </div>

        <?php foreach ($data['posts'] as $post): ?>
        <div class="container-item">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post->title; ?></h5>
                        <p class="card-text"><?php echo $post->excerpt; ?></p>
                        <p>Category: <?php echo $post->category; ?></p>
                        <p>Created at: <?php echo $post->date; ?></p>
                        <p>Created by: <?php echo $post->author; ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn-green mr-2">
                            <a href="<?php echo URL_ROOT; ?>posts/read/<?php echo $post->id ?>" class="btn green">Read</a>
                        </button>
                        <?php if(isset($_SESSION['user_id']) && $_SESSION['alias'] == $post->author): ?>
                            <button class="btn-green mr-2">
                                <a href="<?php echo URL_ROOT; ?>posts/update/<?php echo $post->id ?>" class="btn orange">Edit</a>
                            </button>
                            <form action="<?php echo URL_ROOT; ?>posts/delete/<?php echo $post->id ?>" method="post">
                                <input type="submit" name="delete" value="Delete" class="btn red">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="footer">
    <?php require APP_ROOT . '/views/layout/footer.php'; ?>
</div>