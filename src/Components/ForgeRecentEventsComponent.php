<?php

namespace aglipanci\ForgeTile\Components;

use aglipanci\ForgeTile\ForgeStore;
use Livewire\Component;

class ForgeRecentEventsComponent extends Component
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
        return view('dashboard-forge-tile::recent-events', [
            'events' => ForgeStore::make()->getRecentEvents(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.forge.recent_events.refresh_interval_in_seconds') ?? 60,
        ]);
    }
}
