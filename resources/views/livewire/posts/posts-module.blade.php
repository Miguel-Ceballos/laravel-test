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

    <div class="bg-white w-full shadow-sm overflow-hidden sm:rounded-lg mt-4">
        @forelse($posts as $post)
            <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $post->title }}
                                </div>
                                <div class="mt-1 text-sm text-gray-700">
                                    {{ $post->content }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            No posts found.
        @endforelse
    </div>
</div>
