<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charity;
use App\Models\Donation;


class User extends Controller
{
    public function home() {
        $randomCharities = Charity::inRandomOrder()->take(3)->get();
        return view('home', compact('randomCharities'));
    }
    public function AssociationsIndex()
    {
        $charities = Charity::all();
        return view('associations',compact('charities'));
    }
    public function calculateZakatIndex()
    {
        return view('calculate-zakat');
    }
    public function calculate(Request $request)
    {
        $request->validate([
            'wealth' => 'required|numeric|min:0',
        ]);

        $wealth = $request->input('wealth');
        $zakat = $wealth * 0.025;

        return view('calculate-zakat', [
            'zakat' => $zakat,
            'wealth' => $wealth
        ]);
    }


    public function create($charity_id)
    {
        $charity = Charity::findOrFail($charity_id);
        return view('donate', compact('charity'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'charity_id' => 'required|exists:charities,id',
            'amount' => 'required|numeric|min:1',
            'recipient_name' => 'required|string|max:255',
            'recipient_phone' => 'required|string|max:255',
            'recipient_address' => 'required|string|max:255',
      
        ]);

        $donation = Donation::create([
            'user_id' => auth()->id(),
            'charity_id' => $request->charity_id,
            'amount' => $request->amount,
            'recipient_name' => $request->recipient_name,
            'recipient_phone' => $request->recipient_phone,
            'recipient_address' => $request->recipient_address,
            'city' => $request->city,
            'user_delivered' => 0,
            'site_delivered' =>0
        ]);

        return redirect()->route('home')->with('success', 'تمت ارسال طلب التبرع بنجاح');
    }

    
}
