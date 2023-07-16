<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class RemoveCancelledOrdersCommand extends Command
{
    protected $signature = 'remove-cancelled-orders';

    protected $description = 'Command description';

    public function handle(): void
    {
        Order::whereStatus('cancel')->delete();
    }
}
