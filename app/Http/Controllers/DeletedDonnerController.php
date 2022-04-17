<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donner;

class DeletedDonnerController extends Controller
{
   public function trash()
   {
       $donners=Donner::onlyTrashed()->get();
       $array=json_encode($donners);
       $data=compact('array');
       return view('trash')->with($data);
   }
   public function restore_donner(Request $req)
   {
       $donner=Donner::withTrashed()->find($req['id']);
       if(!is_null($donner)){
           $donner->restore();
       }
       return redirect('trash');
   }
   public function delete_donner(Request $req)
   {
    $donner=Donner::withTrashed()->find($req['id']);
    if(!is_null($donner)){
        $donner->forceDelete();
    }
    return redirect('trash');
   }
}
