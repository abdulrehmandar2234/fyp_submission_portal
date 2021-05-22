<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('registration.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="std_1_name" :value="__('Student 1 Name')" />

                <x-input id="std_1_name" class="block mt-1 w-full" type="text" name="std_1_name" :value="old('std_1_name')"  autofocus />
            </div>

            <div>
                <x-label for="std_2_name" :value="__('Student 2 Name')" />

                <x-input id="std_2_name" class="block mt-1 w-full" type="text" name="std_2_name" :value="old('std_2_name')"  autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="std_1_email" :value="__('Student 1 Email')" />

                <x-input id="std_1_email" class="block mt-1 w-full" type="email" name="std_1_email" :value="old('std_1_email')"  />
            </div>

            <div class="mt-4">
                <x-label for="std_2_email" :value="__('Student 2 Email')" />

                <x-input id="std_2_email" class="block mt-1 w-full" type="email" name="std_2_email" :value="old('std_2_email')"  />
            </div>

            <div class="mt-4">
                <x-label for="std_1_roll_no" :value="__('Student 1 Roll No')" />

                <x-input id="std_1_roll_no" class="block mt-1 w-full" type="text" name="std_1_roll_no" :value="old('std_1_roll_no')"  />
            </div>
            <div class="mt-4">
                <x-label for="std_2_roll_no" :value="__('Student 2 Roll No')" />

                <x-input id="std_2_roll_no" class="block mt-1 w-full" type="text" name="std_2_roll_no" :value="old('std_2_roll_no')"  />
            </div>

            <div class="mt-4">
                <x-label for="std_1_session" :value="__('Student 1 Session')" />

                <x-input id="std_1_session" class="block mt-1 w-full" type="text" name="std_1_session" :value="old('std_1_session')"  />
            </div>

            <div class="mt-4">
                <x-label for="std_2_session" :value="__('Student 2 Session')" />

                <x-input id="std_2_session" class="block mt-1 w-full" type="text" name="std_2_session" :value="old('std_2_session')"  />
            </div>

            <div class="mt-4">
                <x-label for="std_2_session" :value="__('Student 2 Department')" />

            <select name="department_id" id="">
                <option value="1">CS</option>
            </select>
            </div>
            <div class="mt-4">
                <x-label for="std_2_session" :value="__('Student 2 Card')" />
<input type="file" name="std_1_card" id="std_1_card">
            </div>
            <div class="mt-4">
                <x-label for="std_2_session" :value="__('Student 2 Card')" />
<input type="file" name="std_2_card" id="std_2_card">
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Apply') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
