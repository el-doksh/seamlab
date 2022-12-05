<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [  
        'status', // dine-in, delivery & takeaway
        'customer_name',
        'customer_phone',
        'table_number',
        'waiter_name',
        'fees',
        'total',
    ];

    const STATUS = [
        'dine-in',  // table_number, service_charge (fees) and waiter_name are mandatory if choosen
        'delivery', // delivery_fees (fees) ,customer_phone and customer_name are mandatory if choosen
        'takeaway'  // nothing is mandatory if choosen
    ];

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
