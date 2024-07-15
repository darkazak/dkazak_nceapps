<?php $this_page = thisPageID(); ?>
<!-- <nav class="navbar navbar-expand-sm bg-body-tertiary mb-3" data-bs-theme="dark"> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-0 mb-lg-0">
        <li class="nav-item">
          <!-- <a class="nav-link active" aria-current="page" href="#">Home</a>   -->
          <a class="nav-link <?php echo ($this_page == 'home') ? 'active' : '';  ?> " href="<?php echo URLROOT; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($this_page == 'about') ? 'active' : '';  ?>" href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto mb-0 mb-lg-0">
        <?php if (isLoggedIn()) : ?>
          <li class="nav-item">
            <span class="nav-link" href="<?php echo URLROOT; ?>">
              <em>Logged in as <?php echo $_SESSION['user_name'] ?>.</em>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($this_page == 'logout') ? 'active' : '';  ?>" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($this_page == 'register') ? 'active' : '';  ?>" href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($this_page == 'login') ? 'active' : '';  ?>" href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
        <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>