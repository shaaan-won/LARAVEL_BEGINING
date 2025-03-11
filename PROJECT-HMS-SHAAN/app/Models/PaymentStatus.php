<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PaymentStatus extends Model{

    protected $table = 'payment_statuss';

    public function billing(){
        return $this->hasMany(Billing::class);
    }

}
?>
