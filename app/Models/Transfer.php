<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    public function devices()
    {
        //won't work, since the table name is not explicitly stated in the method
        return $this->morphedByMany(Device::class, 'transferable')->using(Pivots\TransferablePivot::class);

        //works with explicit table name parameter
        //return $this->morphedByMany(Device::class, 'transferable', 'transfer_transferable')->using(Pivots\TransferablePivot::class);

        //after digging around in the core, I found something interesting - even this works... but is it okay to use?
        //return $this->morphedByMany(Device::class, 'transferable', Pivots\TransferablePivot::class);
    }
}
