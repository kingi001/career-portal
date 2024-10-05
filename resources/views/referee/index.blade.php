{{-- resources/views/applications/index.blade.php --}}
<x-app-layout>
    <div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
        <div class="p-6 bg-white border-b border-gray-100 rounded-lg">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Applications') }}
            </h2>

            <div class="mt-4">
                <table class="min-w-full bg-white border-gray-300 shadow-lg rounded-lg overflow-x-auto">
                    <thead class="bg-gray-50 border-b-2 border-gray-100">
                        <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Application ID</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">User Name</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Position</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Application Date</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-700">1</td>
                                <td class="p-3 text-sm text-gray-700">John Doe</td>
                                <td class="p-3 text-sm text-gray-700">Software Developer</td>
                                <td class="p-3 text-sm text-gray-700">2024-10-01</td>
                                <td class="p-3 text-sm text-gray-700">Received</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-700">2</td>
                                <td class="p-3 text-sm text-gray-700">Jane Smith</td>
                                <td class="p-3 text-sm text-gray-700">Project Manager</td>
                                <td class="p-3 text-sm text-gray-700">2024-10-02</td>
                                <td class="p-3 text-sm text-gray-700">Under Review</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-700">3</td>
                                <td class="p-3 text-sm text-gray-700">Alice Johnson</td>
                                <td class="p-3 text-sm text-gray-700">UX Designer</td>
                                <td class="p-3 text-sm text-gray-700">2024-10-03</td>
                                <td class="p-3 text-sm text-gray-700">Rejected</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-700">4</td>
                                <td class="p-3 text-sm text-gray-700">Bob Brown</td>
                                <td class="p-3 text-sm text-gray-700">Data Analyst</td>
                                <td class="p-3 text-sm text-gray-700">2024-10-04</td>
                                <td class="p-3 text-sm text-gray-700">Received</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-700">5</td>
                                <td class="p-3 text-sm text-gray-700">Charlie Green</td>
                                <td class="p-3 text-sm text-gray-700">Web Developer</td>
                                <td class="p-3 text-sm text-gray-700">2024-10-05</td>
                                <td class="p-3 text-sm text-gray-700">Interview Scheduled</td>
                            </tr>
                        </tbody> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
