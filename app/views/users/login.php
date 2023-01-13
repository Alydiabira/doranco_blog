<?php require APP_ROOT . '/views/layout/head.php'; ?>

<div class="navbar">
    <?php require APP_ROOT . '/views/layout/nav.php'; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="container-register">
                <div class="wrapper-register">
                    <h1>Login</h1>
                    <form action="<?php echo URL_ROOT; ?>users/login" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="alias">
                                Alias
                                <?php echo $data['aliasError']; ?>
                            </span>
                            <input type="text" class="form-control" name="alias" placeholder="Alias" aria-label="Alias" aria-describedby="alias" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="password">
                                Password
                                <?php echo $data['passwordError']; ?>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password" required>
                        </div>

                        <button id="submit" type="submit" value="Login">Login</button>

                        <p class="options">Not registered yet? <a href="<?php echo URL_ROOT; ?>users/register">Create an account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <?php require APP_ROOT . '/views/layout/footer.php'; ?>
</div>