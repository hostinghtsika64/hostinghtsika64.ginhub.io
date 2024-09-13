<x-filament-panels::page>


    <div class="grid grid-cols-4 gap-4">
    @foreach($hostingSubscriptions as $hostingSubscription)

        <x-filament::section>
            <div class="flex flex-col gap-4">

                <div class="flex flex-col items-center gap-2 mb-4">
                    <svg class="w-14" viewBox="-7 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <title>server</title>
                        <path d="M1.125 10.156h15.875c0.594 0 1.125 0.531 1.125 1.125v2.625c0 0.625-0.531 1.125-1.125 1.125h-15.875c-0.625 0-1.125-0.5-1.125-1.125v-2.625c0-0.594 0.5-1.125 1.125-1.125zM16.75 12.844v-0.5c0-0.188-0.188-0.375-0.375-0.375h-2c-0.219 0-0.375 0.188-0.375 0.375v0.5c0 0.219 0.156 0.375 0.375 0.375h2c0.188 0 0.375-0.156 0.375-0.375zM1.125 15.906h15.875c0.594 0 1.125 0.5 1.125 1.125v2.625c0 0.625-0.531 1.125-1.125 1.125h-15.875c-0.625 0-1.125-0.5-1.125-1.125v-2.625c0-0.625 0.5-1.125 1.125-1.125zM16.75 18.594v-0.5c0-0.188-0.188-0.375-0.375-0.375h-2c-0.219 0-0.375 0.188-0.375 0.375v0.5c0 0.219 0.156 0.375 0.375 0.375h2c0.188 0 0.375-0.156 0.375-0.375zM1.125 21.656h15.875c0.594 0 1.125 0.5 1.125 1.125v2.625c0 0.625-0.531 1.125-1.125 1.125h-15.875c-0.625 0-1.125-0.5-1.125-1.125v-2.625c0-0.625 0.5-1.125 1.125-1.125zM16.75 24.344v-0.5c0-0.219-0.188-0.375-0.375-0.375h-2c-0.219 0-0.375 0.156-0.375 0.375v0.5c0 0.219 0.156 0.375 0.375 0.375h2c0.188 0 0.375-0.156 0.375-0.375zM17 9.313h-15.875c-0.188 0-0.375 0.031-0.531 0.094l1.906-2.594c0.375-0.5 1.188-0.906 1.813-0.906h9.5c0.594 0 1.406 0.406 1.781 0.906l1.938 2.594c-0.188-0.063-0.375-0.094-0.531-0.094z"></path>
                    </svg>
                    <h3 class="text-2xl">
                        {{ $hostingSubscription->domain }}
                    </h3>

                </div>

                <x-filament::button
                    href="{{route('customer.phpmyadmin.login', $hostingSubscription->id)}}"
                    tag="a"
                >
                    Login
                </x-filament::button>
            </div>

        </x-filament::section>

    @endforeach
    </div>

</x-filament-panels::page>
