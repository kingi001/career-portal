<x-app-layout>
<div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="p-6 bg-white border-b border-gray-100 rounded-lg">


     <h2 class="text-lg font-medium text-gray-900">
            {{ __('Education Background') }}  
        </h2>
        <p class="mt-2 text-sm  text-gray-600">
            {{ __("Please provide your educational information with the most recent.") }}
        </p>
        <x-primary-button class="bg-blue-900 h-6 mt-2 align-left" 
              x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'add-education')"
    >{{ __('Add Education') }}
        </x-primary-button>
        <x-modal name="add-education"  focusable>
        <form method="post" action="#" class="p-6">
            @csrf
           

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Add Education') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Please provide your educational information with the most recent..') }}
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-1 pt-3">

             <div>
            <x-input-label for="name" :value="__('Institution')" />
            <x-text-input id="name" name="name" type="text" class=" block w-full text-sm" :value="old('name')" required autofocus autocomplete="name" placeholder="Name of Institution" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

         <div>
            <x-input-label for="name" :value="__('Level of Study')" />
            <select class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" id="assignedSocialWorker" name="assignedSocialWorker" required>
                <option value="" class="text-sm">Select Level</option>
               
                    <option value="" >PhD</option>
                    <option value="" >Masters</option>
                    <option value="" >Degree</option>
                    <option value="" >Diploma</option>
                    <option value="" >Certificate</option>
                    <option value="" >KCSE</option>              
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Field of Study')" />
            <x-text-input id="name" name="name" type="text" class=" block w-full text-sm" :value="old('name')" required autofocus autocomplete="name" placeholder="Field of Study i.e Computer Science" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Award')" />
            <select class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" id="assignedSocialWorker" name="assignedSocialWorker" required>
                <option value="" class="text-sm">Select Award</option>
               
                    <option value="" >First Class</option>
                    <option value="" >Second Class hnr(Upper)</option>
                    <option value="" >Second Class hnr(Lower)</option>
                    <option value="" >Pass</option>
                    <option value="" >Distinction</option>
                    <option value="" >Credit</option>              
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
         <div>
            <x-input-label for="name" :value="__('Start Date')" />
            <x-text-input id="name" name="name" type="date" class="mt-1 block text-sm w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('End Date')" />
            <x-text-input id="name" name="name" type="date" class="mt-1 block text-sm w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

               
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="h-7">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="bg-blue-900 h-7  ms-3">
                    {{ __('Save') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>


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
                     
                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('Are you sure you want to delete this education?');">Delete</button>
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
                     
                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('Are you sure you want to delete this education?');">Delete</button>
                    </form>
                </td>
            </tr>
   
    </tbody>
</table>

</div>
</div>

<div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="p-4 bg-white border-b border-gray-100 rounded-lg">

     <h2 class="text-lg font-medium text-gray-900">
            {{ __('Professional Certifications') }}

        </h2>

        <p class="mt-2 text-sm  text-gray-600">
            {{ __("Professional certifications like CISA,CPA.") }}  
        </p>
        <x-primary-button class="bg-blue-900 h-6 mt-2 align-left" >{{ __('Add Professional Certification') }}</x-primary-button>




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
                     
                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('Are you sure you want to delete this education?');">Delete</button>
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
                     
                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('Are you sure you want to delete this education?');">Delete</button>
                    </form>
                </td>
            </tr>
   
    </tbody>

                            
</table>

</div>
</div>

<!-- ADDING EDUCATION MODAL -->

<!-- Modal Structure -->
<div id="educationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Add Education</h3>
            <div class="mt-2">
                <form id="educationForm" action=" " method="POST">
                    @csrf
                    <!-- Education Level -->
                    <div class="mt-4">
                        <label for="level" class="block text-sm font-medium text-gray-700">Education Level</label>
                        <input type="text" name="level" id="level" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <!-- Institution Name -->
                    <div class="mt-4">
                        <label for="institution" class="block text-sm font-medium text-gray-700">Institution Name</label>
                        <input type="text" name="institution" id="institution" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <!-- Year of Graduation -->
                    <div class="mt-4">
                        <label for="graduation_year" class="block text-sm font-medium text-gray-700">Year of Graduation</label>
                        <input type="number" name="graduation_year" id="graduation_year" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save</button>
                        <button type="button" onclick="toggleModal('educationModal')" class="bg-red-500 text-white px-4 py-2 rounded-md">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
    }
</script>


</x-app-layout>