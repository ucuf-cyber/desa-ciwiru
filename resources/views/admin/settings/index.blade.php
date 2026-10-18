@extends('layouts.admin')
@section('title','Pengaturan')
@section('content')
<h1 class="text-2xl mb-6">Pengaturan Situs</h1>
<form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white p-6 rounded-2xl shadow space-y-4">@csrf @method('PUT')
  <div class="grid sm:grid-cols-2 gap-4">
    @foreach([
      'site_name'=>'Nama Situs','site_tagline'=>'Tagline','site_phone'=>'Telepon','site_email'=>'Email',
      'site_facebook'=>'Facebook URL','site_instagram'=>'Instagram URL',
      'kepala_desa'=>'Nama Kepala Desa','sekretaris_desa'=>'Sekretaris Desa',
      'jumlah_penduduk'=>'Jumlah Penduduk','jumlah_kk'=>'Jumlah KK',
      'jumlah_laki'=>'Jumlah Laki-laki','jumlah_perempuan'=>'Jumlah Perempuan',
      'luas_wilayah'=>'Luas Wilayah (Hektar)','jumlah_dusun'=>'Jumlah Dusun','jumlah_rw'=>'Jumlah RW','jumlah_rt'=>'Jumlah RT',
    ] as $key=>$label)
      <div><label class="font-semibold text-sm">{{ $label }}</label><input type="text" name="settings[{{ $key }}]" value="{{ $settings[$key] ?? '' }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    @endforeach
  </div>
  <div><label class="font-semibold">Alamat</label><input type="text" name="settings[site_address]" value="{{ $settings['site_address'] ?? '' }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
  <div><label class="font-semibold">Visi</label><textarea name="settings[visi]" id="ed-visi" rows="3" class="w-full border rounded-lg px-3 py-2 mt-1">{{ $settings['visi'] ?? '' }}</textarea></div>
  <div><label class="font-semibold">Misi</label><textarea name="settings[misi]" id="ed-misi" rows="6" class="w-full border rounded-lg px-3 py-2 mt-1">{{ $settings['misi'] ?? '' }}</textarea></div>
  <div><label class="font-semibold">Sejarah</label><textarea name="settings[sejarah]" id="ed-sejarah" rows="8" class="w-full border rounded-lg px-3 py-2 mt-1">{{ $settings['sejarah'] ?? '' }}</textarea></div>
  <button class="bg-primary-700 hover:bg-primary-800 text-white px-6 py-2 rounded-lg transition">Simpan Pengaturan</button>
</form>
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ['ed-visi','ed-misi','ed-sejarah'].forEach(id => ClassicEditor.create(document.getElementById(id)).catch(console.error));
</script>
@endpush
@endsection
