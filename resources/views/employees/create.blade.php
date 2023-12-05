<x-app-layout>
    <x-slot name="header">
        {{ __('Add a new Employee Record') }}
    </x-slot>
    <form action="{{ route('employees.store') }}" method="post">
        @csrf
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                <div class="mt-2">
                    <input type="text" name="first_name" id="first_name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1
                           ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                            focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    value="{{old('first_name')}}">
                </div>
                @error('first_name')
                    <span class="text-xs text-red-600 dark:text-red-400">
                      {{$message}}
                    </span>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                <div class="mt-2">
                    <input type="text" name="last_name" id="last_name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           value="{{old('last_name')}}">
                </div>
                @error('last_name')
                <span class="text-xs text-red-600 dark:text-red-400">
                      {{$message}}
                    </span>
                @enderror
            </div>

            <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" value="{{old('email')}}" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('email')
                <span class="text-xs text-red-600 dark:text-red-400">
                      {{$message}}
                    </span>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                <div class="mt-2">
                    <input id="phone" name="phone" type="text" autocomplete="phone" class="block w-full
                    rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                    placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    value="{{old('phone')}}">
                </div>
                @error('phone')
                <span class="text-xs text-red-600 dark:text-red-400">
                      {{$message}}
                    </span>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label for="company" class="block text-sm font-medium leading-6 text-gray-900">Companies</label>
                <div class="mt-2">
                    <select id="company" name="company_id" autocomplete="company-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900
                            shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset
                            focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}" @selected(old('company') == $company->id)>{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="sm:col-span-4">
            <button
                class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150
                 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                  focus:outline-none focus:shadow-outline-purple"
                type="submit"
            >
                Submit
            </button>
            </div>
        </div>
    </form>
</x-app-layout>
