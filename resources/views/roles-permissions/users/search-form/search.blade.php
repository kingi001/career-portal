<div x-data="{ showForm: false }" class="w-full">

    <!-- Search Button to toggle form visibility -->
    <button @click="showForm = !showForm"
            class="bg-blue-600 text-white py-2 px-4 rounded-md mb-4 hover:bg-blue-700 transition duration-200">
        <i class="fa fa-search"></i> Search
    </button>

    <!-- Container for the search form -->
    <div x-show="showForm" x-transition class="bg-white p-6 rounded-lg shadow-lg space-y-4">

        <form method="GET" action="{{ url('users') }}" id="search-form" class="form-horizontal space-y-4">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- User Role -->
                <div class="flex justify-center space-x-4 mb-4">
                    <div class="w-auto">
                        <x-input-label for="user_role_id" :value="__('User Role')" />
                        <select id="user_role_id" name="user_role_id" aria-label="Select User Role"
                                class="form-control text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-auto">
                            <option value="" disabled selected>Select role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="w-auto">
                        <x-input-label for="data-opt" :value="__('Status')" />
                        <select id="data-opt" name="data-opt" aria-label="Select User Status"
                                class="form-control text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-auto">
                            <option value="" disabled selected>Select status</option>
                            <option value="active">Active</option>
                            <option value="deleted">Deleted</option>
                        </select>
                    </div>
                </div>

            </div>

            <!-- Buttons -->
            <div class="mt-4 flex justify-between items-center space-x-4">
                <!-- Reset Button -->
                <button type="button" class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-500 transition duration-200"
                        @click="showForm = false">
                    <i class="fa fa-repeat"></i> Reset
                </button>

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                    <i class="fa fa-search"></i> Search
                </button>
            </div>

        </form>

    </div>
</div>
