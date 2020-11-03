<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index(){
        $tests = Http::get('https://people.zoho.com/people/api/forms/P_EmployeeView/records?authtoken=7aad97ffbaf5f730d05543b5b50a544c')
            ->json();

        // return($test);
        return view('people', ['tests'=>$tests]);
    }
}
