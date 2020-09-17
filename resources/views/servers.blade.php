<x-dashboard-tile :position="$position">
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div class="flex items-center justify-center">
            <h1 class="text-xl leading-none mt-1">{{$title ?? 'Forge Servers'}}</h1>
        </div>

        <div class="h-full overflow-scroll">
            <ul wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center divide-y-2 divide-canvas">
                @if(count($servers))
                    @foreach($servers as $server)
                        <li class="py-1">
                            <div class="my-2">
                                <div class="font-medium">
                                    <span class="rounded-full h-3 w-3 inline-block mr-1 @if($server['isReady']) bg-green-200 @else bg-gray-200 @endif"></span>
                                    {{ $server['name'] }}
                                </div>
                                <div class="text-gray-700 text-sm">{{ $server['provider'] }}</div>
                                <div class="text-gray-700 text-sm">{{ $server['ipAddress'] }}</div>
                                <div class="mt-1">
                                    @foreach($server['tags'] as $tag)
                                        <span class="bg-gray-200 rounded p-1 text-xs text-gray-600 mb-1 inline-block">{{ $tag['name'] }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <div class="bg-yellow-300 pl-2 p-2 rounded-md">
                        <span class="inline-block">
                             <div class="rounded-full h-4 w-4 flex items-center justify-center bg-yellow-900  text-white text-xs inline-block">!</div>
                        </span>
                        <span class="text-xs text-yellow-900 leading-none break-words">Currently there are no servers. Make sure you have configured the background command.</span>
                    </div>
                @endif
            </ul>
        </div>
    </div>
</x-dashboard-tile>
