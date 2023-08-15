<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Models\Complain;

class TechnicianController extends Controller
{
    
    public function complaint(){
        $complaints = Complain::where('status', '>', '0')->where('technician_id', auth()->user()->id)->get();
        return view ('technician.complaint', compact('complaints'));
    }

    public function completed(Request $request){
        $validated=$request->validate([
            'id'=>'required',
        ]);

       
        
        $comp = Complain::find($request->id);
        $comp->status = 2;
        $comp->save();
        
        return redirect()->route('technician.complaint')->with('success', 'Task successfully completed.');
    }

    public function requested_deadline(Request $request){
        $validated=$request->validate([
            'id'=>'required',
            'requested_deadline'=>'required',
            'delay_description'=>'required',
        ]);

        
        $comp = Complain::find($request->id);
        $comp->requested_deadline = $request->requested_deadline;
        $comp->delay_description = $request->delay_description;

        $comp->save();
        
        return redirect()->route('technician.complaint')->with('success', 'Deadline successfully requested.');
    }
    
}
