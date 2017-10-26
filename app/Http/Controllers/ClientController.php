<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title as Title;

class ClientController extends Controller
{
    function __construct(Title $title){
        $this->titles = $title->getAll();

    }

    public function index(){
        $data = [];
        $obj = new \stdClass;
        $obj->id = '1';
        $obj->title = "Mr";
        $obj->first_name = "John";
        $obj->last_name = "Woe";
        $obj->email = "john@domain.com";

        $data['clients'][] = $obj;

        $obj = new \stdClass;
        $obj->id = '2';
        $obj-> title = "Ms";
        $obj -> first_name = "Lisa";
        $obj->last_name = "Morales";
        $obj-> email = "lisa@domain.com";

        $data['clients'][] = $obj;

        return view('clients/index',$data);
    }

    public function create(){
        return __METHOD__;
    }

    public function newClient(Request $request){
        $data = [];
        $data['titles'] = $this->titles;
        $data['modify'] = 0;
        $data['client_info']= $request->input('form');

        
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required|min:5',
                'last_name'=>'required',
                'email'=>'required',
            ]);

            dd($data);
            return redirect('clients');
        }
        
        return view('clients/form',$data);
    }

    public function modify(){
        return __METHOD__;
    }

    public function show(){
        $data = [];
        $data['titles'] = $this->titles;
        $data['modify'] = 1;
        return view('clients/form',$data);
    }


    // public function di(){
    //     dd($this->title);
    // }
}
