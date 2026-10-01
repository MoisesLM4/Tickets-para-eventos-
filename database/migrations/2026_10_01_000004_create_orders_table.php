<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration {public function up():void{Schema::create('orders',function(Blueprint $t){$t->id();$t->foreignId('user_id')->constrained()->cascadeOnDelete();$t->string('code')->unique();$t->decimal('total',10,2);$t->enum('status',['pending','paid','cancelled','refunded'])->default('paid');$t->string('payment_method')->default('demo');$t->timestamps();});}public function down():void{Schema::dropIfExists('orders');}};
