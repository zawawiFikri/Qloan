<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="registrationForm">
        @csrf

        <div id="formPart1">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            
            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" class="block mt-1 w-full form-select" name="gender" required autocomplete="gender">
                    <option selected disabled>{{ __('Pilih Jenis Kelamin') }}</option>
                    <option value="Laki-laki" {{ (isset($user) && $user->gender === 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ (isset($user) && $user->gender === 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat')" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            <!-- Nomer TLP -->
            <div class="mt-4">
                <x-input-label for="no_tlp" :value="__('Nomer Hp(WA)')" />
                <x-text-input id="no_tlp" class="block mt-1 w-full" type="number" name="no_tlp" :value="old('no_tlp')" required />
                <x-input-error :messages="$errors->get('no_tlp')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Sudah mendaftar?') }}
                </a>
                <x-primary-button class="ms-4" type="button" id="nextButton">
                    {{ __('Next') }}
                </x-primary-button>
            </div>
        </div>

        <div id="formPart2" style="display: none;">
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
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <x-primary-button type="button" id="backButton">
                    {{ __('Back') }}
                </x-primary-button>
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
            <input type="hidden" name="roles" value="customer">
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nextButton = document.getElementById('nextButton');
            const backButton = document.getElementById('backButton');
            const formPart1 = document.getElementById('formPart1');
            const formPart2 = document.getElementById('formPart2');

            nextButton.addEventListener('click', function () {
                localStorage.setItem('name', document.getElementById('name').value);
                localStorage.setItem('gender', document.getElementById('gender').value);
                localStorage.setItem('no_tlp', document.getElementById('no_tlp').value);
                localStorage.setItem('alamat', document.getElementById('alamat').value);
                formPart1.style.display = 'none';
                formPart2.style.display = 'block';
            });

            backButton.addEventListener('click', function () {
                formPart1.style.display = 'block';
                formPart2.style.display = 'none';
            });

            const storedName = localStorage.getItem('name');
            const storedGender = localStorage.getItem('gender');
            const storedNoTlp = localStorage.getItem('no_tlp');
            const storedAlamat = localStorage.getItem('alamat');

            if (storedName) {
                document.getElementById('name').value = storedName;
            }
            if (storedGender) {
                document.getElementById('gender').value = storedGender;
            }
            if (storedNoTlp) {
                document.getElementById('no_tlp').value = storedNoTlp;
            }
            if (storedAlamat) {
                document.getElementById('alamat').value = storedAlamat;
            }

            window.addEventListener('beforeunload', function() {
                localStorage.removeItem('name');
                localStorage.removeItem('gender');
                localStorage.removeItem('no_tlp');
                localStorage.removeItem('alamat');
            });
        });
    </script>
</x-guest-layout>