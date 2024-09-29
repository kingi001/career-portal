<x-app-layout>
    
<div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="p-6 bg-white border-b border-gray-100 rounded-lg">

  
         <h2 class="text-lg font-medium text-gray-900">
            {{ __('Personal Information') }}
        </h2>

        <p class="mt-2 text-sm  text-gray-600">
            {{ __("Please provide your personal information with accuracy.") }}
        </p>

  <form method="PUT" action="">
    @csrf
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-1">

        <div>
            <x-input-label for="name" :value="__('Sir Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter sir Name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

         <div>
            <x-input-label for="name" :value="__('Other_Names')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Other Names"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

  
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4">

        <div>
            <x-input-label for="name" :value="__('Email')" />
            <x-text-input id="name" name="name" type="email" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" placeholder="user@gmail.com"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

         <div>
            <x-input-label for="name" :value="__('Phone Number')" />
            <x-text-input id="name" name="name" type="number" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" placeholder="0712123654"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>  
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4">

        <div>
            <x-input-label for="name" :value="__('Date Of Birth')" />
            <x-text-input id="name" name="name" type="date" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

         <div>
            <x-input-label for="name" :value="__('Gender')" />
            <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" id="assignedSocialWorker" name="assignedSocialWorker" required>
                <option value="" class="text-sm">Select Gender</option>
               
                    <option value="" >Male</option>
                    <option value="" >Female</option>

              
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Maritial Status')" />
            <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" id="assignedSocialWorker" name="assignedSocialWorker" required>
                <option value="" class="text-sm">Select Maritial Status</option>
               
                    <option value="" >Single</option>
                    <option value="" >Married</option>

              
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
         <div>
            <x-input-label for="name" :value="__('National ID Number')" />
            <x-text-input id="name" name="name" type="number" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>



        

     
  
    </div>
<p class="mt-5 text-sm  text-gray-600">
            {{ __("Please provide your physical adrress information with accuracy.") }}
        </p> 

       <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4">

        <div>
            <x-input-label for="name" :value="__('Nationality')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" placeholder="i.e Kenyan"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

         <div>
            <x-input-label for="name" :value="__('County')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

    
  
    </div>

       <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4">

        <div>
            <x-input-label for="name" :value="__('Sub-county')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

         <div>
            <x-input-label for="name" :value="__('Ethnicity')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

    
  
    </div>

      <div class="mt-5 flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>


  
  
    </div>



  </form>

</div>
</div>

</x-app-layout>
