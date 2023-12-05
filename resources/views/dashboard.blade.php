<x-app-layout>
    <x-slot name="header">
        {{ __('welcome.dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        {{ __('welcome.message') }}
    </div>
</x-app-layout>
