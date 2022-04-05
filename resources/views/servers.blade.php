<x-dashboard-tile :position="$position">
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div class="flex items-center justify-center">
            <h1 class="text-xl leading-none mt-1">{{ $title ?? 'Forge Servers' }}</h1>
        </div>

        <div class="h-full overflow-auto">
            <ul wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center divide-y-2 divide-canvas">
                @forelse($servers as $server)
                    <li class="my-2 py-2">
                        <div class="font-medium">
                            <span class="rounded-full h-3 w-3 inline-block mr-1 @if($server['isReady']) bg-green-300 @else bg-gray-200 @endif"></span>
                            {{ $server['name'] }}
                        </div>
                        <div class="text-gray-700 text-sm">{{ $server['provider'] }} &middot; {{ $server['ipAddress'] }}</div>
                        @if($server['tags'])
                            <div class="mt-1">
                                @foreach($server['tags'] as $tag)
                                    <span class="bg-gray-200 rounded p-1 text-xs text-gray-600 mb-1 inline-block">{{ $tag['name'] }}</span>
                                @endforeach
                            </div>
                        @endif
                    </li>
                @empty
                    <div class="bg-yellow-300 pl-2 p-2 text-yellow-900 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-xs leading-none break-words">Currently there are no servers. Make sure you have configured the background command.</span>
                    </div>
                @endforelse
            </ul>
        </div>
    </div>
</x-dashboard-tile>
