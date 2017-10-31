<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title as Title;
use App\Client as Client;

class ClientController extends Controller
{
    function __construct(Title $title, Client $client){
        $this->titles = $title->getAll();
        $this->client = $client;
    }

    public function index(){
        $data = [];
        $data['clients'] = $this->client->all(); 
        return view('clients/index',$data);
    }

    public function newClient(Request $request){
        $client = $this->client;
        $data = [];
        $data['title']= $request->input('title');
        $data['name'] = $request->input('first_name');
        $data['last_name'] = $request ->input('last_name');
        $data['email'] = $request -> input('email');
        $data['address'] = $request ->input('address');
        $data['city']=$request->input('city');
        $data['state'] = $request->input('state');
        $data['zip_code'] =$request->input('zip_code');
        if($request->isMethod('post')){
            $this->validate($request,[
                'first_name'=>'required|min:5',
                'last_name'=>'required',
                'email'=>'required',
                'address' => 'required',
                'city'=>'required',
                'state'=>'required',
                'zip_code'=>'required'
            ]);
        
            $client->insert($data);

            return redirect('clients');
        }
        $data['titles'] = $this->titles;
        $data['modify'] = 0;
        return view('clients/form',$data);
    }

    public function modify(Request $request, $client_id){

        if($request->isMethod('post'))
        {
              $this->validate($request,[
                'first_name'=>'required|min:5',
                'last_name'=>'required',
                'email'=>'required',
                'address' => 'required',
                'city'=>'required',
                'state'=>'required',
                'zip_code'=>'required'
            ]);

            $client_data = $this->client->find($client_id);

            $client_data->title = $request->input('title');
            $client_data->name = $request->input('first_name');
            $client_data->last_name = $request->input('last_name');
            $client_data->email= $request->input('email');
            $client_data->address= $request->input('address');
            $client_data->city = $request->input('city');
            $client_data->zip_code = $request->input('zip_code');
            $client_data->state = $request->input('state');

            $client_data->save();
        }
        return redirect('clients');
    }

    public function show($client_id){
        $data = [];
        $data['titles'] = $this->titles;
        $data['modify'] = 1;
        $data['client_id'] = $client_id;

        $client_data = $this->client->find($client_id);
        
        $data['name'] = $client_data->name;
        $data['last_name'] = $client_data->last_name;
        $data['address'] = $client_data->address;
        $data['email'] = $client_data->email;
        $data['city'] = $client_data ->city;
        $data['state'] = $client_data ->state;
        $data['zip_code'] = $client_data->zip_code;

        return view('clients/form',$data);
    }


    // public function di(){
    //     dd($this->title);
    // }
}
