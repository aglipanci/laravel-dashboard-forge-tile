<x-dashboard-tile :position="$position">
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div class="flex items-center justify-center">
            <h1 class="text-xl leading-none mt-1">{{ $title ?? 'Forge Recent Events' }}</h1>
        </div>
        <div class="h-full overflow-auto">
            <ul wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center divide-y-2 divide-canvas">
                @forelse($events as $event)
                    <li class="py-2 my-2">
                        <div class="font-medium text-sm">
                            {{ \Carbon\Carbon::parse($event['createdAt'])->isoFormat('LLL') }}
                        </div>
                        <div class="text-xs text-gray-600">
                            {{ $event['serverName'] }}
                        </div>
                        <div class="text-xs">
                            {{ $event['description'] }}
                        </div>
                    </li>
                @empty
                    <div class="bg-yellow-300 pl-2 p-2 rounded-md text-yellow-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-xs leading-none break-words">Currently there are no events. Make sure you have configured the background command.</span>
                    </div>
                @endforelse
            </ul>
        </div>
    </div>
</x-dashboard-tile>
