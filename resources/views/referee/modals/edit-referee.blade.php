<div x-data="{ open: false, referee: {} }"
     @open-modal.window="if ($event.detail.modal === 'edit-referee') { open = true; referee = $event.detail.referee; }"
     x-cloak>

    <!-- Modal Overlay -->
    <div x-show="open" class="fixed inset-0 mt-4 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 transition-opacity duration-300"
         x-transition.opacity>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-xl transform transition-all duration-300 scale-95"
             x-show="open" x-transition.scale.90>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-2 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-user-tie"></i> Edit Referee
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300 transition-colors duration-200">
                    <i class="fas fa-times text-xl text-blue-400"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" :action="'/referees/' + referee.id" class="p-5 space-y-4">
                @csrf
                @method('PUT')

                <p class="text-sm text-gray-700 flex items-center gap-2">
                    <i class="fas fa-info-circle text-blue-400"></i> Update the referee details below.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="full_name" :value="__('Full Name')" />
                        <div class="relative">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <x-text-input id="full_name" name="full_name" type="text"
                                          class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                                          x-model="referee.full_name" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('full_name')" />
                    </div>

                    <div>
                        <x-input-label for="job_title" :value="__('Job Title')" />
                        <div class="relative">
                            <i class="fas fa-briefcase absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <x-text-input id="job_title" name="job_title" type="text"
                                          class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                                          x-model="referee.job_title" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
                    </div>

                    <div>
                        <x-input-label for="company" :value="__('Company / Organization')" />
                        <div class="relative">
                            <i class="fas fa-building absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <x-text-input id="company" name="company" type="text"
                                          class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                                          x-model="referee.company" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('company')" />
                    </div>

                    <div>
                        <x-input-label for="phone" :value="__('Phone Number')" />
                        <div class="relative">
                            <i class="fas fa-phone-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <x-text-input id="phone" name="phone" type="text"
                                          class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                                          x-model="referee.phone" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-input-label for="email" :value="__('Email Address')" />
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <x-text-input id="email" name="email" type="email"
                                          class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                                          x-model="referee.email" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                </div>

                <!-- Modal Footer (Buttons) -->
                <div class="mt-5 flex justify-end space-x-4">
                    <button type="button" @click="open = false"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-times"></i> {{ __('Cancel') }}
                    </button>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-save"></i> {{ __('Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
