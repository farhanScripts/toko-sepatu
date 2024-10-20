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
          <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div>
              <label for="name">Name</label>
              <input type="text" id="name" name="name" required>
            </div>
            <div>
              <label for="email">Email</label>
              <input type="email" id="email" name="email" required>
            </div>
            <div>
              <label for="password">Password</label>
              <input type="password" id="password" name="password" required>
            </div>
            <div>
              <label for="role">Role As</label>
              <select name="role" id="role">
                <option value="pembeli">Pembeli</option>
                <option value="vendor">Vendor</option>
              </select>
            </div>
            <button class="bg-indigo-500 w-full">Create Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>