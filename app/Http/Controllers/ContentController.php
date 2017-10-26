<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function Home(){
        $data = [];
        $data['version'] = '0.0.1';

        return view('contents/home',$data);
    }
}
