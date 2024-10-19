<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Erdélyi Hagyományokért Egyesület</title>

    <!-- Bootstrap -->
    <link href="/assets/admin/vendors/bootstrap/css/bootstrap.min.css?v={{ env("APP_VER") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/admin/vendors/font-awesome/css/font-awesome.min.css?v={{ env("APP_VER") }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="/assets/admin/vendors/nprogress/nprogress.css?v={{ env("APP_VER") }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/assets/admin/vendors/animate.css/animate.min.css?v={{ env("APP_VER") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/assets/admin/css/custom.css?v={{ env("APP_VER") }}" rel="stylesheet">
    <!-- JQuery smartWizard -->
    <link href="/assets/admin/css/smart_wizard_all.min.css?v={{ env("APP_VER") }}" rel="stylesheet">
    <!-- DateRange picker -->
    <link href="/assets/admin/css/daterangepicker.css?v={{ env("APP_VER") }}" rel="stylesheet">
    <!-- main -->
    <link href="/assets/admin/css/main.css?v={{ env("APP_VER") }}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="{{ Request::is("/") || Request::is("login") ? "login_wrapper" : "container" }}">
            <div class="animate form login_form">
                <section class="login_content mb-5">
                    @yield('content')
                </section>
            </div>
        </div>
    </div>
</body>

<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- jQuery Smart Wizard -->
<script src="/assets/admin/js/jquery.smartWizard.min.js?v={{ env("APP_VER") }}"></script>
<!-- DateRangePicker -->
<script src="/assets/admin/js/moment.min.js?v={{ env("APP_VER") }}"></script>
<script src="/assets/admin/js/daterangepicker.js?v={{ env("APP_VER") }}"></script>
<!-- main.js -->
<script type="text/javascript" src="/assets/admin/js/main.js?v={{ env("APP_VER") }}"></script>
<!-- Google Recaptcha -->
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- inputmask -->
<script src="/assets/admin/js/inputmask/jquery.inputmask.bundle.min.js?v={{ env("APP_VER") }}"></script>
<!-- font awesome -->
<script src="https://kit.fontawesome.com/a00cdb7d90.js" crossorigin="anonymous"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>

@yield('scripts')

</html>