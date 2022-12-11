<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Activities') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if( $activities->count() )
                <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('State') }}</th>
                <th>{{ __('Register_date') }}</th>
                <th>{{ __('Finished_date') }}</th>
                <th>{{ __('Change_date') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($activities as $activity)
                <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->name }}</td>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->state }}</td>
                <td>{{ $activity->register_date }}</td>
                <td>{{ $activity->finished_date }}</td>
                <td>{{ $activity->change_date }}</td>
                <td>
                <a href="{{ route('activities.edit', ['activity' => $activity])
                }}">
                {{ __('Update') }}
                </a>
                </td>
                <td>
                <form action="{{ route('activities.destroy', ['activity' =>
                $activity]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">
                {{ __('Delete') }}
                </button>
                </form>
                </td>
                </tr>
                @endforeach
                <tr>
                <td colspan="3">&nbsp;</td>
                <td>
                <a href="{{ route('activities.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $activities->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>