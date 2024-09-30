<x-app-layout>
    <div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
        <div class="p-6 bg-white border-b border-gray-100 rounded-lg overflow-x-auto">


            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Education Background') }}
            </h2>
            <p class="mt-2 text-sm  text-gray-600">
                {{ __('Please provide your educational information with the most recent.') }}
            </p>
            <x-primary-button class="bg-blue-900 h-6 mt-2 align-left" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-education')">{{ __('Add Education') }}
            </x-primary-button>
            
            @include('education.modals.add-education')

            @include("education.responsive-list")

            <div class="overflow-auto rounded-lg shadow hidden md:block">
            <table class="mt-4 min-w-full bg-white border-gray-300 shadow-lg rounded-lg overflow-x-auto">
                <thead class="bg-gray-50 border-b-2 border-gray-100">
                    <tr>
                        <th>ID</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Institution</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Degree</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Field of Study</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Award</th>



                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Start Date</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">End Date</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">1</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">JKUAT</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Bachelor</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Information Technology</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Second Class(upper)</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">20/2/2021</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">21/8/2024</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <a href=" " class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action=" " method="POST" class="inline">

                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                    onclick="return confirm('Are you sure you want to delete this education?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">JKUAT</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Diploma</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Information Technology</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Credit</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">20/2/2021</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">21/8/2024</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <a href=" " class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action=" " method="POST" class="inline">

                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                    onclick="return confirm('Are you sure you want to delete this education?');">Delete</button>
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>
            </div>

        </div>
    </div>
{{-- Professional Certification Section --}}
    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
        <div class="p-4 bg-white border-b border-gray-100 rounded-lg overflow-x-auto">

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Professional Certifications') }}

            </h2>

            <p class="mt-2 text-sm  text-gray-600">
                {{ __('Professional certifications like CISA,CPA.') }}
            </p>
            <x-primary-button
                class="bg-blue-900 h-6 mt-2 align-left">{{ __('Add Professional Certification') }}</x-primary-button>
                @include("education.responsive-list")




                <div class="overflow-auto rounded-lg shadow hidden md:block">
            <table class="mt-4 min-w-full bg-white border-gray-300 shadow-lg rounded-lg overflow-auto">
                <thead class="bg-gray-50 border-b-2 border-gray-100">
                    <tr>
                        <th>ID</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Institution</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Degree</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Field of Study</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Award</th>

                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Start Date</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">End Date</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">1</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">JKUAT</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Bachelor</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Information Technology</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Second Class(upper)</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">20/2/2021</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">21/8/2024</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <a href=" " class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action=" " method="POST" class="inline">

                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                    onclick="return confirm('Are you sure you want to delete this education?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">JKUAT</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Diploma</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Information Technology</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Credit</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">20/2/2021</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">21/8/2024</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <a href=" " class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action=" " method="POST" class="inline">

                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                    onclick="return confirm('Are you sure you want to delete this education?');">Delete</button>
                            </form>
                        </td>
                    </tr>

                </tbody>


            </table>
                </div>

        </div>
    </div>




</x-app-layout>
