<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function insertAdmin(Request $request)
    {
        $admin = new Admin();
        $admin->username = $request->input("username");
        $admin->password = $request->input("password");
        $admin->save();
    }

    public function getAdmin(Request $request)
    {
        $admin = Admin::find($request->session()->get('token'));
        return view('admin.admin_admin', ['admin' => $admin]);
    }
    
    public function loginAdmin(Request $request)
    {
        $admin = Admin::where('username', $request->input("username"))->first();

        if (Hash::check($request->input('password'), $admin->password)) {
            $request->session()->put('token', $admin->id);
            return redirect('/admin/dashboard');
        } else {
            return redirect('/admin/loginView');
        }
    }

    public function dashboardAdmin(Request $request)
    {
        $admin = Admin::find($request->session()->get('token'));
        // $totalDinein = DineinTransaction::count();
        // $totalReservation = ReservationTransaction::count();
        // $totalProduct = Product::count();
        // $totalSeat = Seat::count();
        // $tanggalRekap = Carbon::now()->setTimezone('Asia/Phnom_Penh')->format('d-m-Y');
        return view('admin.dashboard_admin', ["admin" => $admin]);
    }

    public function logoutAdmin(Request $request)
    {
        $request->session()->forget('token');
        return redirect('/admin/loginView');
    }

    public function getView(Request $request)
    {
        
        $admin = Admin::find($request->session()->get('token'));
        return view('admin.admin_admin', ['admin' => $admin]);
    }
}
