<x-dashboard-tile :position="$position">
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div class="flex items-center justify-center">
            <h1 class="text-xl leading-none mt-1">{{$title ?? 'Forge Recent Events'}}</h1>
        </div>
        <div class="h-full overflow-scroll">
            <ul wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center divide-y-2 divide-canvas">
                @if(count($events))
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
                @else
                    <div class="bg-yellow-300 pl-2 p-2 rounded-md">
                        <span class="inline-block">
                             <div class="rounded-full h-4 w-4 flex items-center justify-center bg-yellow-900  text-white text-xs inline-block">!</div>
                        </span>
                        <span class="text-xs text-yellow-900 leading-none break-words">Currently there are no events. Make sure you have configured the background command.</span>
                    </div>
                @endif
            </ul>
        </div>
    </div>
</x-dashboard-tile>
