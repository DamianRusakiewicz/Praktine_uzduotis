<?php

namespace App\Console\Commands;

use App\Models\Conference;
use Illuminate\Console\Command;

class DeleteExpiredConferences extends Command
{
    protected $signature = 'conferences:delete-expired';

    protected $description = 'Delete expired conferences';

    public function handle()
    {
        Conference::where('time', '<', now())->delete();
        $this->info('Expired conferences deleted successfully.');
    }
}
