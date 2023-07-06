<?php include(__DIR__ . '/../dashboard/header.php') ?>
<div class="main-content">
  <div class="card">
    <?php
    if (isset($error['name'])) { ?>
      <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
        <?php echo $error['name'] ?>
      </div>
    <?php } else if (isset($error['password'])) { ?>
      <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
        <?= $error['password'] ?>
      </div>
    <?php } else if (isset($error['email'])) { ?>
      <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
        <?= $error['email'] ?>
      </div>
    <?php } else if (isset($error['name_exist'])) { ?>
      <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
        <?= $error['name_exist'] ?>
      </div>
    <?php }
    ?>
    <div class="card-body">
      <!-- Logo -->
      <div class="app-brand justify-content-center">
        <a href="index.html" class="app-brand-link gap-2">

          <span class="app-brand-text demo text-body fw-bolder">Register</span>
        </a>
      </div>
      <!-- /Logo -->

      <form id="formAuthentication" class="mb-3" action="http://localhost/phpmvc/index.php?controller=auth&action=singUp" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" autofocus />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
        </div>
        <div class="mb-3 form-password-toggle">
          <label class="form-label" for="password">Password</label>
          <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          </div>
        </div>

        <button name="regis" type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
      </form>

      <p class="text-center">
        <span>Already have an account?</span>
        <a href="login.php">
          <span>Sign in instead</span>
        </a>
      </p>
    </div>
  </div>
</div>