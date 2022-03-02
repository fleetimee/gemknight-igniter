<!-- Extend template -->
<?= $this->extend("template_public") ?>  


<!-- Menu -->
<?= $this->section("menu") ?>  

        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= site_url(
              "publik"
            ) ?>">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url("publik/login") ?>">Login</a>
          </li>
        </ul>

<?= $this->endSection() ?>


<!-- Sign in -->
<?= $this->section("content") ?>

<form class="form-signin">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
</form>

<?= $this->endSection() ?>
