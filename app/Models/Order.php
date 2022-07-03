<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'order_user_id',
        'ammount',
        'order_address',
        'order_email',
        'order_status',

    ];

    public function admin()
    {
       return $this->belongsTo(Admin::class);
    }
    
}
