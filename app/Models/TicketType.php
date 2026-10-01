<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TicketType extends Model {
 use HasFactory;
 protected $fillable=['event_id','name','description','price','capacity','sold'];
 protected function casts(): array { return ['price'=>'decimal:2','capacity'=>'integer','sold'=>'integer']; }
 public function event(){ return $this->belongsTo(Event::class); }
 public function orderItems(){ return $this->hasMany(OrderItem::class); }
 public function available(): int { return max(0,$this->capacity-$this->sold); }
}
