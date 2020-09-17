<?php

namespace aglipanci\ForgeTile\Commands;

use aglipanci\ForgeTile\ForgeStore;
use Illuminate\Console\Command;
use Laravel\Forge\Forge;

class FetchForgeRecentEventsCommand extends Command
{
    protected $signature = 'dashboard:fetch-forge-recent-events';

    protected $description = 'Fetch forge recent events';

    public function handle(Forge $forge)
    {
        $this->info('Fetching Forge recent events...');

        ForgeStore::make()->setRecentEvents($forge->events());

        $this->info('All done!');
    }
}
