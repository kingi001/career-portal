<x-app-layout>
    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
        <div class="p-2 bg-white border-b border-gray-100 rounded-lg overflow-x-auto">

            <h2 class="text-lg font-medium text-gray-900">
                <i class="fas fa-graduation-cap"></i>
                {{ __('Education Background') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Please provide your educational information with the most recent.') }}
            </p>
           
            
            @include('education.modals.add-education')

            {{-- @include("education.responsive-list") --}}

            <div class="overflow-auto rounded-lg shadow hidden md:block">
                
                <table class="mt-4 min-w-full bg-white border-gray-300 shadow-lg rounded-lg overflow-x-auto">
                    <thead class="bg-gray-50 border-b-2 border-gray-100">
                        <tr>
                            
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Institution</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Degree</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Field of Study</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Award</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Start Date</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">End Date</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($educations as $education)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-school mr-1"></i> {{ $education->institution }}</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-graduation-cap mr-1"></i>{{ $education->level_of_study }}</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-book mr-1"></i> {{ $education->field_of_study }}</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">{{ $education->award }}</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">{{$education->start_date}}</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">{{$education->end_date}}</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">
                                <a href=" " class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action=" " method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this education?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
               
            </div>
            <x-primary-button class="bg-blue-900 h-6 mt-2 align-left justify-end" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-education')">{{ __('Add Education') }}
        </x-primary-button>
        </div>
     
    </div>

    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
        <div class="p-2 bg-white border-b border-gray-100 rounded-lg overflow-x-auto">

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Professional Certifications') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Professional certifications like CISA, CPA.') }}
            </p>
            
            @include("education.responsive-list")

            <div class="overflow-auto rounded-lg shadow hidden md:block">
                <table class="mt-4 min-w-full bg-white border-gray-300 shadow-lg rounded-lg overflow-auto">
                    <thead class="bg-gray-50 border-b-2 border-gray-100">
                        <tr>
                            <th>ID</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Institution</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Degree</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Field of Study</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Award</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Start Date</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">End Date</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">1</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-school mr-1"></i> JKUAT</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-graduation-cap mr-1"></i> Bachelor</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-book mr-1"></i> Information Technology</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">Second Class (upper)</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">20/2/2021</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">21/8/2024</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">
                                <a href=" " class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action=" " method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this education?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">2</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-school mr-1"></i> JKUAT</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-graduation-cap mr-1"></i> Bachelor</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-book mr-1"></i> Information Technology</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">Second Class (upper)</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">20/2/2021</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">21/8/2024</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">
                                <a href=" " class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action=" " method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this education?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">3</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-school mr-1"></i> JKUAT</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-graduation-cap mr-1"></i> Bachelor</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-book mr-1"></i> Information Technology</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">Second Class (upper)</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">20/2/2021</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">21/8/2024</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">
                                <a href=" " class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action=" " method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this education?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">4</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-school mr-1"></i> JKUAT</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-graduation-cap mr-1"></i> Bachelor</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-book mr-1"></i> Information Technology</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">Second Class (upper)</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">20/2/2021</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">21/8/2024</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">
                                <a href=" " class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action=" " method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this education?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">5</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-school mr-1"></i> JKUAT</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-graduation-cap mr-1"></i> Diploma</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap"><i class="fas fa-book mr-1"></i> Information Technology</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">Credit</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">20/2/2021</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">21/8/2024</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">
                                <a href=" " class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <form action=" " method="POST" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                        onclick="return confirm('Are you sure you want to delete this education?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <x-primary-button
                class="bg-blue-900 h-6 mt-2 align-left">{{ __('Add Professional Certification') }}
            </x-primary-button>

        </div>
    </div>
</x-app-layout>
