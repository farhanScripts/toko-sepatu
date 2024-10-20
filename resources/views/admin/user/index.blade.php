<x-app-layout>
  <x-slot name="header">
    <div class=" flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Manage User') }}
      </h2>
      <a href="{{ route('admin.users.create') }}" class="p-[10px] bg-indigo-500 text-white">Create User</a>
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
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        <div class="p-6 text-gray-900">
          <table class="min-w-full bg-white border rounded-lg">
            <thead>
              <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-center">Role</th>
                <th class="py-3 px-6 text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
              <!-- Example row -->
              @forelse ($users as $user)
              <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                  <span class="font-medium">{{ $user->id }}</span>
                </td>
                <td class="py-3 px-6 text-left">
                  <span>{{ $user->name }}</span>
                </td>
                <td class="py-3 px-6 text-left">
                  <span>{{ $user->email }}</span>
                </td>
                <td class="py-3 px-6 text-center">
                  @if ($user->hasRole('admin'))
                  <span class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">Admin</span>
                  @elseif ($user->hasRole('pembeli'))
                  <span class="bg-orange-200 text-blue-600 py-1 px-3 rounded-full text-xs">Pembeli</span>
                  @elseif ($user->hasRole('vendor'))
                  <span class="bg-indigo-300 text-blue-600 py-1 px-3 rounded-full text-xs">Vendor</span>
                  @endif
                </td>
                <td class="py-3 px-6 text-center">
                  <div class="flex item-center justify-center space-x-4">
                    <a href="{{ route('admin.users.edit', $user) }}"
                      class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                    <form method="POST" action="{{ route('admin.users.destroy', $user)}}">
                      @csrf
                      @method('DELETE')
                      <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                    </form>

                  </div>
                </td>
              </tr>
              @empty

              @endforelse

              <!-- Additional rows can be added here -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>