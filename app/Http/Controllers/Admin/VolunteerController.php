<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.volunteers.index', ['volunteers' => Volunteer::paginate(10), 'estado' => 'all', 'filter' => '']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }
    public function filter(Request $request)
    {
        $status = $request->status;
        $filter = $request->filter;

        $volunteers = Volunteer::where(function($query,) use ($filter){
            $query->where('first_name', 'like', '%' . $filter . '%')
            ->orWhere('last_name', 'like', '%' . $filter . '%')
            ->orWhere('email', 'like', '%' . $filter . '%');
            });
        if ($status <> 'all') {
            $volunteers->where('status', $status);
        }
        $volunteers=$volunteers->paginate(4);

        $volunteers->appends(['status'=> $status, 'filter'=> $filter]);
        return view('admin.volunteers.index', ['volunteers' => $volunteers, 'estado' => $status, 'filter' => $filter ]);
    }
}
