<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\SuratRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index(Request $request) {
        $q = SuratRequest::query();
        if ($status = $request->get('status')) $q->where('status', $status);
        $items = $q->latest()->paginate(15)->withQueryString();
        return view('admin.surat.index', compact('items'));
    }
    public function show(SuratRequest $surat) {
        return view('admin.surat.show', compact('surat'));
    }
    public function update(Request $request, SuratRequest $surat) {
        $data = $request->validate([
            'status' => 'required|in:pending,diverifikasi,disetujui,ditolak,selesai',
            'notes' => 'nullable|string|max:2000',
        ]);
        $data['processed_by'] = auth()->id();
        $data['processed_at'] = now();
        $surat->update($data);
        return back()->with('success','Status surat diperbarui.');
    }

    public function pdf(SuratRequest $surat)
    {
        $settings = [
            'kepala_desa' => SiteSetting::get('kepala_desa', 'Kepala Desa'),
            'site_name' => SiteSetting::get('site_name', 'Desa Ciwiru'),
            'site_address' => SiteSetting::get('site_address', ''),
            'kecamatan' => SiteSetting::get('kecamatan', 'Pasawahan'),
            'kabupaten' => SiteSetting::get('kabupaten', 'Kuningan'),
            'provinsi' => SiteSetting::get('provinsi', 'Jawa Barat'),
            'kode_pos' => SiteSetting::get('kode_pos', '45559'),
        ];

        $pdf = Pdf::loadView('admin.surat.pdf', compact('surat', 'settings'))->setPaper('a4', 'portrait');
        $filename = 'Surat-' . $surat->type . '-' . $surat->ticket_number . '.pdf';
        return $pdf->stream($filename);
    }
}
