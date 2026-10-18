<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratRequest extends Model
{
    protected $fillable = ['ticket_number','type','requester_name','requester_nik','requester_phone','requester_address','purpose','attachments','status','notes','processed_by','processed_at','letter_file'];
    protected $casts = ['attachments' => 'array', 'processed_at' => 'datetime'];

    public static function suratTypes(): array
    {
        return [
            'SKD' => 'Surat Keterangan Domisili',
            'SKU' => 'Surat Keterangan Usaha',
            'SKL' => 'Surat Keterangan Lahir',
            'SKM' => 'Surat Keterangan Meninggal',
            'SKTM' => 'Surat Keterangan Tidak Mampu',
            'SP' => 'Surat Pengantar',
        ];
    }
}
