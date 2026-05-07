<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Validator;

class ServiceRequestApiController extends Controller
{
    public function vaculationSearchReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $data = $request->only([
            'name', 'mobile', 'property_address', 'service_type', 'remark'
        ]);
        $data['request_type'] = 'vaculation_search_report';
        $data['user_id'] = auth('api')->id();

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/service-requests'), $filename);
            $data['document'] = 'uploads/service-requests/' . $filename;
        }

        $serviceRequest = ServiceRequest::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Request submitted successfully',
            'data' => $serviceRequest
        ], 201);
    }

    public function homeService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        $data = $request->only([
            'name', 'mobile', 'address', 'service_type', 'preferred_date', 'remark'
        ]);
        $data['request_type'] = 'home_service';
        $data['user_id'] = auth('api')->id();

        $serviceRequest = ServiceRequest::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Request submitted successfully',
            'data' => $serviceRequest
        ], 201);
    }
}
