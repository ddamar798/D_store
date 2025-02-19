<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProducTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'booking_trx_id',
        'city',
        'post_code',
        'address',
        'sub_tottal_amount',
        'grand_total_amount',
        'discount_amount',
        'is_paid',
        'shoe_id',
        'shoe_size',
        'promo_code_id',
        'proof',
    ];

    // Untuk membuat random code Booking transaksi.
    public static function generateUniqueTrxId(){
        $prefix = 'DS';
        do {
            $randomString = $prefix . mt_rand(1000, 9999); // artinya (var 'DS' + Angka random).
        } while (self::where('booking_trx_id', $randomString)->exits()); // cek apakah kode Transaksi ada/tidak.

        return $randomString; // jika ada akan masuk kesini.
    }

    public function promoCode(): BelongsTo{
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }
}
