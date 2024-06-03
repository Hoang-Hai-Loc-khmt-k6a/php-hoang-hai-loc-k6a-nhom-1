<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Radius - Signin/Signup</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/css/login.css">
    <style>
        .alert {
            padding: 0px 12px 0px 12px;
            margin: 15px;
            border: 1px solid transparent;
            border-radius: 10px;
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ 'signin' }}" method="POST" enctype="multipart/form-data">
            <input class="hidden" name="_token" value="{{ csrf_token() }}" style="display: none;"/>
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="fullname" autocomplete="off"/>
                <input type="email" placeholder="Email" name="email" autocomplete="off"/>
                <input type="password" placeholder="Password" name="password" autocomplete="new-password"/>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ 'login' }}" method="POST" >
            <input class="hidden" name="_token" value="{{ csrf_token() }}" style="display: none;"/>
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                @if (session('accout'))
                    <div class="alert alert-warning">
                        <h5>{{session('accout')}}</h5>
                    </div>
                @endif
                @if (session('createAccout'))
                    <div class="alert alert-success">
                        {{ session('createAccout') }}
                    </div>
                @endif
                @if (session('signin'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <input type="email" placeholder="Email" name="email" id="email" autocomplete="off" value="{{ old('email') }}"/>
                <input type="password" placeholder="Password" name="password" id="password" autocomplete="new-password" value="{{ old('password') }}"/>
                <a href="#">Forgot your password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/resources/js/main.js"></script>
</body>

</html>