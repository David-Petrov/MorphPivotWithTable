<?php

use App\Models\Transfer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferTransferableTable extends Migration
{
    public function up()
    {
        Schema::create('transfer_transferable', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Transfer::class);
            $table->morphs('transferable');
            $table->json('data')->nullable();
            $table->index(['transfer_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('transfer_transferable');
    }
}
