<!-- <html>
<style>
  body {
    background-color: #F3EBF6;
    font-family: 'Ubuntu', sans-serif;
  }

  .main {
    background-color: #FFFFFF;
    width: 400px;
    height: 400px;
    margin: 7em auto;
    border-radius: 1.5em;
    box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
  }

  .sign {
    padding-top: 40px;
    color: #8C55AA;
    font-family: 'Ubuntu', sans-serif;
    font-weight: bold;
    font-size: 23px;
  }

  .username {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
  }

  form.action {
    padding-top: 40px;
  }

  .password {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
  }


  .username:focus,
  .password:focus {
    border: 2px solid rgba(0, 0, 0, 0.18) !important;

  }

  .submit {
    cursor: pointer;
    border-radius: 5em;
    color: #fff;
    background: linear-gradient(to right, #9C27B0, #E040FB);
    border: 0;
    padding-left: 40px;
    padding-right: 40px;
    padding-bottom: 10px;
    padding-top: 10px;


    box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
  }

  button {
    cursor: pointer;
    border-radius: 5em;
    text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
    color: #5f046f;
    text-decoration: none;
    padding-left: 40px;
    padding-right: 40px;
    font-family: 'Ubuntu', sans-serif;
    margin-left: 35%;
    font-size: 13px;
    height: 10%;
  }

  @media (max-width: 600px) {
    .main {
      border-radius: 0px;
    }
  }
</style>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Welcome to Berdikari's</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Silahkan Login Sistem</p>
    <form action="<?= site_url('auth/process') ?>" method="post">
      <input class="username" name="username" class="form-control" type="text" align="center" placeholder="Username" required autofocus>
      <input class="password" name="password" type="password" align="center" class="form-control" placeholder="Password" required>
      <button type="submit" name="login" align="center">Sign in</button>
    </form>
  </div>

</body>

</html> -->
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/logo-bunda.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo-bunda.png">
  <title>
    Toko Bunda
  </title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">

  <link href="<?= base_url() ?>assets/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.min.css">

</head>

<div class="body"></div>
<div class="overlay">
  <div class="ui-panel login-panel animated bounceInDown">
    <header>
      <div class="left logo">
        <p>TOKO BUNDA LOGIN</p>
      </div>
    </header>

    <div class="login-form">
      <div class="subtitle">Login</div>
      <form action="<?= site_url('auth/process') ?>" method="post">
        <input class="username" name="username" class="form-control" type="text" align="center" placeholder="Username" required autofocus>
        <input class="password" name="password" type="password" align="center" class="form-control" placeholder="Password" required>
        <div>
          <button type="submit" name="login" align="center" class="btn bg-gradient-primary">Sign in</button>
        </div>
      </form>
    </div>
  </div>
</div>

</html>