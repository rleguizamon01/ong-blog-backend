<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\VolunteerApproved;
use App\Mail\VolunteerRejected;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Mail;

class VolunteerApprovalController extends Controller
{
    public function approve(Volunteer $volunteer)
    {
        $volunteer->status = 'accepted';
        $volunteer->reviewed_at = now();
        $volunteer->update();

        Mail::send(new VolunteerApproved($volunteer));

        return redirect()->back()->withSuccess('Ha sido aceptado como voluntario exitosamente');
    }

    public function reject(Volunteer $volunteer)
    {
        $volunteer->status = 'rejected';
        $volunteer->reviewed_at = now();
        $volunteer->update();

        Mail::send(new VolunteerRejected($volunteer));

        return redirect()->back()->withSuccess('Ha sido rechazado como voluntario exitosamente');
    }
}
