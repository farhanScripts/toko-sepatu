<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create User') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="p-6 text-gray-900">
          <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div>
              <label for="name">Category Name</label>
              <input type="text" id="name" name="name" required>
            </div>
            <button class="bg-indigo-500 w-full">Create Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>