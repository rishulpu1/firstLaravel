<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleCOntroller extends Controller
{
    public function homePage(){
        $userName = "John";
        $allUsers = ["John", "Peter","Mary"];
        return view("homepage", ["allUsers" => $allUsers, "name" => $userName]);
    }
    public function aboutPage(){
        return "<h1>About Page</h1><a href='/'>Go to Home Page</a>";
    }
}
