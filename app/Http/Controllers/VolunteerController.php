<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\VolunteerConfirmation;
use App\Http\Requests\VolunteerRequest;
use Illuminate\Http\Request;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    public function index(){
        return view('volunteers.index', ['volunteers' => Volunteer::paginate(10)]);
    }

    public function create()
    {
        return view('volunteers.create');
    }

    public function store(VolunteerRequest $request)
    {
        $volunteer = new Volunteer;
        $volunteer->create($request->all());
        
        Mail::to(request('email'))
            ->send(new VolunteerConfirmation($request->first_name));

        return redirect()->back()->withSuccess('Inscripto como voluntario exitosamente');
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

    public function destroy(Volunteer $volunteer){
        $volunteer->delete();
        return redirect()->back();
    }

}
