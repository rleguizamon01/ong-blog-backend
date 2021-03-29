<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Requests\DonationFilterRequest;

class DonationController extends Controller
{
    public function index(DonationFilterRequest $request)
    {
        if($request->query('from_date') && $request->query('to_date')){
            $donations = Donation::whereBetween('created_at', [$request->query('from_date'), $request->query('to_date')])
                        ->paginate(10)->withQueryString();             
        }
        else{
            $donations = Donation::latest()->paginate(10);
        }

        return view('admin.donations.index', ['donations' => $donations]);
    }

    public function create()
    {
        return view('donations.create');
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
    
    public function indexAsc(){
        $donations = Donation::orderBy('amount', 'ASC')->paginate(10);

        return view('admin.donations.index', ['donations' => $donations]);
    }

    public function indexDesc(){
        $donations = Donation::orderBy('amount', 'DESC')->paginate(10);

        return view('admin.donations.index', ['donations' => $donations]);
    }
}
