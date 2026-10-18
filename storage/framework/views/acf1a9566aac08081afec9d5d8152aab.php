<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?php echo e($surat->ticket_number); ?></title>
<style>
  @page { margin: 0; }
  body { font-family: 'DejaVu Sans', sans-serif; font-size: 12pt; line-height:1.5; color:#000; margin: 0; }
  .page { padding: 80px 60px 60px 60px; position: relative; }
  .kop { border-bottom: 3px double #000; padding-bottom: 12px; margin-bottom: 20px; }
  .kop table { width:100%; }
  .kop .logo { width: 90px; vertical-align: top; text-align:center; }
  .kop .logo img { width: 80px; }
  .kop .text { text-align:center; }
  .kop h1 { margin:0; font-size:14pt; letter-spacing: 1px; }
  .kop h2 { margin:0; font-size:18pt; letter-spacing: 1px; }
  .kop p { margin:2px 0; font-size:10pt; }
  .title { text-align:center; margin: 18px 0 6px 0; }
  .title h3 { margin:0; text-decoration: underline; font-size: 13pt; letter-spacing: 1px; }
  .title .nomor { font-size: 11pt; margin-top: 4px; }
  .body p { text-indent: 0; }
  .data table { margin: 8px 0 8px 24px; border-collapse: collapse; }
  .data td { padding: 4px 8px; vertical-align: top; }
  .data td:first-child { width: 130px; }
  .ttd { margin-top: 40px; }
  .ttd table { width:100%; }
  .ttd .right { text-align:center; width: 35%; float: right; }
  .footer { position: absolute; left: 60px; right: 60px; bottom: 30px; text-align:center; font-size: 9pt; color:#444; border-top: 1px solid #999; padding-top: 6px; }
  .stamp { position: absolute; bottom: 80px; right: 80px; opacity: .12; transform: rotate(-15deg); font-size: 40pt; font-weight:bold; color: #1e40af; border: 6px solid #1e40af; padding: 12px 30px; border-radius: 12px; }
</style>
</head>
<body>
<div class="page">
  <div class="kop">
    <table>
      <tr>
        <td class="logo"><img src="<?php echo e(public_path('img/logo.png')); ?>" alt="Logo"></td>
        <td class="text">
          <h1>PEMERINTAH KABUPATEN <?php echo e(strtoupper($settings['kabupaten'])); ?></h1>
          <h1>KECAMATAN <?php echo e(strtoupper($settings['kecamatan'])); ?></h1>
          <h2>DESA CIWIRU</h2>
          <p><?php echo e($settings['site_address']); ?> - Kode Pos <?php echo e($settings['kode_pos']); ?></p>
          <p style="font-style:italic;color:#1e40af;">"Tanjeur Winangun Kerta Wibawa"</p>
        </td>
        <td class="logo" style="width:90px;"></td>
      </tr>
    </table>
  </div>

  <div class="title">
    <h3><?php echo e(strtoupper(\App\Models\SuratRequest::suratTypes()[$surat->type] ?? 'SURAT KETERANGAN')); ?></h3>
    <div class="nomor">Nomor: <?php echo e($surat->ticket_number); ?> / DS-CWR / <?php echo e($surat->created_at->format('Y')); ?></div>
  </div>

  <div class="body">
    <p>Yang bertanda tangan di bawah ini, Kepala Desa Ciwiru, Kecamatan <?php echo e($settings['kecamatan']); ?>, Kabupaten <?php echo e($settings['kabupaten']); ?>, dengan ini menerangkan bahwa:</p>
    <div class="data">
      <table>
        <tr><td>Nama Lengkap</td><td>: <strong><?php echo e($surat->requester_name); ?></strong></td></tr>
        <tr><td>NIK</td><td>: <?php echo e($surat->requester_nik); ?></td></tr>
        <tr><td>No. HP / WA</td><td>: <?php echo e($surat->requester_phone); ?></td></tr>
        <tr><td>Alamat</td><td>: <?php echo e($surat->requester_address); ?></td></tr>
      </table>
    </div>
    <p>Adalah benar warga yang berdomisili di wilayah Desa Ciwiru, Kecamatan <?php echo e($settings['kecamatan']); ?>, Kabupaten <?php echo e($settings['kabupaten']); ?>, <?php echo e($settings['provinsi']); ?>.</p>
    <p><strong>Keperluan:</strong> <?php echo e($surat->purpose); ?></p>
    <?php if($surat->notes): ?><p><strong>Catatan:</strong> <?php echo e($surat->notes); ?></p><?php endif; ?>
    <p>Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
  </div>

  <div class="ttd">
    <table>
      <tr>
        <td style="width:65%;"></td>
        <td class="right">
          Ciwiru, <?php echo e(($surat->processed_at ?? now())->translatedFormat('d F Y')); ?><br>
          Kepala Desa Ciwiru<br><br><br><br>
          <strong style="text-decoration: underline;"><?php echo e($settings['kepala_desa']); ?></strong>
        </td>
      </tr>
    </table>
  </div>

  <?php if($surat->status === 'selesai' || $surat->status === 'disetujui'): ?>
    <div class="stamp">SAH</div>
  <?php endif; ?>

  <div class="footer">
    Dokumen ini diterbitkan secara digital oleh sistem informasi Desa Ciwiru — verifikasi tiket: <strong><?php echo e($surat->ticket_number); ?></strong>
  </div>
</div>
</body>
</html>
<?php /**PATH C:\laragon\www\desa-ciwiru\resources\views/admin/surat/pdf.blade.php ENDPATH**/ ?>