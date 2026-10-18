@extends('layouts.app')
@section('title','Layanan Surat Online')
@section('content')
<section class="gradient-hero text-white py-16">
  <div class="max-w-7xl mx-auto px-4"><h1 class="text-4xl sm:text-5xl">Layanan Surat Online</h1><p class="text-primary-100 mt-3">Ajukan permohonan surat tanpa perlu datang ke kantor desa</p></div>
</section>
<section class="max-w-3xl mx-auto px-4 py-12">
  @if($errors->any())<div class="bg-red-100 p-4 rounded mb-4">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>@endif
  <form action="{{ route('layanan.surat.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-xl rounded-2xl p-8 space-y-5">@csrf
    <div>
      <label class="font-semibold">Jenis Surat *</label>
      <select name="type" required class="mt-1 w-full border rounded-lg px-3 py-2">
        <option value="">-- Pilih jenis surat --</option>
        @foreach($types as $code => $name)<option value="{{ $code }}">{{ $code }} - {{ $name }}</option>@endforeach
      </select>
    </div>
    <div class="grid sm:grid-cols-2 gap-4">
      <div><label class="font-semibold">Nama Lengkap *</label><input type="text" name="requester_name" required class="mt-1 w-full border rounded-lg px-3 py-2"></div>
      <div><label class="font-semibold">NIK *</label><input type="text" name="requester_nik" required maxlength="32" class="mt-1 w-full border rounded-lg px-3 py-2"></div>
      <div><label class="font-semibold">No. HP/WA *</label><input type="text" name="requester_phone" required class="mt-1 w-full border rounded-lg px-3 py-2"></div>
      <div><label class="font-semibold">Alamat *</label><input type="text" name="requester_address" required class="mt-1 w-full border rounded-lg px-3 py-2"></div>
    </div>
    <div><label class="font-semibold">Keperluan / Tujuan *</label><textarea name="purpose" rows="4" required class="mt-1 w-full border rounded-lg px-3 py-2"></textarea></div>
    <div>
      <label class="font-semibold">Lampiran (KTP, KK, dll.)</label>
      <input type="file" name="attachments[]" multiple class="mt-1 w-full border rounded-lg px-3 py-2 bg-white">
      <div class="text-xs text-ink-500 mt-1">Maks 2MB per file. Format: PDF/JPG/PNG.</div>
    </div>
    <button class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-lg"><i class="fa-solid fa-paper-plane mr-2"></i>Ajukan Permohonan</button>
    <p class="text-xs text-ink-500 text-center">Setelah pengajuan, simpan nomor tiket Anda untuk tracking di menu Layanan > Tracking.</p>
  </form>
</section>
@endsection
