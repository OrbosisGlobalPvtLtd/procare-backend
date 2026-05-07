<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicNotice;

class PublicNoticeApiController extends Controller
{
    public function index()
    {
        $notices = PublicNotice::where('status', 'active')->orderBy('id', 'desc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $notices
        ]);
    }

    public function show($id)
    {
        $notice = PublicNotice::where('status', 'active')->find($id);
        if (!$notice) {
            return response()->json([
                'status' => 'error',
                'message' => 'Notice not found.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $notice
        ]);
    }
}
