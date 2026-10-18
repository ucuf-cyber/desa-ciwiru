<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(Request $request) {
        $q = Complaint::query();
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->latest()->paginate(15)->withQueryString();
        return view('admin.complaints.index', compact('items'));
    }
    public function show(Complaint $complaint) {
        return view('admin.complaints.show', compact('complaint'));
    }
    public function update(Request $request, Complaint $complaint) {
        $data = $request->validate([
            'status' => 'required|in:baru,diproses,selesai,ditolak',
            'admin_response' => 'nullable|string|max:2000',
        ]);
        $data['responded_by'] = auth()->id();
        if (in_array($data['status'], ['selesai','ditolak'])) $data['resolved_at'] = now();
        $complaint->update($data);
        return back()->with('success','Pengaduan diperbarui.');
    }
}
