<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicNotice;
use App\Models\ServiceRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class ProcareServiceController extends Controller
{
    public function jahirSuchna()
    {
        $notices = PublicNotice::where('status', 'active')->orderBy('notice_date', 'desc')->paginate(12);
        return view('frontend.jahir_suchna.index', compact('notices'));
    }

    public function jahirSuchnaShow($id)
    {
        $notice = PublicNotice::where('status', 'active')->findOrFail($id);
        return view('frontend.jahir_suchna.show', compact('notice'));
    }

    public function vaculationForm()
    {
        return view('frontend.services.vaculation');
    }

    public function vaculationSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $data = $request->except('_token', 'document');
        $data['request_type'] = 'vaculation_search_report';
        $data['user_id'] = Auth::id();

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/service-requests'), $filename);
            $data['document'] = 'uploads/service-requests/' . $filename;
        }

        ServiceRequest::create($data);

        $notification = trans('Vaculation & Search Report request submitted successfully.');
        return redirect()->back()->with(['message' => $notification, 'alert-type' => 'success']);
    }

    public function homeServiceForm()
    {
        return view('frontend.services.home_service');
    }

    public function homeServiceSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
        ]);

        $data = $request->except('_token');
        $data['request_type'] = 'home_service';
        $data['user_id'] = Auth::id();

        ServiceRequest::create($data);

        $notification = trans('Registery Home Service submitted successfully.');
        return redirect()->back()->with(['message' => $notification, 'alert-type' => 'success']);
    }
}
