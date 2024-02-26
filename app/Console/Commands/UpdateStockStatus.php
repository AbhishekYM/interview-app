<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\StockMaster;
use Carbon\Carbon;

class UpdateStockStatus extends Command
{
    protected $signature = 'stock:update-status';
    protected $description = 'Update stock entries status to In-Stock';

    public function handle()
    {
        $stockEntries = StockMaster::where('in_stock_date', '<=', Carbon::now()->toDateString())
            ->where('status', '!=', 'In-Stock')
            ->get();

        foreach ($stockEntries as $entry) {
            $entry->in_stock_date = Carbon::now()->toDateString();
            $entry->status = 'In-Stock';
            $entry->save();
        }

        $this->info('Stock entries status updated to In-Stock for the current date.');
    }
}
