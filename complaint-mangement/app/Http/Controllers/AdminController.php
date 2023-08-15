<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Complain;
use App\Models\Technician;

class AdminController extends Controller
{
    public function profile(Request $request) {
        return view ('admin.profile');
    }

    public function technician_list(Request $request){
        $search= $request['search']??"";
        if($search !=""){
            $technicians= User::where('role', '3')->where('name','LIKE',"%$search%")->get();
        }
        else{
        $technicians = User::where('role', '3')->get();
        }
        return view ('admin.technician.index', compact('technicians', 'search'));
    }
    public function user_list(Request $request){
        $search= $request['search']??"";
        if($search !=""){
            $users= User::where('role', '2')->where('name','LIKE',"%$search%")->get();
        }
        else
        {$users = User::where('role', '2')->get();}
        
        return view ('admin.user.index', compact('users','search'));
    }
    
        public function contact(){
        $contacts = contact::get();
         return view('admin.contact',compact('contacts'));
     }
    public function contact_msg(Request $request){
        $validated=$request->validate([
        'name'=>'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' =>'required',
        ]);
  
        contact::create([
            'name'=> $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
  
        return redirect()->route('contact')->with('success', 'Message send successfully.');
    }

    
    public function complaint(){
        $complaints = Complain::get();
        $technicians = User::where('role', '3')->get();
        return view ('admin.complaint', compact('complaints', 'technicians'));
    }

    public function assign(Request $request){
        $validated=$request->validate([
            'id'=>'required',
            'technician_id'=>'required',
            'deadline'=>'required',
        ]);

       

        $technician_name = User::find($request->technician_id)->name;
        
        $comp = Complain::find($request->id);
        $comp->status = 1;
        $comp->technician_id = $request->technician_id;
        $comp->technician_name = $technician_name;
        $comp->deadline = $request->deadline;

        $comp->save();
        
        return redirect()->route('admin.complaint')->with('success', 'Assigned successfully.');
    }

    public function technician_delete($id){
        $user = User::find($id);

        $user->delete();

        return redirect()->route('admin.technician.list')->with('success', 'Technician deleted.');
    }
   public function inreport(Request $request){
       $complaints = Complain::where('status', 2)->get();
       return view('admin.report.inreport', compact('complaints'));
    }

    public function invoice(){

        $invoice= Complain::get();
        return view ('admin.invoice', compact('invoice')); 
}
}

