<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::all();
        return view('Contacts.index', compact('contact'));
    }
    public function create(){
        $contact = Contact::all();
        return view('Contacts.create',compact('contact'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'phone'=> 'required',
            'email' => 'email|required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // $fileName = time() . '.' . $request->image->extension();
        // $request->image->storeAs('public/images', $fileName);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->image = $imageName;
        $contact->save();
        return redirect()->action([ContactController::class,'index']);
    }

    public function edit($id){
        $contact = Contact::FindOrFail($id);
        return view('Contacts.edit',compact('contact'));
    }

    public function update(Request $request, $id){
        $contact = Contact::FindOrFail($id);
       
            unlink(public_path('images/' . $request->oldimage));
            $imageName = time(). '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $contact->image = $imageName;
        
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->save();
        return redirect()->action([ContactController::class,'index']);
    }
}
