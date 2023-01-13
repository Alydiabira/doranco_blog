<?php require APP_ROOT . '/views/layout/head.php'; ?>

<div class="navbar">
    <?php require APP_ROOT . '/views/layout/nav.php'; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Contact</h1>
            <div class="notification">
                <?php echo((!empty($errorMessage)) ? $errorMessage : ''); ?>
                <?php echo((!empty($successMessage)) ? $successMessage : ''); ?>
            </div>
        </div>

        <form id="contact-form" action="<?php echo URL_ROOT; ?>pages/contact" method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            
            <div class="mb-3">
                <textarea class="form-control" id="exampleCheck1" name="message"></textarea>
                <label class="form-check-label" for="exampleCheck1">Message</label>
            </div>

            <button type="submit" class="btn btn-primary g-recaptcha-response" data-sitekey="nEsX#G45!0Z2dSENxho2Pw^6PpwP@kyiYaw%pzif" data-callback="onRecaptchaSuccess">Submit</button>
            <!-- Dans la réalité: 
                <input type="hidden" class="btn btn-primary g-recaptcha" data-sitekey="nEsX#G45!0Z2dSENxho2Pw^6PpwP@kyiYaw%pzif" data-callback="">
            -->
        </form>
        <script>
            function onRecaptchaSuccess() {
                document.getElementById('contact-form').submit()
            }
        </script>
    </div>
</div>

<div class="footer">
    <?php require APP_ROOT . '/views/layout/footer.php'; ?>
</div>