<x-app-layout>
  <x-slot name="header">
    <div class=" flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Manage Category') }}
      </h2>
      <a href="{{ route('admin.categories.create') }}" class="p-[10px] bg-indigo-500 text-white">Create Category</a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif

      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <table class="min-w-full bg-white border rounded-lg">
            <thead>
              <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Slug</th>
                <th class="py-3 px-6 text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
              @forelse ($categories as $category )
              <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $category->id }}</td>
                <td class="py-3 px-6 text-left">{{ $category->name }}</td>
                <td class="py-3 px-6 text-left">{{ $category->slug }}</td>
                <td class="py-3 px-6 text-center">
                  <div class="flex item-center justify-center space-x-4">
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                      class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>