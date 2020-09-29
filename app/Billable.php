<?php

namespace App;

use App\Concerns\ManagesCustomer;
use App\Concerns\ManagesReceipts;
use App\Concerns\ManagesSubscriptions;
use App\Concerns\PerformsCharges;

trait Billable
{
    use ManagesCustomer;
    use ManagesSubscriptions;
    use ManagesReceipts;
    use PerformsCharges;

    /**
     * Get the default Paddle API options for the current Billable model.
     *
     * @param  array  $options
     * @return array
     */
    public function paddleOptions(array $options = [])
    {
        return Cashier::paddleOptions($options);
    }
}
