<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;

class ServiceRequestController extends Controller
{
    public function vaculationSearchReport()
    {
        $requests = ServiceRequest::where('request_type', 'vaculation_search_report')->orderBy('id', 'desc')->get();
        return view('admin.service_requests.index', compact('requests'))->with('title', 'Vaculation & Search Report Requests');
    }

    public function registryHomeService(Request $request)
    {
        $query = ServiceRequest::where('request_type', 'registry_home_service')->orderBy('id', 'desc');
        
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        $requests = $query->get();
        return view('admin.service_requests.index', compact('requests'))->with('title', 'Registry Home Service Requests');
    }

    public function show($id)
    {
        $request = ServiceRequest::findOrFail($id);
        return view('admin.service_requests.show', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceRequest->status = $request->status;
        $serviceRequest->admin_note = $request->admin_note;
        $serviceRequest->save();

        $notification = trans('Status updated successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceRequest->delete();

        $notification = trans('Deleted successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
