@include('education.modals.edit-education')

<div class="grid mt-4 grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
    <div class="bg-white p-4 rounded-lg shadow space-y-3">
        <div class="flex items-center space-x-2 text-sm">
            <div><a href="#" class="font-bold text-blue-500 hover:underline">1</a>
            </div>
            <div class="text-gray-500 text:sm">JOMO KENYATTA UNIVERSITY OF AGRICULTURE AND TECHNOLOGY</div>
            
        </div>
        
        <div class="text-sm font-medium text-gray-600">
            Level of Study : Degree 
        </div>
        <div class="text-sm font-medium text-gray-600">
            Course :Computer Science 
        </div>
        <div class="text-sm font-medium text-gray-600">
            Award :Second Class honors(upper Division) 
        </div>
         <div class="text-sm font-medium text-gray-600">
            From : 16/10/2024 - To :16/10/2024
        </div>
        <div class="text-sm font-medium text-black">

  
          <div class="mt-6 flex justify-end">
            <a href="#" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 h-6"
            >{{ __('Delete') }}</a>
            <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 h-6 ms-3" x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-education')">{{ __('Edit') }}</a>s
           
        </div>


        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow space-y-3">
        <div class="flex items-center space-x-2 text-sm">
            <div><a href="#" class="font-bold text-blue-500 hover:underline">JKUAT/SNCLOUD_ENG</a>
            </div>
            <div class="text-gray-500">Senior Cloud Engineer</div>
            <div> <span
                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-gray-800 bg-gray-200 rounded-lg opacity-100">CLOSED</span>
            </div>
        </div>
        <div class="text-sm text-gray-700">Masters Degree in IT,Computer Science and 5 years experience
            in cloud Infrastructure</div>

        <div class="text-sm font-medium text-gray-600">
            Deadline : 16/10/2024
        </div>
        <div class="text-sm font-medium text-black">
            <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">Application
                closed</a>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow space-y-3">
        <div class="flex items-center space-x-2 text-sm">
            <div><a href="#" class="font-bold text-blue-500 hover:underline">JKUAT/NET_ADMN</a>
            </div>
            <div class="text-gray-500">Network Administrator</div>
            <div> <span
                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg opacity-100">OPEN</span>
            </div>
        </div>
        <div class="text-sm text-gray-700">Bachelors Degree in IT,Computer Science and 2 years
            experience in a busy ICT working environment</div>

        <div class="text-sm font-medium text-gray-600">
            Deadline : 16/10/2024
        </div>
        <div class="text-sm font-medium text-black">
            <a href="#" class="font-semibold hover:underline rounded-lg text-blue-900">Apply
                >></a>
        </div>
    </div>

</div>