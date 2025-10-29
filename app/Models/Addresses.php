<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $table = 'addresses';

    protected $primaryKey = 'address_id';

    protected $fillable = [
        'street',
        'city',
        'province',
        'country',
        'postal_code',
        'contact_id',
    ];

    public function contact()
    {
        return $this->belongsTo(Contacts::class, 'contact_id', 'contact_id')->where('user_id', auth()->id());
    }
}
