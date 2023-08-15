<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Service;


class ServiceController extends Controller
{
    public function index(Request $request){

        $services = Service::get();

        return view('admin.service.index', compact('services'));
    }
    public function create(Request $request){
        $categories= Category::get();
        return view('admin.service.create', compact('categories'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
    
        ]);
        
        Service::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
               
        ]);

        return redirect()->route('admin.service.create')->with('success', 'Successfully add service');
    }

    public function edit($id){
        $services = Service::find($id);
        $categories= Category::get();
        return view('admin.service.edit', compact('services', 'categories'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            
        ]);

        $services = Service::find($id);

        $services->name = $request->name;
        $services->category = $request->category;
        $services->description = $request->description;
        $services->price = $request->price;

       


        $services->save();
    
        return redirect()->route('admin.service.index')->with('success', 'Successfully update service.');
    }

    
    public function delete($id){
        $services = Movie::find($id);

        $services->delete();

        return redirect()->route('admin.service.index');
    }

    public function service(){
        $service = Service::get();
        return view('frontend.service', compact('service'));
    }

    

}
