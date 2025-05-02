<x-app-layout>
    <div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-200">
                <h3 class="text-base font-medium text-indigo-700 flex items-center gap-2">
                    <i class="fas fa-user-shield text-blue-600 text-base"></i>
                    {{ __('Manage Permissions for Role') }}
                </h3>
                <p class="text-lg font-medium text-gray-600 flex items-center">
                    <i class="fas fa-user-tag text-green-600 mr-2"></i>
                    <span class="font-medium text-xs uppercase text-gray-800">{{ $role->name }}</span>
                </p>
            </div>
            <form action="{{ route('roles.givePermissions', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-key text-yellow-500 mr-2"></i> Available Permissions:
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-1 border p-1 rounded-lg text-sm bg-gray-50">
                        @foreach($permissions as $permission)
                            <label class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                       class="text-blue-500 focus:ring-blue-400 rounded text-sm"
                                       @if($role->permissions->contains($permission->id)) checked @endif>
                                <i class="fas fa-lock text-gray-500"></i>
                                <span class="text-gray-700">{{ $permission->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <a href="{{ route('roles.index') }}" class="px-4 py-1 text-sm bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                    <button type="submit" class="px-5 py-1 text-sm bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 flex items-center">
                        <i class="fas fa-save mr-2"></i> Save Permissions
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
