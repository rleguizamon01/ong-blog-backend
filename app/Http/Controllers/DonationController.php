<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationFilterRequest;
use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationConfirmation;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Donation::class, 'donation');
    }

    public function index(DonationFilterRequest $request)
    {
    }

    public function create()
    {
        return view('website.donations.create');
    }

    public function store(DonationRequest $request)
    {
        $donation = Donation::create($request->merge(['status' => 'in process', 'gateway_response' => 'Falta construir la api'])->all());

        Mail::send(new DonationConfirmation($donation));

        return redirect()->back()->withSuccess('Donación realizada exitosamente');
    }

    public function show(Donation $donation)
    {
        //
    }

    public function edit(Donation $donation)
    {
        //
    }

    public function update(Request $request, Donation $donation)
    {
        //
    }

    public function destroy(Donation $donation)
    {
        //
    }
}
