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
          <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
              <label for="name">Name</label>
              <input type="text" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div>
              <label for="email">Email</label>
              <input type="email" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div>
              <label for="password">Password (Leave blank to keep current password)</label>
              <input type="password" id="password" name="password">
            </div>
            <div>
              <label for="role">Role As</label>
              <select name="role" id="role">
                <option value="pembeli" {{ $user->role == 'pembeli' ? 'selected' : '' }}>Pembeli</option>
                <option value="vendor" {{ $user->role == 'vendor' ? 'selected' : '' }}>Vendor</option>
              </select>
            </div>
            <button class="bg-indigo-500 w-full">Edit Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>