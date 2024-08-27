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

                        <div class="mt-4">
                                <x-input-label label for="" :value="(__('Area'))"/>
                                <select class="block mt-1 w-full" id="area" name="area" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="KL">KL</option>
                                    <option value="JOHOR">Johor</option>
                                </select>
                            </div>


                    <div class="form-group">
                    <x-input-label label for="" :value="(__('Project'))"/>
                    <select class="block mt-1 w-full" id="project" name="project" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="AERO-KL">AERO-KL</option>
                                    <option value="ARAS-JOHOR">ARAS-JOHOR</option>
                                    <option value="AERO-JOHOR">AERO-JOHOR</option>
                                </select>
                            </div>



                    <div class="form-group">
                    <x-input-label label for="" :value="(__('Company'))"/>
                    <select class="block mt-1 w-full" id="company" name="company" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="Aerosynergy Solutiosn Sdn. Bhd">Aerosynergy Solutiosn Sdn. Bhd</option>
                                    <option value="ARAS KEJURUTERAAN SDN. Bhd">ARAS KEJURUTERAAN SDN. Bhd</option>
                                   
                                </select>
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
</x-guest-layout>
