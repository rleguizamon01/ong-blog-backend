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
        $query = Donation::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('created_at', [
                $request->query('from_date'),
                $request->query('to_date')
            ]);
        }

        if($request->filled('order')){
            $query->orderBy('amount', $request->query('order'));
        }

        return view('admin.donations.index', ['donations' => $query->paginate(10)->withQueryString()]);
    }

    public function create()
    {
        return view('website.donations.create');
    }

    public function store(DonationRequest $request)
    {
        $donation = Donation::create($request->merge(['status' => 'in process', 'gateway_response' => 'Falta construir la api'])->all());

        Mail::send(new DonationConfirmation($donation));

        return redirect()->to('/');
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
