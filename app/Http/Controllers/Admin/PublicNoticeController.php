<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicNotice;
use Illuminate\Support\Str;
use File;

class PublicNoticeController extends Controller
{
    public function index()
    {
        $notices = PublicNotice::orderBy('id', 'desc')->get();
        return view('admin.public_notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.public_notices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $notice = new PublicNotice();
        $notice->title = $request->title;
        $notice->slug = Str::slug($request->title) . '-' . time();
        $notice->notice_type = $request->notice_type;
        $notice->description = $request->description;
        $notice->notice_date = $request->notice_date;
        $notice->status = $request->status ?? 'active';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/public-notices'), $imageName);
            $notice->image = 'uploads/public-notices/' . $imageName;
        }

        $notice->save();

        $notification = trans('Created successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.public-notices.index')->with($notification);
    }

    public function edit($id)
    {
        $notice = PublicNotice::findOrFail($id);
        return view('admin.public_notices.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $notice = PublicNotice::findOrFail($id);
        $notice->title = $request->title;
        $notice->notice_type = $request->notice_type;
        $notice->description = $request->description;
        $notice->notice_date = $request->notice_date;
        $notice->status = $request->status ?? 'active';

        if ($request->hasFile('image')) {
            if ($notice->image && File::exists(public_path($notice->image))) {
                File::delete(public_path($notice->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/public-notices'), $imageName);
            $notice->image = 'uploads/public-notices/' . $imageName;
        }

        $notice->save();

        $notification = trans('Updated successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.public-notices.index')->with($notification);
    }

    public function destroy($id)
    {
        $notice = PublicNotice::findOrFail($id);
        if ($notice->image && File::exists(public_path($notice->image))) {
            File::delete(public_path($notice->image));
        }
        $notice->delete();

        $notification = trans('Deleted successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.public-notices.index')->with($notification);
    }
}
