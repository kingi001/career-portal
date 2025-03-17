<!-- ADD Professional Body Modal -->
<div x-data="{ open: false }" @open-modal.window="if ($event.detail.modal === 'add-professional-body') open = true" x-cloak>
    <div class="mt-4 flex justify-end">
        <button @click="open = true"
            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
            <i class="fas fa-plus-circle text-xs"></i> {{ __('Add Professional Membership') }}
        </button>
    </div>

    <!-- Modal Overlay -->
    <div x-show="open" class="fixed inset-0 mt-4 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 transition-opacity duration-300"
        x-transition.opacity>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-xl transform transition-all duration-300 scale-95"
            x-show="open" x-transition.scale.90>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-2 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-user-tie"></i> Add Professional Membership
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300 transition-colors duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" action="{{ route('memberships.store') }}" class="p-5 space-y-4">
                @csrf

                <p class="text-sm text-gray-700">
                    Please provide details of your professional memberships, starting with the most recent.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="professional_body" :value="__('Professional Body')" />
                        <x-text-input id="professional_body" name="professional_body" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('professional_body')" required placeholder="e.g. IHRM,KIM,KISM,ICPAK" />
                        <x-input-error class="mt-2" :messages="$errors->get('professional_body')" />
                    </div>

                    <div>
                        <x-input-label for="membership_no" :value="__('Membership No')" />
                        <x-text-input id="membership_no" name="membership_no" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('membership_no')" required placeholder="e.g. 12345678" />
                        <x-input-error class="mt-2" :messages="$errors->get('membership_no')" />
                    </div>

                    <div>
                        <x-input-label for="date_renewed" :value="__('Date Renewed')" />
                        <x-text-input id="date_renewed" name="date_renewed" type="date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('date_renewed')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('date_renewed')" />
                    </div>

                    <div>
                        <x-input-label for="next_renewal_date" :value="__('Next Renewal Date')" />
                        <x-text-input id="expiry_date" name="expiry_date" type="date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('expiry_date')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('expiry_date')" />
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
                        <i class="fas fa-save"></i> {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
