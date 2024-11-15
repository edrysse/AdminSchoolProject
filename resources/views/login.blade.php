<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
</head>
<body>
    <h1>تسجيل الدخول</h1>

    <!-- نموذج تسجيل الدخول -->
    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني"><br><br>

        <label for="password">كلمة المرور:</label>
        <input type="password" id="password" name="password" required placeholder="أدخل كلمة المرور"><br><br>

        <button type="submit">تسجيل الدخول</button>
    </form>


    <!-- في حال وجود رسالة خطأ -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('message'))
    <div>{{ session('message') }}</div>
@endif

</body>
</html>
