<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .success-message {
            color: green;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }
        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>تسجيل الدخول</h1>

        <!-- نموذج تسجيل الدخول -->
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني" aria-describedby="emailHelp">

            <label for="password">كلمة المرور:</label>
            <input type="password" id="password" name="password" required placeholder="أدخل كلمة المرور" aria-describedby="passwordHelp">

            <button type="submit">تسجيل الدخول</button>
        </form>

        <!-- في حال وجود رسالة خطأ -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <div class="success-message">{{ session('message') }}</div>
        @endif

        <div class="forgot-password">
            <a href="{{ url('/password/reset') }}">نسيت كلمة المرور؟</a>
        </div>
    </div>
</body>
</html>
