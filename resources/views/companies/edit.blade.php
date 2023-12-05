<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Company Record') }}
    </x-slot>
    <form action="{{ route('companies.update',$company) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <label class="block text-sm">
                <span class="text-gray-700">Name</span>
                <input
                    class="block w-full mt-1 text-sm focus:outline-none
                    focus:border-purple-400 focus:shadow-outline-purple form-input rounded"
                    placeholder="Apple Inc."
                    name="name"
                    value="{{old('name',$company->name)}}">
            </label>
            @error('name')
            <span class="text-xs text-red-600 dark:text-red-400">
                  {{$message}}
            </span>
            @enderror

            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Email</span>
                <input
                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                    rounded form-input"
                    placeholder="info@apple.com"
                    name="email"
                    value="{{old('email',$company->email)}}">
            </label>
            @error('email')
            <span class="text-xs text-red-600 dark:text-red-400">
                  {{$message}}
            </span>
            @enderror

            <label for="file-upload" class="block mt-4 text-sm text-gray-700">Logo</label>
            <img src="{{asset($company->logo)}}"
                 alt="{{$company->name}}" class="rounded-lg bg-gray-100">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700">Logo</span>
                <input type="file"
                       class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                       rounded form-input"
                       placeholder="info@apple.com"
                        name="logo"
                        value="{{old('logo',$company->logo)}}">
            </label>
            @error('logo')
                <span class="text-xs text-red-600 dark:text-red-400">
                      {{$message}}
                </span>
            @enderror

            <button
                class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150
                 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                  focus:outline-none focus:shadow-outline-purple"
                type="submit"
            >
             Submit
            </button>
        </div>
    </form>
</x-app-layout>
