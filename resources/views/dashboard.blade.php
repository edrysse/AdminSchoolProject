<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>الداشبورد</title>
</head>
<body>
    <h1>مرحباً، {{ auth()->user()->name }}!</h1>

    @if(isset($school))
        <h2>بيانات مدرستك:</h2>
        <p>اسم المدرسة: {{ $school->name }}</p>
        <p>الشعار: <img src="{{ asset('storage/' . $school->logo) }}" alt="School Logo"></p>
    @else
        <p>لم يتم العثور على بيانات المدرسة.</p>
    @endif
</body>
</html>
