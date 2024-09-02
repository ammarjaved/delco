<x-guest-layout>
    <div class="text-center">
        <img src="{{URL::asset('assets/web-images/main-logo.png')}}" alt="" height="60" srcset="" class="" style="height: 60px !important ; margin:5% auto">
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Area -->
        <div class="mt-4">
            <x-input-label for="area" :value="__('Area')" />
            <select id="area" name="area" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required onchange="updateProjectAndCompany()">
                <option value="">Select Area</option>
                <option value="KL">KL</option>
                <option value="JOHOR">Johor</option>
            </select>
            <x-input-error :messages="$errors->get('area')" class="mt-2" />
        </div>

        <!-- Project -->
        <div class="mt-4">
            <x-input-label for="project" :value="__('Project')" />
            <select id="project" name="project" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required onchange="updateCompany()">
                <option value="">Select Project</option>
            </select>
            <x-input-error :messages="$errors->get('project')" class="mt-2" />
        </div>

        <!-- Company -->
        <div class="mt-4">
            <x-input-label for="company" :value="__('Company')" />
            <select id="company" name="company" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="">Select Company</option>
            </select>
            <x-input-error :messages="$errors->get('company')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function updateProjectAndCompany() {
            const area = document.getElementById('area').value;
            const project = document.getElementById('project');
            const company = document.getElementById('company');

           
            project.innerHTML = '<option value="">Select Project</option>';
            company.innerHTML = '<option value="">Select Company</option>';

            if (area === 'KL') {
                
                project.innerHTML += '<option value="AERO-KL">AERO-KL</option>';
                company.innerHTML += '<option value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</option>';

                
                project.value = 'AERO-KL';
                company.value = 'Aerosynergy Solutions Sdn. Bhd';
            } else if (area === 'JOHOR') {
               
                project.innerHTML += '<option value="ARAS-JOHOR">ARAS-JOHOR</option>';
                project.innerHTML += '<option value="AERO-JOHOR">AERO-JOHOR</option>';
            }
        }

        function updateCompany() {
            const project = document.getElementById('project').value;
            const company = document.getElementById('company');

           
            company.innerHTML = '<option value="">Select Company</option>';

            if (project === 'AERO-JOHOR') {
                company.innerHTML += '<option value="Aerosynergy Solutions Sdn. Bhd">Aerosynergy Solutions Sdn. Bhd</option>';
                company.value = 'Aerosynergy Solutions Sdn. Bhd';
            } else if (project === 'ARAS-JOHOR') {
                company.innerHTML += '<option value="ARAS KEJURUTERAAN SDN. Bhd">ARAS KEJURUTERAAN SDN. Bhd</option>';
                company.value = 'ARAS KEJURUTERAAN SDN. Bhd';
            }
        }
    </script>
</x-guest-layout>
