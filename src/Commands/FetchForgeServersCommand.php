<?php

namespace aglipanci\ForgeTile\Commands;

use aglipanci\ForgeTile\ForgeStore;
use Illuminate\Console\Command;
use Laravel\Forge\Forge;

class FetchForgeServersCommand extends Command
{
    protected $signature = 'dashboard:fetch-forge-servers';

    protected $description = 'Fetch forge servers';

    public function handle(Forge $forge)
    {
        $this->info('Fetching Forge servers...');

        ForgeStore::make()->setServers($forge->servers());

        $this->info('All done!');
    }
}
