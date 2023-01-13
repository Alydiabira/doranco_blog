<?php require APP_ROOT . '/views/layout/head.php'; ?>

<div class="navbar">
    <?php require APP_ROOT . '/views/layout/nav.php'; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="container-register">
                <div class="wrapper-register">
                    <h1>Edit post</h1>
                    <form action="<?php echo URL_ROOT; ?>posts/update/<?php echo $data['post']->id; ?>" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="title">
                                title
                                <?php echo $data['titleError']; ?>
                            </span>
                            <input type="text" class="form-control" name="title" value="<?php echo $data['post']->title ?>" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="excerpt">
                                excerpt
                                <?php echo $data['excerptError']; ?>
                            </span>
                            <textarea class="form-control" name="excerpt" required><?php echo $data['post']->excerpt ?></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="content">
                                content
                                <?php echo $data['contentError']; ?>
                            </span>
                            <textarea class="form-control" name="content" required><?php echo $data['post']->content ?></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="category">
                                category
                                <?php echo $data['categoryError']; ?>
                            </span>
                            <input type="text" class="form-control" name="category" value="<?php echo $data['post']->category ?>" required>
                        </div>

                        <button id="submit" type="submit" value="Update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <?php require APP_ROOT . '/views/layout/footer.php'; ?>
</div>