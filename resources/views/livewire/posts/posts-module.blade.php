<div>
    <h1 class="font-black text-gray-400 mb-4">HELLO FROM POSTS MODULE</h1>

    <x-button wire:click="showModal = true">
        Add Post
    </x-button>

    <x-modal wire:model="showModal" max-width="2xl" id="modalPosts">
        <div class="flex justify-center items-center mx-auto mt-4">
            <x-slot:title>
                Hello world!
            </x-slot:title>
            <x-slot:body>
                <x-form-section submit="storePost">
                    <x-slot:form>
                        <div>
                            <div>
                                <x-label for="formData.title" value="Title"/>
                                <x-input wire:model="formData.title" wire id="title" name="formData.title" type="text" placeholder="Post title" />
                                <x-input-error for="formData.title" />
                            </div>

                            <select wire:model="formData.country" wire:change="formData.country == 'rollos' ? is_disabled = true : is_disabled = false" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Seleccione</option>
                                <option x-bind:value="'rollos'">Mexico</option>
                                <option x-bind:value="'colombia'">Colombia</option>
                            </select>
                            <div>
                                <x-label for="formData.content" value="Content"/>
                                <x-input id="content" name="formData.content" disabled="$wire.formData.country == 'rollos'" type="text" placeholder="Miguel"/>
                                <x-input-error for="formData.content" />
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
</div>
