<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EHE | Admin</title>

    <!-- Bootstrap -->
    <link href="/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/assets/admin/css/custom.min.css" rel="stylesheet">
  <meta name="robots" content="noindex, follow">
</head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          @yield('content')
        </div>
      </div>
    </div>

    <script src="/assets/admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/assets/admin/js/captcha.js"></script>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
