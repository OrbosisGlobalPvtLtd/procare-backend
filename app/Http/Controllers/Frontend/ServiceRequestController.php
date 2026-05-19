<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('frontend.services.registry_home_service', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'property_type' => 'nullable|string|max:255',
            'property_address' => 'nullable|string|max:500',
            'preferred_date' => 'nullable|date',
            'preferred_time' => 'nullable|date_format:H:i',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'remark' => 'nullable|string|max:1000',
        ]);

        $data = $request->except('_token', 'document');
        $data['request_type'] = 'registry_home_service';
        $data['user_id'] = Auth::id();

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/service-requests'), $filename);
            $data['document'] = 'uploads/service-requests/' . $filename;
        }

        ServiceRequest::create($data);

        $notification = trans('Registry Home Service request submitted successfully.');
        return redirect()->back()->with(['message' => $notification, 'alert-type' => 'success']);
    }
}
