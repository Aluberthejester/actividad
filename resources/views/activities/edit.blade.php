<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Activity') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('activities.update', ['activity' =>
                $activity]) }}" method="post">

                @csrf
                @method('PUT')

                <label for="name">
                {{ __('Name') }}
                </label>
                <input type="text" name="name" id="name" value="{{ $activity->name }}">
                @error('name')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="description">
                {{ __('Description') }}
                </label>
                <input type="text" name="description" id="description"
                value="{{ $activity->description }}">
                @error('description')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="state">
                {{ __('State') }}
                </label>
                <select name="state" id="state">
                    <option value="waiting">waiting</option>
                    <option value="finished">finished</option>
                    <option value="postponed">postponed</option>
                    <option value="cancelled">cancelled</option>
                </select>
                @error('state')
                <div>
                {{ $message }}
                </div>
                @enderror

                
                <input type="hidden" name="register_date" id="register_date"
                value="{{ $activity->register_date }}">
                @error('register_date')
                <div>
                {{ $message }}
                </div>
                @enderror

                
                <input type="hidden" name="finished_date" id="finished_date"
                value="{{ $activity->finished_date }}">
                @error('finished_date')
                <div>
                {{ $message }}
                </div>
                @enderror

                <button type="submit">
                {{ __('Update') }}
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>