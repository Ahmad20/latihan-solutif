<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function registerView(){
    //     return view('admin.register');
    // }

    // public function register(Request $request){
    //     $data = $request->except(['_token']);

    //     $validated = $request->validate([
    //         'username' => 'required|unique:admins',
    //         'password' => 'required',
    //     ]);

    //     $validated['password'] = bcrypt($validated['password']);

    //     $admin = Admin::create($validated);

    //     Auth::guard('admin')->login($admin);

    //     return redirect()->route('admin.dashboard');
    // }

    public function loginView(){
        return view('admin.login');
    }
    public function login(Request $request){

        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt($validated)){
             return redirect()->route('admin.dashboardMhs');
        }
        else {
            return redirect()->route('admin.login')->withErrors(['login'=>"Login Failed"]);
        }
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function dashboardMahasiswa(){
        $mhs = Mahasiswa::paginate(20);
        return view('admin.mhs.dashboard', ['data' => $mhs]);
    }

    public function dashboardMataKuliah(){
        $mk = MataKuliah::paginate(20);
        return view('admin.mk.dashboard', ['data' => $mk]);
    }

    public function printPDF($id){
        $mhs = Mahasiswa::findOrFail($id);
 
    	$pdf = PDF::loadview('admin.mhs.viewpdf',['data'=>$mhs]);

        // return $pdf->stream('profil_'. $mhs->name .'_download.pdf', array("Attachment" => 0));
    	return $pdf->download('profil_'. $mhs->name .'_download.pdf');
    }
    
}
