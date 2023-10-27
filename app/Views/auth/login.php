<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WSW Blog - <?php isset($title) ? print($title) : '' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->

    <style>
        .login-clean {
            background: #f1f7fc;
            padding: 80px 0;
        }

        .login-clean form {
            max-width: 320px;
            width: 90%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 4px;
            color: #505e6c;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        }

        .login-clean .illustration {
            text-align: center;
            padding: 0 0 20px;
            font-size: 100px;
            color: rgb(244, 71, 107);
        }

        .login-clean form .form-control {
            background: #f7f9fc;
            border: none;
            border-bottom: 1px solid #dfe7f1;
            border-radius: 0;
            box-shadow: none;
            outline: none;
            color: inherit;
            text-indent: 8px;
            height: 42px;
        }

        .login-clean form .btn-primary {
            background: #5579ee;
            border: none;
            border-radius: 4px;
            padding: 11px;
            box-shadow: none;
            margin-top: 26px;
            text-shadow: none;
            outline: none !important;
        }

        .login-clean form .btn-primary:hover,
        .login-clean form .btn-primary:active {
            /* primary color hover */
            background: #7493f7;
        }

        .login-clean form .btn-primary:active {
            transform: translateY(1px);
        }

        .login-clean form .forgot {
            display: block;
            text-align: center;
            font-size: 12px;
            color: #6f7a85;
            opacity: 0.9;
            text-decoration: none;
        }

        .login-clean form .forgot:hover,
        .login-clean form .forgot:active {
            opacity: 1;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= session()->getFlashdata('error') ?>',
            })
        </script>
    <?php endif; ?>
    <script>
        function onSubmit(token) {
            document.getElementById("login-form").submit();
        }
    </script>
    <div class="login-clean">
        <form action="<?= base_url('auth/login') ?>" method="post" id="login-form">
            <h2 class="sr-only">Login Form</h2>
            <h1 class="text-center">Login</h1>
            <br>
            <!-- <div class="illustration"><i class="icon ion-ios-navigate"></i></div> -->
            <div class="form-group">
                <!-- <label for="email">Email</label> -->
                <input class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" value="<?= old('username') ?>" id="username" name="username" placeholder="username" autofocus>
                <div class="invalid-feedback">
                    <?= validation_show_error('username') ?>
                </div>
            </div>
            <div class="form-group">
                <!-- <label for="password">Password</label> -->
                <input class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" value="<?= old('password') ?>" type="password" id="password" name="password" placeholder="Password">
                <div class="invalid-feedback">
                    <?= validation_show_error('password') ?>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block g-recaptcha" data-sitekey="<?= getenv('CAPTCHA_SITE_KEY') ?>" data-callback='onSubmit' data-action='submit' type="submit">Log In</button>
            </div>
            <a href="#" class="forgot">Forgot your email or password?</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>


</html>