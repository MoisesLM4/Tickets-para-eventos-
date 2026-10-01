<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Ticket extends Model {
 protected $fillable=['order_id','ticket_type_id','code','holder_name','status','used_at'];
 protected function casts(): array { return ['used_at'=>'datetime']; }
 protected static function booted(){ static::creating(function($ticket){ $ticket->code ??= 'ENT-'.strtoupper(Str::random(12)); }); }
 public function order(){ return $this->belongsTo(Order::class); }
 public function ticketType(){ return $this->belongsTo(TicketType::class); }
 public function getEventAttribute(){ return $this->ticketType?->event; }
}
