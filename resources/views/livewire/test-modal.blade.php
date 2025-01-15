<div>
    <x-button wire:click="showModal = true">Show Modal</x-button>
    <x-modal wire:model="showModal" max-width="4xl">
        <div class="flex justify-center items-center mx-auto mt-4">
            <x-slot:title>
                Hello world!
            </x-slot:title>
            <x-slot:body>
                <x-form-section submit="storePost">
                    <x-slot:form>
                        <div class="grid grid-cols-3 gap-3 mb-2">
                            <div>
                                <x-label for="name" value="Your name"/>
                                <x-input id="name" type="text" placeholder="Miguel" :disabled="true"/>
                            </div>
                            <div>
                                <x-label for="name" value="Your name"/>
                                <x-input id="name" type="text" placeholder="Miguel" :disabled="true"/>
                            </div>
                            <div>
                                <x-label for="name" value="Your name"/>
                                <x-input id="name" type="text" placeholder="Miguel" :disabled="true"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <x-label for="name" value="Your name"/>
                                <x-input id="name" type="text" placeholder="Miguel" :disabled="true"/>
                            </div>
                            <div>
                                <x-label for="name" value="Your name"/>
                                <x-input id="name" type="text" placeholder="Miguel" :disabled="true"/>
                            </div>
                            <div>
                                <x-label for="name" value="Your name"/>
                                <x-input id="name" type="text" placeholder="Miguel" :disabled="true"/>
                            </div>
                        </div>
{{--                        <div class="flex flex-row gap-3 mb-3">--}}
{{--                            <div class="w-full">--}}
{{--                                <x-label for="name" value="Your name"/>--}}
{{--                                <x-input id="name" type="text" placeholder="Miguel" :disabled="true"/>--}}
{{--                            </div>--}}
{{--                            <div class="w-full">--}}
{{--                                <x-label for="lastname" value="Your lastname"/>--}}
{{--                                <x-input id="lastname" type="text" placeholder="Ceballos"/>--}}
{{--                            </div>--}}
{{--                            <div class="w-full">--}}
{{--                                <x-label for="email" value="Your email"/>--}}
{{--                                <x-input id="email" type="email" placeholder="Ceballos"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
