<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class DashboardController extends Controller
{
    public function index()
    {
        // الحصول على المستخدم الحالي
        $admin = auth()->user();

        // الحصول على المدرسة المرتبطة بالمستخدم (الـ admin)
        $school = School::where('admin_id', $admin->id)->first();

        // التحقق إذا كانت المدرسة موجودة
        if ($school) {
            return view('dashboard', compact('school')); // عرض الداشبورد مع بيانات المدرسة
        }

        // إذا لم يتم العثور على المدرسة
        return view('dashboard')->with('message', 'No school data found.');
    }
    public function __construct()
{
    $this->middleware('auth:sanctum');
}

}
