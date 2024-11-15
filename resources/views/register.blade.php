<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التسجيل</title>
</head>
<body>
    <h1>إنشاء حساب جديد</h1>

    <!-- نموذج التسجيل -->
    <form action="{{ url('/register') }}" method="POST">
        @csrf
        <label for="name">الاسم:</label>
        <input type="text" id="name" name="name" required placeholder="أدخل اسمك"><br><br>

        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني"><br><br>

        <label for="password">كلمة المرور:</label>
        <input type="password" id="password" name="password" required placeholder="أدخل كلمة المرور"><br><br>

        <label for="password_confirmation">تأكيد كلمة المرور:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="أعد إدخال كلمة المرور"><br><br>

        <button type="submit">تسجيل</button>
    </form>

    <!-- عرض الأخطاء إن وجدت -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
