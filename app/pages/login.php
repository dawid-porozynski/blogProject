<?php 

  if(!empty($_POST))
  {
    //validate
    $errors = [];

    $query = "select * from users where email = :email limit 1";
    $row = query($query, ['email'=>$_POST['email']]);

    if($row)
    {
      $data = [];
      if(password_verify($_POST['password'], $row[0]['password']))
      {
        //grant access
        //authenticate($row[0]);
        redirect('admin');

      }else{
        $errors['email'] = "wrong email or password";
      }

    }else{
      $errors['email'] = "wrong email or password";
    }
  }
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="<?=ROOT?>/../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Login - Blog</title>


    
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?=ROOT?>/assets/css/sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
  
<main class="form-signin w-100 m-auto">
  <form method="post">
    <a href="home">
    <img class="mb-4 rounded-circle shadow" src="<?=ROOT?>/assets/images/logo.jpg" alt="" width="100" height="80" style="object-fit: cover;">

    </a>
    <h1 class="h3 mb-3 fw-normal " >Zaloguj się</h1>

    <?php if (!empty($errors['email'])):?>
        <div class="alert alert-danger"><?=$errors['email']?></div>
      <?php endif;?>

    <div class="form-floating">
      <input name="email" value="<?=oldValue('email')?>"type="email" class="form-control mb-2" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email </label>
    </div>
    <div class="form-floating">
      <input name="password"value="<?=oldValue('password')?>"type="password" class="form-control mb-2" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Hasło</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label name="remember" class="form-check-label" for="flexCheckDefault">
        Zapamiętaj
      </label>
    </div>
    <div class="my-2"><a href="<?=ROOT?>/signup">Załóż konto</div>
    
    <button class="btn btn-primary w-100 py-2" name="login" type="submit">Zaloguj</button>

  </form>
</main>
<script src="<?=ROOT?>/../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
