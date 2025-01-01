<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="list_post">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="max-w-sm mx-auto py-10 mb-20" @submit.prevent="storePost">
                    <div class="mb-5">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Your title</label>
                        <input x-model="formData.title" x-on:input="clearError('title')" type="text" id="title" name="title"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="title for your post"
                        />
                        <template x-if="errors.title">
                            <span class="text-red-500 text-xs italic" x-text="errors.title"></span>
                        </template>
                    </div>
                    <div class="mb-5">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Content</label>
                        <textarea x-model="formData.content" x-on:input="clearError('content')" type="content" id="content"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                  placeholder="Content for your post"></textarea>
                        <template x-if="errors.content">
                            <span class="text-red-500 text-xs italic"x-text="errors.content"></span>
                        </template>
                    </div>
                    <div class="mb-5">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Image:</label>
                        <input x-model="formData.image" x-on:input="clearError('image')"  type="file" id="image"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        />
                        <template x-if="errors.image">
                            <span class="text-red-500 text-xs italic" x-text="errors.image"></span>
                        </template>
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create
                    </button>
                </form>

                <div class="my-5">
                    <h1 class="text-2xl font-semibold text-gray-900">Posts</h1>
                </div>

                <div>
                    <template x-for="post in posts" :key="post.id">
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-sm">
                                        <h3 x-text="post.title" class="text-lg font-medium text-gray-900"></h3>
                                        <p class="mt-1 text-gray-500">

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
