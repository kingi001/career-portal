<x-app-layout>
    <div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">

            <!-- Section Header -->
            <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                <i class="fas fa-file-alt text-blue-900"></i> {{ __('Job Application') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Select the job you want to apply for and submit your application.') }}
            </p>

            <!-- Job Selection -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Select Job Position</label>
                <select class="mt-1 block w-full text-sm p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option>Software Developer</option>
                    <option>Network Administrator</option>
                    <option>Cybersecurity Analyst</option>
                </select>
            </div>

            <!-- Submit Application Button -->
            <button class="mt-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 text-sm rounded-md shadow-md flex items-center gap-2">
                <i class="fas fa-paper-plane"></i> Submit Application
            </button>

            <!-- CV Generator (Hardcoded for now) -->
            <div class="mt-6 p-4 bg-gray-100 border border-gray-300 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                    <i class="fas fa-file-pdf text-red-500"></i> Generate CV (Preview Mode)
                </h3>
                <p class="text-sm text-gray-600">Click below to generate a CV based on your input.</p>
                <button class="mt-3 text-sm bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-md flex items-center gap-2">
                    <i class="fas fa-download"></i> Download CV (Preview)
                </button>
            </div>

            <!-- Application Status -->
            <div class="mt-6">
                <h3 class="text-md font-semibold text-gray-700 flex items-center gap-2">
                    <i class="fas fa-info-circle text-blue-500"></i> Application Status
                </h3>
                <p class="mt-1 text-sm text-gray-600">Your application is currently:</p>
                <span class="inline-block mt-2 px-3 py-1 text-sm font-medium text-white bg-yellow-500 rounded-full">Pending</span>
            </div>
        </div>
    </div>
</x-app-layout>
