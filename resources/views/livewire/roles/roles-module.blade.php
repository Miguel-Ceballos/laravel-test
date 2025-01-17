<div>
    <h1 class="font-black text-gray-400 mb-4">HELLO FROM ROLES MODULE!</h1>

    <x-button wire:click="showModal = true">
        AGREGAR ROL
    </x-button>

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
                                <input wire:model="roleForm.name" type="text" id="name" name="roleForm.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name for your role"/>
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

    <div class="bg-white w-full shadow overflow-hidden sm:rounded-lg mt-4">
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
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    <template x-for="role in $wire.roles" :key="role.id">
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div x-text="role.name"
                                             class="text-sm font-medium text-gray-900"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <div x-text="role.guard_name" class="text-sm text-gray-500"></div>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
