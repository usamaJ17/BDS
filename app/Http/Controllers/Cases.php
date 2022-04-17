<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allcase;
use Carbon\Carbon;

class Cases extends Controller
{
    public function index()
    {
        return view('case-reg');
    }
    public function submit_case(Request $req)
    {
        $req->validate([
            'patient_blood' => 'required',
            'location' => 'required',
            'attendent_contact' => 'required|min:11|max:11|nullable',
            'donner_id' => 'nullable|exists:donner,donner_id'
        ]); 
        $case=new Allcase();
        $case->patient_name = $req->patient_name;
        $case->patient_blood = $req->patient_blood;
        $case->location = $req->location;
        $case->age = $req->age;
        $case->attendent_name = $req->attendent_name;
        $case->attendent_contact = $req->attendent_contact;
        $case->attendent_blood = $req->attendent_blood;
        $case->arranged_by = $req->arranged_by;
        $case->donner_id = $req->donner_id;
        $case->save();
        return view('case-reg');
        
    }
    public function all_cases()
    {
        $case=Allcase::with('donner')->get();        
        $array = json_encode($case);
        $data=compact('array');
        return view('case-all')->with($data);
        p($case->all());
    }
}
