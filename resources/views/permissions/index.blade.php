<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permisos') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="list_permission">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="max-w-sm mx-auto py-10 mb-20" @submit.prevent="storePermission">
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                        <input x-model="formData.name" type="text" id="name" name="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="name for your role"/>
                    </div>
                    <div class="mb-5">
                        <label for="guard_name" class="block mb-2 text-sm font-medium text-gray-900 ">Area:</label>
                        <select x-model="formData.guard_name" id="guard_name" name="guard_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        >
                            <option>Seleccione una opcion</option>
                            <option value="ventas">Ventas</option>
                            <option value="produccion">Produccion</option>
                            <option value="optico">Optico</option>
                            <option value="calidad">Calidad</option>
                        </select>
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-hidden focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create
                    </button>
                </form>

                <div class="my-5">
                    <h1 class="text-2xl font-semibold text-gray-900">Permisos</h1>
                </div>

                <div>
                    <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
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
                                    <template x-for="permission in permissions" :key="permission.id">
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div x-text="permission.name"
                                                             class="text-sm font-medium text-gray-900"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <div x-text="permission.guard_name" class="text-sm text-gray-500"></div>
                                            </td>
                                        </tr>
                                    </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
