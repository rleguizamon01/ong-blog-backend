<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VolunteerRequest;
use App\Mail\VolunteerConfirmation;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Volunteer::class, 'volunteer');
    }

    public function index()
    {
        return view('admin.volunteers.index', [
            'volunteers' => Volunteer::orderBy('status', 'asc')->orderBy('reviewed_at', 'desc')->paginate(10),
            'estado' => 'all',
            'filter' => ''
        ]);
    }

    public function create()
    {
        // return view('admin.volunteers.create');
    }

    public function store(VolunteerRequest $request)
    {
        // $volunteer = new Volunteer;
        // $volunteer->create($request->all());

        // Mail::to(request('email'))
        //     ->send(new VolunteerConfirmation($request->first_name));

        // return redirect()->back()->withSuccess('Inscripto como voluntario exitosamente');
    }

    public function show(Volunteer $volunteer)
    {
        return view('admin.volunteers.show', ['volunteer' => $volunteer]);
    }

    public function edit(Volunteer $volunteer)
    {
        //
    }

    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->back();
    }

    public function filter(Request $request)
    {
        $status = $request->status;
        $filter = $request->filter;

        $volunteers = Volunteer::where(function ($query,) use ($filter){
            $query->where('first_name', 'like', '%' . $filter . '%')
                ->orWhere('last_name', 'like', '%' . $filter . '%')
                ->orWhere('email', 'like', '%' . $filter . '%');
        });
        if ($status <> 'all') {
            $volunteers->where('status', $status);
        }
        $volunteers = $volunteers->paginate(4);

        $volunteers->appends(['status' => $status, 'filter' => $filter]);
        return view('admin.volunteers.index', ['volunteers' => $volunteers, 'estado' => $status, 'filter' => $filter]);
    }
}
