<?php

namespace aglipanci\ForgeTile\Components;

use aglipanci\ForgeTile\ForgeStore;
use Livewire\Component;

class ForgeServersComponent extends Component
{
    /** @var string */
    public $position;

    /** @var string|null */
    public $title;

    public function mount(string $position, ?string $title = null)
    {
        $this->position = $position;

        $this->title = $title;
    }

    public function render()
    {
        return view('dashboard-forge-tile::servers', [
            'servers' => ForgeStore::make()->getServers(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.forge.servers.refresh_interval_in_seconds') ?? 60,
        ]);
    }
}
