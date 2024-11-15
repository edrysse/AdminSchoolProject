<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    // دالة لتسجيل الدخول
    public function login(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'email' => 'required|email', // التحقق من صحة البريد الإلكتروني
            'password' => 'required', // التحقق من وجود كلمة المرور
        ]);

        // تصفية البريد الإلكتروني لإزالة المسافات الزائدة
        $email = trim($request->email);

        // التحقق من وجود المستخدم وتطابق كلمة المرور
        if (Auth::attempt(['email' => $email, 'password' => $request->password])) {
            // إعادة التوجيه إلى لوحة التحكم إذا تم التحقق بنجاح
            return redirect()->route('dashboard');
        }

        // في حال فشل التحقق من البيانات، عرض رسالة خطأ
        return redirect()->back()->withErrors(['message' => 'dsl wlkn maa3rftch 3lach ma3tawkch lacces tdkhl ldsashboard.']);
    }



    // دالة لعرض نموذج تسجيل الدخول
    public function showLoginForm()
    {
        return view('login'); // عرض صفحة تسجيل الدخول
    }

    // دالة لتسجيل الخروج
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout successful']);
    }

    // دالة لعرض نموذج التسجيل
    public function showRegisterForm()
    {
        return view('register'); // عرض صفحة التسجيل
    }

    // دالة للتسجيل
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8|confirmed', // التأكد من تطابق كلمة المرور
        ]);

        // إنشاء حساب جديد
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // إنشاء توكن للمستخدم بعد تسجيله
        $token = $admin->createToken('AdminToken')->plainTextToken;

        // توجيه المستخدم إلى صفحة تسجيل الدخول بعد التسجيل
        return redirect()->route('login')->with('message', 'sf lacc rah tsawb fdb dir login db wchof wach aykhliwk tmchi lldashboard');
    }
}
