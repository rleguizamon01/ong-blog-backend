<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index(){
        $volunteers = Volunteer::get()->paginate(10);

        return view('volunteers.index', compact('volunteers'));
    }

    public function show(Volunteer $volunteer){
        return view('volunteers.show', compact('volunteer'));
    }
}
