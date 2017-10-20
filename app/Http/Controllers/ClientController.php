<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title as Title;

class ClientController extends Controller
{
    public function __construct(Title $title)
    {
        $this->title = $title->getAll();
    }

    public function di(){
        dd($this->title);
    }

}
