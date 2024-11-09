<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\Charity;
class AdminController extends Controller
{
    public function index()
    {
        $charities = Charity::all();
        $totalDonations = Donation::sum('amount');
        $donations = Donation::selectRaw('DATE(created_at) as date, SUM(amount) as total')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();
        return view('admin.home', compact('charities', 'totalDonations','donations'));
    }
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'You are not authorized to access this area.');
            }
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'You are not authorized to access this area.');
            }
        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid credentials.');
        }
    }
    public function addCharity()
    {
        return view('admin.addCharity');
    }
    public function storeCharity(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $charity = new Charity();
        $charity->name = $request->name;
        $charity->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $charity->image = $imageName;
        }

        $charity->type = $request->type;
        $charity->location = $request->location;
        $charity->save();

        return redirect()->route('dashboard')->with('success', 'Charity created successfully.');
    }



    public function charities() {
        $charities = Charity::all();

        return view('admin.charities',compact('charities'));
    }
    public function edit($id)
    {
        $charity = Charity::findOrFail($id);
        return view('admin.edit', compact('charity'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $charity = Charity::findOrFail($id);
        $charity->name = $request->name;
        $charity->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $charity->image = $imageName;
        }

        $charity->type = $request->type;
        $charity->location = $request->location;
        $charity->save();

        return redirect()->route('dashboard')->with('success', 'Charity updated successfully.');
    }

    public function deleteCharity($id)
    {
        $charity = Charity::findOrFail($id);
        $charity->delete();

        return redirect()->route('dashboard')->with('success', 'Charity deleted successfully.');
    }
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function donations()
    {
        // جلب التبرعات مع تفاصيل المستخدم والجمعية
        $donations = Donation::with('user', 'charity')
        ->orderBy('id', 'desc')
        ->get();        return view('admin.donations', compact('donations'));
    
}
public function updateDeliveryStatus($id, Request $request)
{
    $donation = Donation::findOrFail($id);

    if ($request->has('user_delivered')) {
        $donation->user_delivered = $request->input('user_delivered');
    }

    if ($request->has('site_delivered')) {
        $donation->site_delivered = $request->input('site_delivered');
    }

    $donation->save();

    return redirect()->back()->with('success', 'Donation status updated successfully.');
}
}
