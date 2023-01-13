<?php
   require APP_ROOT . '/views/layout/head.php';
?>

<div class="navbar">
    <?php
       require APP_ROOT . '/views/layout/nav.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Register</h2>
        
        <form id="register-form" method="POST" action="<?php echo URL_ROOT; ?>users/register">
            <div class="input-group mb-3">
                <span class="input-group-text invalidFeedback" id="lastname">
                    lastname
                    <?php echo $data['lastnameError']; ?>
                </span>
                <input type="text" class="form-control" name="lastname" placeholder="lastname" aria-label="lastname" aria-describedby="lastname" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text invalidFeedback" id="firstname">
                    firstname
                    <?php echo $data['firstnameError']; ?>
                </span>
                <input type="text" class="form-control" name="firstname" placeholder="firstname" aria-label="firstname" aria-describedby="firstname" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text invalidFeedback" id="email">
                    email
                    <?php echo $data['emailError']; ?>
                </span>
                <input type="text" class="form-control" name="email" placeholder="email" aria-label="email" aria-describedby="email" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text invalidFeedback" id="password">
                    password
                    <?php echo $data['passwordError']; ?>
                </span>
                <input type="text" class="form-control" name="password" placeholder="password" aria-label="password" aria-describedby="password" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text invalidFeedback" id="confirmPassword">
                    confirmPassword
                    <?php echo $data['confirmPasswordError']; ?>
                </span>
                <input type="text" class="form-control" name="confirmPassword" placeholder="confirmPassword" aria-label="confirmPassword" aria-describedby="confirmPassword" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text invalidFeedback" id="alias">
                    Alias
                    <?php echo $data['aliasError']; ?>
                </span>
                <input type="text" class="form-control" name="alias" placeholder="Alias" aria-label="Alias" aria-describedby="alias" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text invalidFeedback" id="bio">
                    bio
                    <?php echo $data['bioError']; ?>
                </span>
                <textarea class="form-control" name="bio" placeholder="bio"></textarea>
            </div>

            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Not registered yet? <a href="<?php echo URL_ROOT; ?>users/register">Create an account!</a></p>
        </form>
    </div>
</div>