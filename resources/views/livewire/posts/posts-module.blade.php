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
                <x-form-section submit="savePost">
                    <x-slot:form>
                        <div>
                            <div>
                                <x-label for="formData.title" value="Title"/>
                                <x-input wire:model="formData.title" wire id="title" name="formData.title" type="text" placeholder="Post title" />
                                <x-input-error for="formData.title" />
                            </div>
                            <div>
                                <x-label for="formData.content" value="Content"/>
                                <x-input wire:model="formData.content" id="content" name="formData.content" disabled="$wire.formData.country == 'rollos'" type="text" placeholder="Miguel"/>
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
