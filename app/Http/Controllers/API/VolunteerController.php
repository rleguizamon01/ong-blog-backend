<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    public function index(Request $request)
    {
        $volunteers = Volunteer::getPosts($request)->toJson();

        return response($volunteers,200);
    }
}