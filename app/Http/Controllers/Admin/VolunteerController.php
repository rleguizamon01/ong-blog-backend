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

    public function index(Request $request)
    {
        $status = $request->query('status');
        $filter = $request->query('filter');

        $query = Volunteer::orderBy('status', 'asc')->orderBy('reviewed_at', 'desc');

        if ($request->has('status') && $status != 'all') {
            $query->where('status', $status);
        }
        if ($request->has('filter')) {
            $query->where(function ($q) use ($filter) {
                $q->where('first_name', 'like', '%' . $filter . '%')
                    ->orWhere('last_name', 'like', '%' . $filter . '%')
                    ->orWhere('email', 'like', '%' . $filter . '%');
            });
        }
        $volunteers = $query->paginate(10)->withQueryString();

        return view('admin.volunteers.index', ['volunteers' => $volunteers, 'estado' => $status, 'filter' => $filter]);
    }

    public function create()
    {
    }

    public function store(VolunteerRequest $request)
    {
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
}
