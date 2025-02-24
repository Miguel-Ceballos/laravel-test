<div class="w-full">
    <h1 class="font-black text-gray-400 mb-4">HELLO FROM ROLES MODULE!</h1>

    @if(session()->has('success'))
        <div x-data="{ show: true }"
             x-show="show"
             x-transition
             x-init="setTimeout(() => show = false, 3000)"
        class="fixed top-0 right-0 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        {{ session('success') }}
</div>
@endif

    <div class="flex items-center justify-between gap-2">
        <div>
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input wire:model.live="search" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-hidden focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </div>


        <x-button wire:click="showModal = true">
            AGREGAR ROL
        </x-button>

        <x-button wire:click="$set('showModalTabs', true)">
            TABS MODAL
        </x-button>
    </div>

    <x-modal wire:model="showModal" max-width="2xl" id="modalRoles">
        <div class="flex mx-auto mt-4">
            <x-slot:title>
                Agregar rol
            </x-slot:title>
            <x-slot:body>
                <x-form-section submit="saveRole">
                    <x-slot:form>
                        <div>
                            <div class="mb-5">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                                <input wire:model="roleForm.name" type="text" id="name" name="roleForm.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5" placeholder="name for your role"/>
                                <x-input-error for="roleForm.name" />
                            </div>
                            <div class="mb-5">
                                <label for="area" class="block mb-2 text-sm font-medium text-gray-900 ">Area:</label>
                                <select wire:model="roleForm.area" id="area" name="roleForm.area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option>Seleccione una opcion</option>
                                    <option x-bind:value="'ventas'">Ventas</option>
                                    <option x-bind:value="'produccion'">Produccion</option>
                                    <option x-bind:value="'optico'">Optico</option>
                                    <option x-bind:value="'calidad'">Calidad</option>
                                    <option x-bind:value="'diseño'">Diseño</option>
                                    <option x-bind:value="'general'">General</option>
                                    <option x-bind:value="'electroformado'">Electroformado</option>
                                    <option x-bind:value="'sistemas'">Sistemas</option>
                                </select>
                                <x-input-error for="roleForm.area" />
                            </div>
                        </div>
                    </x-slot:form>
                    <x-slot:actions>
                        <x-secondary-button type="button" wire:click="showModal = false">Close</x-secondary-button>
                        <x-button>Save</x-button>
                    </x-slot:actions>
                </x-form-section>
            </x-slot:body>
        </div>
    </x-modal>

    <x-modal wire:model="showModalTabs" max-width="2xl" id="modalTabs">
        <div class="flex mx-auto mt-4">
            <x-slot:title>
                Tabs
            </x-slot:title>
            <x-slot:body>
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                </div>

            </x-slot:body>
        </div>
    </x-modal>

    <div class="bg-white w-full shadow-sm overflow-hidden sm:rounded-lg mt-4">
        <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center justify-between">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                            Name
                        </th>
                        <th scope="col"
                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Area
                        </th>
                        <th scope="col">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($roles as $role)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $role->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <div class="text-sm text-gray-500">
                                    {{ $role->guard_name }}
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <livewire:children
                                    wire:key="role-{{$role->id}}"
                                    :role="$role"
                                    @saved="$refresh()"
{{--                                    @saved="getRoles"--}}
                                />
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"
                                colspan="2">
                                No roles found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$roles->links()}}

{{--    @section('scripts')--}}
        <script>

            document.addEventListener('livewire:navigated', () => {
                // import {initTabs} from "flowbite";
                // Tabs.init();

                const tab = document.getElementById('default-tab');
                console.log(tab);
            });
        </script>
{{--    @endsection--}}

{{--    <script>--}}
{{--        document.addEventListener('livewire:navigated', function () {--}}
{{--            import {initTabs} from "flowbite";--}}
{{--            initTabs();--}}
{{--        });--}}
{{--    </script>--}}
</div>
