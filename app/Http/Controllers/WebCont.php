<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Donner;
use App\Models\Allcase;
use Carbon\Carbon;

class WebCont extends Controller
{
    public function index()
    {
        $admin_error_pass = "";
        $admin_error_name = "";
        $show_admin_mondal = 0;
        $data = compact('admin_error_pass', 'show_admin_mondal', 'admin_error_name');
        return view('home')->with($data);
    }
    public function login(Request $req)
    {

        $name = ucfirst($req['name']) ?? "";
        $pass = md5($req['password']);
        if ($name != "") {
            if (Admin::where('name', '=', $name)->exists()) {
                $data = Admin::where('name', '=', $name)->first();
                if ($pass == $data->password) {
                    $session_data = [
                        'name' => $name,
                        'password' => $pass,
                        'role' => 'admin',
                        'logged_in' => true
                    ];
                    session()->put($session_data);
                    return redirect('/dashboard');
                } else {
                    $admin_error_pass = "Password Wrong";
                    $admin_error_name = "";
                    $show_admin_mondal = 1;
                    $data = compact('admin_error_pass', 'show_admin_mondal', 'admin_error_name');
                    return view('home')->with($data);
                }
            } else {
                $admin_error_name = "username not exist";
                $admin_error_pass = "";
                $show_admin_mondal = 1;
                $data = compact('admin_error_name', 'show_admin_mondal', 'admin_error_pass');
                return view('home')->with($data);
            }
        }
    }
    public function dashboard()
    {
        return view('admin-dashboard');
    }
    public function get_donner(Request $req)
    {
        $from = date('Y-m-d');
        $to = date('Y-m-d', strtotime("-3 months", strtotime($from)));
        $group = $req['group'];
        if (isset($req['eligible']) && $req['eligible'] == 'on') {
            $donners = Donner::where([['date', '<', $to], ['group', '=', $group]])->get();
        } else {
            $donners = Donner::where('group', '=', $group)->get();
        }
        $array = json_encode($donners);
        $data = compact('group', 'array');
        return view('search_donner')->with($data);
    }
    public function report()
    {   $start = Carbon::now()->startOfMonth();
        $end=Carbon::now()->startOfMonth()->addDays(3);
        $totalCaseMonth=array();
        $totalSolvedMonth=array();
        $totalDonnerMonth=array();
        $case=Allcase::where('created_at','<',$start)->count();
        $arng=Allcase::where('created_at','<',$start)->where('arranged_by', '=', 'BDS')->count();
        $doner=Donner::where('created_at','<',$start)->count();
        array_push($totalCaseMonth,$case);
        array_push($totalSolvedMonth,$arng);
        array_push($totalDonnerMonth,$doner);            
        for ($i=0; $i <10; $i++) { 
            $case=Allcase::whereBetween('created_at',[$start,$end])->count();
            $arng=Allcase::whereBetween('created_at',[$start,$end])->where('arranged_by', '=', 'BDS')->count();
            $doner=Donner::where('created_at','<',$end)->count();
            array_push($totalCaseMonth,$case);
            array_push($totalSolvedMonth,$arng);
            array_push($totalDonnerMonth,$doner);
            $start->addDays(3);
            $end->addDays(3);
        }
        
        $totalCase = Allcase::count();
        $totalDonner = Donner::count();
        $solvedCase = Allcase::where('arranged_by', '=', 'BDS')->count();
        $percent = ($solvedCase / $totalCase) * 100;
        $percent= number_format((float)$percent, 2, '.', '');
        $data = compact('totalCase', 'totalDonner', 'solvedCase', 'percent','totalCaseMonth','totalSolvedMonth','totalDonnerMonth');
        return view('report')->with($data);
    }
    public function logout()
    {
        session()->flush();
        return view('messages.logout');
    }
}
