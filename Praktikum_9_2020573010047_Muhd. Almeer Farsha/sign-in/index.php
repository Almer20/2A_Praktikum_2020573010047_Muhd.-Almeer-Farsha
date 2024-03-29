<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Login peminjaman barang jurusan TI </title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
  </style>
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <main class="form-signin">
    <form action="../proses/proses_signin.php" method="POST">
    <h1 class="h3 mb-3 fw-normal">SISTEM INFORMASI PEMINJAMAN BARANG TI</h1>
      <img class="mb-2" src="https://lh3.googleusercontent.com/proxy/CruHAzzwinJl5Y3E1tO0uRjz-tEZrHJnT9KRFEYCwdyGBKx16E1InYh4049BOaATctuONFsjycub8NUhOa50jISD3uF7nDmPl9bp202cxFLdtJLKE6aL4VVg" alt="" width="90" height="70">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="email" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button  class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </main>
</body>
</html>