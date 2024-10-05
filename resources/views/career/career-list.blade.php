<x-app-layout>
    <div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
        <div class="p-6 bg-white border-b border-gray-100 rounded-lg overflow-x-auto">
            
            <h2 class="text-lg font-medium text-gray-900">
                <i class="fas fa-briefcase"></i>
                {{ __('Career Background') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Please provide your job history starting with the most recent.') }}
            </p>
            <x-primary-button class="bg-blue-900 h-6 mt-2 align-left" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-career')">{{ __('Add Job History') }}
            </x-primary-button>

            {{-- @include('career.modals.add-career')

            @include("career.responsive-list") --}}

            <div class="overflow-auto rounded-lg shadow hidden md:block">
                <table class="mt-4 min-w-full bg-white border-gray-300 shadow-lg rounded-lg overflow-x-auto">
                    <thead class="bg-gray-50 border-b-2 border-gray-100">
                        <tr>
                            <th>ID</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Company</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Position</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Start Date</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">End Date</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Responsibilities</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">1</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">iMedia Africa</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">ICT Technician</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Jan 2020</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Dec 2021</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Managed IT infrastructure and trained staff on new systems.
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action="#" method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this job?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Kenya Ports Authority</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">ICT Attaché</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Feb 2019</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Sept 2019</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Assisted in installation of network infrastructure and maintenance.
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action="#" method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this job?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">3</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Safaricom PLC</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Network Engineer</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Jan 2018</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Dec 2018</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Designed and implemented corporate network solutions.
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action="#" method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this job?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">4</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Equity Bank</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Systems Administrator</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Feb 2017</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Dec 2017</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Managed banking systems .
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action="#" method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this job?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">5</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Google</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Software Engineer</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Jan 2016</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Dec 2016</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Developed scalable cloud-based software applications.
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action="#" method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this job?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">6</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Microsoft</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Technical Support Specialist</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Feb 2015</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Jan 2016</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Provided technical support and troubleshooting .
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action="#" method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this job?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
