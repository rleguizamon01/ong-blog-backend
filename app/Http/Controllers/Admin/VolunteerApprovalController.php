<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Mail;
use App\Mail\VolunteerApproved;
use App\Mail\VolunteerRejected;

class VolunteerApprovalController extends Controller
{
    public function update(Volunteer $volunteer)
    {
        $volunteer -> status = 'accepted';
        $volunteer -> reviewed_at = now();
        $volunteer -> update();
        
        Mail::to($volunteer -> email)
            ->queue(new VolunteerApproved($volunteer->first_name));

        return redirect()->back()->withSuccess('Ha sido aceptado como voluntario exitosamente');
    }

    public function reject(Volunteer $volunteer)
    {
        $volunteer -> status = 'rejected';
        $volunteer -> reviewed_at = now();
        $volunteer -> update();
        
        Mail::to($volunteer -> email)
            ->queue(new VolunteerRejected($volunteer->first_name));

        return redirect()->back()->withSuccess('Ha sido rechazado como voluntario exitosamente');
    }
}
