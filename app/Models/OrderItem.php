<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model {
 protected $fillable=['order_id','ticket_type_id','quantity','unit_price','subtotal'];
 protected function casts(): array { return ['unit_price'=>'decimal:2','subtotal'=>'decimal:2','quantity'=>'integer']; }
 public function order(){ return $this->belongsTo(Order::class); }
 public function ticketType(){ return $this->belongsTo(TicketType::class); }
}
