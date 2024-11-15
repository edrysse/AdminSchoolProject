<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التسجيل</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: right; /* Align text to the right for Arabic language */
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #495057;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input:focus {
            border-color: #80bdff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>إنشاء حساب جديد</h1>

        <!-- نموذج التسجيل -->
        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" required placeholder="أدخل اسمك" aria-describedby="nameHelp">

            <label for="email">البريد الإلكتروني:</label>
            <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني" aria-describedby="emailHelp">

            <label for="password">كلمة المرور:</label>
            <input type="password" id="password" name="password" required placeholder="أدخل كلمة المرور" aria-describedby="passwordHelp">

            <label for="password_confirmation">تأكيد كلمة المرور:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="أعد إدخال كلمة المرور" aria-describedby="passwordConfirmationHelp">

            <button type="submit">تسجيل</button>
        </form>

        <!-- عرض الأخطاء إن وجدت -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="footer">
            <p>هل لديك حساب؟ <a href="{{ url('/login') }}">تسجيل الدخول</a></p>
        </div>
    </div>
</body>
</html>
