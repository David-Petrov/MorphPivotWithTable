# Custom MorphPivot intermediate table model's `$table` property not respected

It's all evident in the `Transfer.php` example file. When using a custom MorphPivot model, its `$table` property is not respected to automatically deduce the intermediate table's name.

```php
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
```
