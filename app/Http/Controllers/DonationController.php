<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Requests\DonationFilterRequest;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Donation::class, 'donation');
    }

    public function index(DonationFilterRequest $request)
    {
        if($request->query('from_date') && $request->query('to_date')){
            $donations = Donation::whereBetween('created_at', [$request->query('from_date'), $request->query('to_date')]);
                        
            if($request->query('order') == 'asc'){
                $donations->orderBy('amount', 'ASC');
            }      
            elseif($request->query('order') == 'desc'){
                $donations->orderBy('amount', 'DESC');
            }   
        }
        elseif($request->query('order') == 'asc'){
            $donations = Donation::orderBy('amount', 'ASC');
        } 
        elseif($request->query('order') == 'desc'){
            $donations = Donation::orderBy('amount', 'DESC');
        }
        else{
            $donations = Donation::latest();
        }

        return view('admin.donations.index', ['donations' => $donations->paginate(10)->withQueryString()]);
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
    
    public function indexAsc(){
        $this->authorize('viewAny', Donation::class);

        $donations = Donation::orderBy('amount', 'ASC')->paginate(10);

        return view('admin.donations.index', ['donations' => $donations]);
    }

    public function indexDesc(){
        $this->authorize('viewAny', Donation::class);

        $donations = Donation::orderBy('amount', 'DESC')->paginate(10);

        return view('admin.donations.index', ['donations' => $donations]);
    }
}
