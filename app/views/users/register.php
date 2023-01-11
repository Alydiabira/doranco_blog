<?php require APP_ROOT . '/views/layout/head.php'; ?>

<div class="navbar">
    <?php require APP_ROOT . '/views/layout/nav.php'; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="container-register">
                <div class="wrapper-register">
                    <h1>Register</h1>
                    <form action="<?php echo URL_ROOT; ?>/users/register" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="lastname">
                                Lastname
                                <?php echo $data['lastnameError']; ?>
                            </span>
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname" aria-label="Lastname" aria-describedby="lastname">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="firstname">
                                Firstname
                                <?php echo $data['firstnameError']; ?>
                            </span>
                            <input type="text" class="form-control" name="firstname" placeholder="Firstname" aria-label="Firstname" aria-describedby="firstname">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="email">
                                Email
                                <?php echo $data['emailError']; ?>
                            </span>
                            <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="password">
                                Password
                                <?php echo $data['passwordError']; ?>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="confirmPassword">Confirm 
                                Password
                                <?php echo $data['confirmPasswordError']; ?>
                            </span>
                            <input type="password" class="form-control" name="confirmPassword" placeholder="ConfirmPassword" aria-label="ConfirmPassword" aria-describedby="confirmPassword">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="alias">
                                Alias
                                <?php echo $data['aliasError']; ?>
                            </span>
                            <input type="text" class="form-control" name="alias" placeholder="Alias" aria-label="Alias" aria-describedby="alias">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="bio">
                                Bio
                                <?php echo $data['bioError']; ?>
                            </span>
                            <textarea class="form-control" name="bio" aria-label="Bio" aria-describedby="bio"></textarea>
                        </div>

                        <button id="submit" type="submit" value="Register"></button>

                        <p class="options">Already registered. <a href="<?php echo URL_ROOT; ?>/users/login">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <?php require APP_ROOT . '/views/layout/footer.php'; ?>
</div>