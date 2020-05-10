<?php

namespace aglipanci\ForgeTile;

use Spatie\Dashboard\Models\Tile;

class ForgeStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("forge");
    }

    public function setServers(array $data): self
    {
        $this->tile->putData('servers', $data);

        return $this;
    }

    public function getServers(): array
    {
        return$this->tile->getData('servers') ?? [];
    }

    public function setRecentEvents(array $data): self
    {
        $this->tile->putData('recent_events', $data);

        return $this;
    }

    public function getRecentEvents(): array
    {
        return$this->tile->getData('recent_events') ?? [];
    }
}
