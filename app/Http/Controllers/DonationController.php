<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationFilterRequest;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Donation::class, 'donation');
    }

    public function index(DonationFilterRequest $request)
    {
        $query = Donation::query();

        if ($request->has('from_date') && $request->has('to_date')) {
            $query->whereBetween('created_at', [
                $request->query('from_date'),
                $request->query('to_date')
            ]);
        }

        $query->orderBy('amount', $request->query('order', 'desc'));

        return view('admin.donations.index', ['donations' => $query->paginate(10)->withQueryString()]);
    }

    public function create()
    {
        return view('website.donations.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Donation $donation)
    {
        return view('admin.donations.show', ['donation' => $donation]);
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
