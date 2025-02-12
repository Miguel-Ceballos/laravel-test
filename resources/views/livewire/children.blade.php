<div>
    <x-button wire:click="getRole" type="button">
        Edit Role
    </x-button>

    <x-modal wire:model="showModalUpdate" max-width="2xl" id="modalRolesUpdate">
        <div class="flex mx-auto mt-4">
            <x-slot:title>
                Editar rol
            </x-slot:title>
            <x-slot:body>
                <x-form-section submit="updateRoleCaca">
                    <x-slot:form>
                        <div>
                            <div class="mb-5">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                                <input wire:model="updateRole.name" type="text" id="name" name="updateRole.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name for your role"/>
                                <x-input-error for="updateRole.name" />
                            </div>
                            <div class="mb-5">
                                <label for="area" class="block mb-2 text-sm font-medium text-gray-900 ">Area:</label>
                                <select wire:model="updateRole.area" id="area" name="updateRole.area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                                <x-input-error for="updateRole.area" />
                            </div>
                        </div>
                    </x-slot:form>
                    <x-slot:actions>
                        <x-secondary-button type="button" wire:click="showModal = false">Close</x-secondary-button>
                        <x-button>Update</x-button>
                    </x-slot:actions>
                </x-form-section>
            </x-slot:body>
        </div>
    </x-modal>
</div>
