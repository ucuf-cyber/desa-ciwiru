<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\SuratRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    public function suratForm() {
        return view('public.layanan.surat-form', ['types' => SuratRequest::suratTypes()]);
    }

    public function suratStore(Request $request) {
        $data = $request->validate([
            'type' => 'required|in:SKD,SKU,SKL,SKM,SKTM,SP',
            'requester_name' => 'required|string|max:120',
            'requester_nik' => 'required|string|max:32',
            'requester_phone' => 'required|string|max:20',
            'requester_address' => 'required|string|max:255',
            'purpose' => 'required|string|max:2000',
            'attachments.*' => 'nullable|file|max:2048',
        ]);

        $files = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $f) {
                $files[] = $f->store('surat-attachments','public');
            }
        }
        $ticket = 'SRT-' . date('Ymd') . '-' . strtoupper(Str::random(5));
        $surat = SuratRequest::create(array_merge($data, [
            'ticket_number' => $ticket,
            'attachments' => $files,
            'status' => 'pending',
        ]));
        return redirect()->route('layanan.tracking')->with('success', "Permohonan diterima. Nomor tiket Anda: $ticket")->with('ticket', $ticket);
    }

    public function tracking(Request $request) {
        $surat = null; $complaint = null;
        if ($ticket = $request->get('ticket')) {
            $surat = SuratRequest::where('ticket_number', $ticket)->first();
            $complaint = Complaint::where('ticket_number', $ticket)->first();
        }
        return view('public.layanan.tracking', compact('surat','complaint'));
    }

    public function pengaduanForm() { return view('public.layanan.pengaduan-form'); }

    public function pengaduanStore(Request $request) {
        $data = $request->validate([
            'reporter_name' => 'nullable|string|max:120',
            'reporter_phone' => 'nullable|string|max:20',
            'is_anonymous' => 'nullable',
            'category' => 'required|string|max:50',
            'subject' => 'required|string|max:200',
            'description' => 'required|string|max:5000',
            'location' => 'nullable|string|max:200',
            'evidence.*' => 'nullable|file|max:4096',
        ]);
        $files = [];
        if ($request->hasFile('evidence')) {
            foreach ($request->file('evidence') as $f) $files[] = $f->store('complaints','public');
        }
        $isAnon = (bool) $request->boolean('is_anonymous');
        $ticket = 'PGD-' . date('Ymd') . '-' . strtoupper(Str::random(5));
        Complaint::create(array_merge($data, [
            'ticket_number' => $ticket,
            'evidence' => $files,
            'is_anonymous' => $isAnon,
            'status' => 'baru',
        ]));
        return redirect()->route('layanan.tracking')->with('success', "Pengaduan terkirim. Nomor tiket Anda: $ticket")->with('ticket', $ticket);
    }
}
