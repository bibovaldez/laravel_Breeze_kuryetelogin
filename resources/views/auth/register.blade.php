
<x-guest-layout x-data="{ personalForm: true, addressForm: false, meterForm: false, emailForm: false }">

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Personal form -->
        <div x-show="personalForm">
            <!-- First Name -->
            <div>
                <x-input-label for="fname" :value="__('First Name')" />
                <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')"
                    required autofocus autocomplete="given-name" />
                <x-input-error :messages="$errors->get('fname')" class="mt-2" />
            </div>
            <!-- Middle Name -->
            <div class="mt-4">
                <x-input-label for="mname" :value="__('Middle Name')" />
                <x-text-input id="mname" class="block mt-1 w-full" type="text" name="mname" :value="old('mname')"
                    required autofocus autocomplete="additional-name" />
                <x-input-error :messages="$errors->get('mname')" class="mt-2" />
            </div>
            <!-- Last Name -->
            <div class="mt-4">
                <x-input-label for="lname" :value="__('Last Name')" />
                <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')"
                    required autofocus autocomplete="family-name" />
                <x-input-error :messages="$errors->get('lname')" class="mt-2" />
            </div>
            <!-- Phone Number -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone Number')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required autofocus autocomplete="tel" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <!-- Button next -->
            
        </div>

        <!-- Address form -->
        <div x-show="addressForm">
            <!-- Province Dropdown -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Province')" />
                <select id="provinceSelect" name="province"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 w-full">
                    <option value="" disabled selected>Select Province</option>
                </select>
            </div>

            <!-- Municipality Dropdown -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Municipality')" />
                <select id="municipalitySelect" name="municipality"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 w-full">
                    <option value="" disabled selected>Select Municipality</option>
                </select>
            </div>

            <!-- Barangay Dropdown -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Barangay')" />
                <select id="barangaySelect" name="barangay"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 w-full">
                    <option value="" disabled selected class="text-gray-400">Select Barangay</option>
                </select>
            </div>
        </div>

        <!-- Meter form -->
        <div>

        </div>

        <!-- Email form -->
        <div x-show="emailForm">
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
    
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>


        

    </form>

</x-guest-layout>
