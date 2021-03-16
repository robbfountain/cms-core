<div class="max-w-lg mx-auto lg:max-w-none">
    <form method="POST" action="#" wire:submit.prevent="submitContactForm" class="grid grid-cols-1 gap-y-6">
        <div>
            <label for="full_name" class="sr-only">Full name</label>
            <input wire:model="name" type="text" name="full_name" id="full_name" autocomplete="name"
                   class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                   placeholder="Full name">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror

        </div>
        <div>
            <label for="email" class="sr-only">Email</label>
            <input wire:model="email" id="email" name="email" type="email" autocomplete="email"
                   class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                   placeholder="Email">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror

        </div>
        <div>
            <label for="phone" class="sr-only">Phone</label>
            <input wire:model="phone" type="text" name="phone" id="phone" autocomplete="tel"
                   class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                   placeholder="Phone">
            @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror

        </div>
        <div>
            <label for="message" class="sr-only">Message</label>
            <textarea wire:model="message" id="message" name="message" rows="4"
                      class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                      placeholder="Message"></textarea>
            @error('message') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <button type="submit"
                    class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Submit
            </button>
            @if(session()->has('core::contact-success'))
                <span class="ml-2 text-green-500">{{session('core::contact-success')}}</span>
            @endif
        </div>
    </form>
</div>
