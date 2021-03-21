<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Volunteer::class, 'volunteer');
    }

    public function index(){
        return view('volunteers.index', ['volunteers' => Volunteer::paginate(10)]);
    }

    public function create()
    {    
        //
    }

    public function store(Request $request)
    {
       //
    }

    public function show(Volunteer $volunteer){
        return view('volunteers.show', ['volunteer' => $volunteer]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
