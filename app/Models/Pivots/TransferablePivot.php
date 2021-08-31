<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

class TransferablePivot extends MorphPivot
{
    protected $table = 'transfer_transferable';
}
