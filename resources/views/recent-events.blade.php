<x-dashboard-tile :position="$position">
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div class="flex items-center justify-center">
            <h1 class="text-xl leading-none mt-1">{{$title ?? 'Forge Recent Events'}}</h1>
        </div>
        <div class="h-full overflow-scroll">
            <ul wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center divide-y-2 divide-canvas">
                @foreach($events as $event)
                    <li class="py-1">
                        <div class="my-2">
                            <div class="font-medium text-sm">
                                {{ \Carbon\Carbon::parse($event['createdAt'])->format('F j, g:m:i A') }}
                            </div>
                            <div class="text-xs text-gray-600 mb-1">
                                {{ $event['serverName'] }}
                            </div>
                            <div class="text-xs">
                                {{ $event['description'] }}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-dashboard-tile>
