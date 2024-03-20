<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}


    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        
        *{
            box-sizing: border-box;
        }
        body {
            align-items: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
            background: #f6f5f7;
            font-family: 'poppins', sans-serif;
            min-height: 100%;
            margin: 10%;
        }
        .container {
            position: relative;
            width: 768px;
            max-width: 100%;
            min-height: 680px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                        0 10px 10px rgba(0, 0, 0, 0.22)
        }
        .sign-up, .sign-in {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }
        .sign-up {
            width: 50%;
            opacity: 0;
            z-index: 1;
        }
        .sign-in {
            width: 50%;
            z-index: 2;
        }
        form {
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }
        h1 {
            font-weight: bold;
            margin: 0;
        }
        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 15px 0 20px;
        }
        input {
            background: #eee;
            padding: 12px 15px;
            margin: 8px 15px;
            width: 100%;
            border-radius: 5px;
            border: none;
            outline: none;
        }
        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0
        }
        button {
            color: #fff;
            background: #ff4b2b;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 55px;
            margin: 20px;
            border-radius: 20px;
            border: 1px solid #ff4b2b;
            outline: none;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            cursor: pointer;
        }
        button:active {
            transform: scale(0.90)
        }
        #signIn,#signUp {
            background-color: transparent;
            border: 2px solid #fff;
        }
        .container.right-panel-active .sign-in {
            transform: translateX(100%)
        }
        .container.right-panel-active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }
        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }
        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }
        .overlay {
            position: absolute;
            color: #fff;
            background: #ff416c;
            left: -100%;
            height: 100%;
            width: 200%;
            background: linear-gradient(to right, #B75800, #B75800);
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }
        .container.right-panel-active .overlay {
            transform:  translateX(50%);
        }
        .overlay-left, .overlay-right {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }
        .overlay-left {
            transform: translateX(-20%);
            margin-left: 75px
        }
        .overlay-right {
            right: 0;
            transform: translateX(0);
        }
        .container-right-panel-active .overlay-left {
            transform: translateX(0)
        }
        .container-right-panel-active .overlay-right {
            transform: translateX(20%)
        }
    </style>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body class="antialiased">
    <div class="container" id="main">
        <div class="sign-up">
            <form action="{{ route('register') }}" method="POST" autocomplete="off">
                @csrf
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                </div>
                <p>Use your email for registration</p>
                <input type="text" name="fname" placeholder="First Name">
                @error('fname')
                    <h1 style="font-size: 10px; color: rgb(239 68 68);">{{ $message }}</h1>
                @enderror
                <input type="text" name="lname" placeholder="Last Name">
                @error('lname')
                    <h1 style="font-size: 10px; color: rgb(239 68 68);">{{ $message }}</h1>
                @enderror
                <input type="text" name="uname" placeholder="Username">
                <input type="email" name="email" placeholder="Email" autocomplete="off">
                @error('email')
                    <h1 style="font-size: 10px; color: rgb(239 68 68);">{{ $message }}</h1>
                @enderror
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <h1 style="font-size: 10px; color: rgb(239 68 68);">{{ $message }}</h1>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
                    <h1 style="font-size: 10px; color: rgb(239 68 68);">{{ $message }}</h1>
                @enderror
                <a href="#">Forgot your password?</a>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="sign-in">
            <form action="/login" method="POST" autocomplete="off">
                @csrf
                <h1>Sign In</h1>
                <div class="social-container">
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                </div>
                <p>or Use your account</p>
                <input type="email" name="email" placeholder="Email" >
                @error('email')
                    <h1 style="font-size: 10px; color: rgb(239 68 68);">{{ $message }}</h1>
                @enderror
                <input type="password" name="password" placeholder="Password" id="loginPassword" >
                @error('password')
                    <h1 style="font-size: 10px; color: rgb(239 68 68);">{{ $message }}</h1>
                @enderror
                <a href="#">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button id="signIn">Sign In</button>
                </div>
                <div class="overlay-right">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp')
        const signInButton = document.getElementById('signIn')
        const main = document.getElementById('main')
        const loginPassword = document.getElementById('loginPassword')
        

        signUpButton.addEventListener('click', () => {
            main.classList.add("right-panel-active")
        })
        signInButton.addEventListener('click', () => {
            main.classList.remove('right-panel-active')
        })
    </script>
</body>

</html>
