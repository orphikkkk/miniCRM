<x-app-layout>
    <x-slot name="header">
        {{ __('Employees') }}
        <a
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors
            duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600
            hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('employees.create') }}"
        >
            Add Employee
        </a>
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b"
                    >
                        <th class="px-4 py-3">id</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Company</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @forelse($employees as $employee)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3">{{$employee->id}}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{$employee->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$employee->company->name}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $employee->email }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $employee->phone }}
                            </td>
                            {{--created_at date is fetched using attribute method in Companies Model making it readable --}}
                            <td class="px-4 py-3 text-sm">
                                {{ $employee->date }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit"
                                        href="{{route('employees.edit',$employee)}}"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                            ></path>
                                        </svg>
                                    </a>
                                    <form method="post" action="{{route('employees.destroy',$employee->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete"
                                        >
                                            <svg
                                                class="w-5 h-5"
                                                aria-hidden="true"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p class="p-3">There is no Employee Records.</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $employees->links() }}
        </div>

    </div>
</x-app-layout>
