<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Event extends Model {
 use HasFactory;
 protected $fillable=['organizer_id','title','slug','description','category','venue','city','address','start_at','end_at','image','status','featured'];
 protected function casts(): array { return ['start_at'=>'datetime','end_at'=>'datetime','featured'=>'boolean']; }
 public function organizer(){ return $this->belongsTo(User::class,'organizer_id'); }
 public function ticketTypes(){ return $this->hasMany(TicketType::class); }
 public function scopePublished($q){ return $q->where('status','published'); }
}
