<template>
    <app-layout title="Author Edit">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Author edit page
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form :action="route('author.update', author.id)" method="POST">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" :value="csrf" />
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid gap-6">
                                <div class="col-span-12">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input :value="author.name" type="text" name="name" id="name" autocomplete="name" class="text-black mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-12">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input :value="author.address" type="text" name="address" id="address" autocomplete="address" class="text-black mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-12">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <input :value="author.description" type="text" name="description" id="description" autocomplete="description" class="text-black mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from "../Layouts/AppLayout";
export default {
    name: "AuthorEdit",
    props: ['author','csrf'],
    components: {
        AppLayout,
    }
}
</script>

<style scoped>

</style>
