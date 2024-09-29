<x-app-layout>
 
    <div class="py-4 container max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        

        <!-- Main Content -->
        <main class="col-span-4 bg-white p-4 rounded-md shadow">
            <h2 class="text-xl font-semibold mb-4 uppercase">Welcome to your Dashboard!</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4 bg-blue-100 rounded-md shadow">
                    <h3 class="font-bold text-blue-800">Active Applications</h3>
                    <p class="text-sm mt-2">You have 3 active applications.</p>
                </div>
                <div class="p-4 bg-green-100 rounded-md shadow">
                    <h3 class="font-bold text-green-800">Jobs Applied</h3>
                    <p class="text-sm mt-2">You have 1 Applied jobs.</p>
                </div>
                <div class="p-4 bg-yellow-100 rounded-md shadow">
                    <h3 class="font-bold text-yellow-800">Status</h3>
                    <p class="text-sm mt-2">Application Recieved </p>
                </div>
            </div>
        </main>
    </div>
</div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 font-semibold text-gray-900">
                    {{ __("Job Listings") }}


                </div>
                <div class="overflow-auto rounded-lg shadow hidden md:block">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-100">
                    <tr>
                        <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Reference_No</th>
                        <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Position</th>

                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Description</th>
                       
                        <th class="w-28 p-3 text-sm font-semibold tracking-wide text-left">Date Posted</th>
                        <th class="w-28 p-3 text-sm font-semibold tracking-wide text-left">Deadline</th>
                         <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Action</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">
                    <tr class="bg-white">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap"><a href="#"
                                class="font-bold text-blue-500 hover:underline">JKUAT/ICT_II</a></td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">ICT OFFICER II</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Bachelors Degree in IT,Computer Science <br>and 2 years experience in a busy ICT working environment
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/05/2024</td>
                                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/08/2024</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg opacity-200">open</span>
                        </td>
                        
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">                   <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">Apply >></a>
</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap"><a href="#"
                                class="font-bold text-blue-500 hover:underline">JKUAT/SNCLOUD_ENG</a></td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">SENIOR CLOUD ENGINEER</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Masters Degree in IT,Computer Science <br>and 5 years experience in cloud Infrastructure
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/05/2024</td>
                                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/08/2024</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-gray-800 bg-gray-200 rounded-lg opacity-50">Closed</span>
                        </td>
                        
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">               <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">Apply >></a>
</td>
                    </tr>
                    <tr class="bg-white">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap"><a href="#"
                                class="font-bold text-blue-500 hover:underline">JKUAT/NET_ADMN</a></td>
                              <td class="p-3 text-sm text-gray-700 whitespace-nowrap">NETWORK ADMINISTRATOR</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Bachelors Degree in IT,Computer Science and CCNA <br>and 2 years experience in Networking environment
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/05/2024</td>
                                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/08/2024</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg opacity-200">open</span>
                        </td>
                        
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap"> 
                   <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">Apply >></a>
        </td>
                    </tr>
                </tbody>
            </table>

        </div>


        <!-- responsive columns -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
            <div class="bg-white p-4 rounded-lg shadow space-y-3">
                <div class="flex items-center space-x-2 text-sm">
                    <div><a href="#" class="font-bold text-blue-500 hover:underline">JKUAT/ICT_II</a></div>
                    <div class="text-gray-500">ICT OFFICER</div>
                    <div> <span
                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg opacity-100">OPEN</span>
                    </div>
                </div>
                <div class="text-sm text-gray-700">Bachelors Degree in IT,Computer Science and 2 years experience in a busy ICT working environment</div>

                <div class="text-sm font-medium text-gray-600">
                    Deadline : 16/10/2024
                </div>
                <div class="text-sm font-medium text-black">
                    <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">Apply >></a>                   
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow space-y-3">
                <div class="flex items-center space-x-2 text-sm">
                    <div><a href="#" class="font-bold text-blue-500 hover:underline">JKUAT/SNCLOUD_ENG</a></div>
                    <div class="text-gray-500">Senior Cloud Engineer</div>
                    <div> <span
                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-gray-800 bg-gray-200 rounded-lg opacity-100">CLOSED</span>
                    </div>
                </div>
                <div class="text-sm text-gray-700">Masters Degree in IT,Computer Science and 5 years experience in cloud Infrastructure</div>

                <div class="text-sm font-medium text-gray-600">
                    Deadline : 16/10/2024
                </div>
                <div class="text-sm font-medium text-black">
                    <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">Application closed</a>                   
                </div>
            </div>

          <div class="bg-white p-4 rounded-lg shadow space-y-3">
                <div class="flex items-center space-x-2 text-sm">
                    <div><a href="#" class="font-bold text-blue-500 hover:underline">JKUAT/NET_ADMN</a></div>
                    <div class="text-gray-500">Network Administrator</div>
                    <div> <span
                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg opacity-100">OPEN</span>
                    </div>
                </div>
                <div class="text-sm text-gray-700">Bachelors Degree in IT,Computer Science and 2 years experience in a busy ICT working environment</div>

                <div class="text-sm font-medium text-gray-600">
                    Deadline : 16/10/2024
                </div>
                <div class="text-sm font-medium text-black">
                    <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">Apply >></a>                   
                </div>
            </div>

        </div>
            </div>
        </div>
    </div>

<div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 font-semibold text-gray-900">
                    {{ __("Job Applied") }}
                </div>
                <div class="overflow-auto rounded-lg shadow hidden md:block">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-100">
                     <tr>
                        <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Reference_No</th>
                        <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Position</th>

                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Description</th>
                       
                        <th class="w-28 p-3 text-sm font-semibold tracking-wide text-left">Date Posted</th>
                        <th class="w-28 p-3 text-sm font-semibold tracking-wide text-left">Deadline</th>
                         <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Action</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">
                   <tr class="bg-white">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap"><a href="#"
                                class="font-bold text-blue-500 hover:underline">JKUAT/NET_ADMN</a></td>
                              <td class="p-3 text-sm text-gray-700 whitespace-nowrap">NETWORK ADMINISTRATOR</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Bachelors Degree in IT,Computer Science and CCNA <br>and 2 years experience in Networking environment
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/05/2024</td>
                                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/08/2024</td>

                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg opacity-200">APPLIED</span>
                        </td>
                        
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap"> 
                   <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">View  >></a>
        </td>
                    </tr>
                    
                </tbody>
            </table>

        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
            <div class="bg-white p-4 rounded-lg shadow space-y-3">
                <div class="flex items-center space-x-2 text-sm">
                    <div><a href="#" class="font-bold text-blue-500 hover:underline">JKUAT/ICT_II</a></div>
                    <div class="text-gray-500">ICT OFFICER</div>
                    <div> <span
                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg opacity-50">APPLIED</span>
                    </div>
                </div>
                <div class="text-sm text-gray-700">Bachelors Degree in IT,Computer Science and 2 years experience in a busy ICT working environment</div>

                <div class="text-sm font-medium text-gray-600">
                    Deadline : 16/10/2024
                </div>
                <div class="text-sm font-medium text-black">
                    <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">View >></a>                   
                </div>
            </div>

         

        </div>
            </div>
        </div>
    </div>







</x-app-layout>
