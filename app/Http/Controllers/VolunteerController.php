<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteerRequest;
use App\Mail\VolunteerConfirmation;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Volunteer::class, 'volunteer');
    }

    public function index()
    {
        return view('website.volunteers.index', ['volunteers' => Volunteer::paginate(10)]);
    }

    public function create()
    {
        return view('website.volunteers.create');
    }

    public function store(VolunteerRequest $request)
    {
        $volunteer = Volunteer::create($request->all());

        Mail::send(new VolunteerConfirmation($volunteer));

        return redirect()->back()->withSuccess('Inscripto como voluntario exitosamente');
    }

    public function show(Volunteer $volunteer)
    {
        return view('website.volunteers.show', ['volunteer' => $volunteer]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Volunteer $volunteer)
    {
        // $volunteer->delete();
        // return redirect()->back();
    }
}
