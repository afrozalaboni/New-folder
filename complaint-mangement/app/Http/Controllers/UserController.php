<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Complain;
use App\Models\Admin;
use App\Models\User;
use App\Models\Service;

class UserController extends Controller
{
    public function index(Request $request){

        $complains = Complain::where('user_id', auth()->user()->id)->get();

        return view('user.complain.index', compact('complains'));
    }

    public function create(Request $request){
        $categories = Category::get();
        return view('user.complain.create', compact('categories'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
           
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['user_name'] = auth()->user()->name;

        Complain::create($validated);

        return redirect()->route('user.complain.create')->with('success', 'Your complaint has been submitted.');
    }

    public function review_create($id){
        return view('user.complain.review', compact('id'));
    }

    public function review_post(Request $request){
        $validated = $request->validate([
            'id' => 'required',
            'feedback' => 'required',
            
        ]);

        $comp = Complain::find($request->id);
        $comp->feedback = $request->feedback;
        $comp->save();
        
        return redirect()->route('user.complain.index')->with('success', 'Reviewed successfully.');
    }

    public function payment_create($id){
        return view('user.complain.payment', compact('id'));
    }

    public function Payment_post(Request $request){
        $validated = $request->validate([
            'id' => 'required',
            'method' => 'required',
            'tnx_id' => 'required',
            'amount' => 'required',
        ]);

        $comp = Complain::find($request->id);
        $comp->method = $request->method;
        $comp->tnx_id = $request->tnx_id;
        $comp->amount = $request->amount;
        $comp->payment_status = 1;
        $comp->save();
        
        return redirect()->route('user.complain.index')->with('success', 'Payment successfull.');
    }
    public function invoice($id){

        $invoice= Complain::find($id);
        return view ('user.invoice', compact('invoice')); 
}
    
}
