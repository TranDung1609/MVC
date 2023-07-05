<?php include_once 'views/dashboard/header.php' ?>
<div class="main-content">
  <div class="card">
    <div class="card-body">
      <!-- Logo -->
      <div class="app-brand justify-content-center">
        <a href="index.html" class="app-brand-link gap-2">

          <span class="app-brand-text demo text-body fw-bolder">LOGIN</span>
        </a>
      </div>
      <!-- /Logo -->
      <?php
      if (isset($data["result"])) {
        if ($data["result"] == "true") {
        } else { ?>
          <h5>
            <?php
            echo "that bai";
            ?>
          </h5>
      <?php  }
      }
      ?>

      <form class="mb-3" action="index.php?controller=auth&action=signIn" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email </label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email " />
        </div>
        <div class="mb-3 form-password-toggle">
          <label class="form-label" for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" />
        </div>
        <!-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div> -->
          <button name="login" type="submit" class="btn btn-primary d-grid w-100">Sign in</button>

      </form>
      <p class="text-center">
        <span>New on our platform?</span>
        <a href="register.php">
          <span>Create an account</span>
        </a>
      </p>
    </div>
  </div>
</div>