<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';

    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'user_id',
    ];

    public function addresses()
    {
        return $this->hasMany(Addresses::class, 'contact_id', 'contact_id');
    }
}
