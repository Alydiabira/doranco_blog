<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="<?php echo URL_ROOT; ?>index">Home<a>
  <li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo URL_ROOT; ?>posts/index">Blog</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo URL_ROOT; ?>pages/about">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo URL_ROOT; ?>pages/contact">Contact</a>
  </li>
  <li class="nav-item btn-login">
    <?php if(isset($_SESSION['user_id'])) : ?>
        <a class="nav-link" href="<?php echo URL_ROOT; ?>users/logout">Log out</a>
    <?php else : ?>
        <a class="nav-link" href="<?php echo URL_ROOT; ?>users/login">Login</a>
    <?php endif; ?>
  </li>
</ul>