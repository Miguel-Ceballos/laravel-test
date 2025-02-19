<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notifications
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <h2 class="text-lg font-medium leading-6 text-gray-900">
                                Notifications
                            </h2>
                        </div>
                        <div class="mt-4 flex-shrink-0 flex justify-end">
                            <x-button wire:click="markAllAsRead" wire:loading.attr="disabled">
                                Mark All as Read
                            </x-button>
                        </div>
                    </div>
                </div>

{{--                @if ($unreadCount > 0)--}}
                    {{-- Notifications Section --}}
                    <div class="border-t border-gray-200">
                        <div class="p-6 space-y-6">
                            @forelse ($notifications as $notification)
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-10 w-10 rounded-md bg-blue-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell"><path d="M10.268 21a2 2 0 0 0 3.464 0"/><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/></svg>
                                            </div>
                                        </div>
                                        <!-- Notification Content -->
                                        <div>
                                            <p class="text-sm text-gray-500">
{{--                                                {!! $notification->content !!}--}}
                                                New Post from {{ $notification->data['user_id'] }}:
                                                <span class="font-bold">{{ $notification->data['title'] }}</span>
                                            </p>
                                            <span class="text-sm text-gray-400">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-1 text-sm text-gray-500">
                                                You haven't created any notifications yet.
                                            </div>
                                        </div>
                                    </div>
                            @endforelse
                        </div>
                    </div>
{{--                @else--}}
{{--                    --}}{{-- No Notifications Section --}}
{{--                    <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <div class="flex-1 text-sm text-gray-500">--}}
{{--                                You haven't created any notifications yet.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
            </div>
        </div>
    </div>
</x-app-layout>
