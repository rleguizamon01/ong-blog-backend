<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Mail;
use App\Mail\VolunteerConfirmation;

class VolunteerController extends Controller
{
    public function index(Request $request)
    {
        $volunteers = Volunteer::byStatus($request->get('status'))->paginate(10)->toJson();

        return response($volunteers,200);
    }

    public function store(Request $request)
    {
        $volunteer = Volunteer::create($request->all());

        Mail::send(new VolunteerConfirmation($volunteer));

        return response()->json($volunteer, 201);
    }

    public function destroy(Volunteer $volunteer)
    {
         $volunteer->delete();
         return response()->json(null, 204);
    }
}