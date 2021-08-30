<template>
    <app-layout title="Authors">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Authors page
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-6 py-6">
                    <jet-nav-link class="btn btn-accent w-24" :href="route('author.create')">
                        New
                    </jet-nav-link>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Id
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Number of publications
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Delete</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200" v-for="author in authors">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                            {{ author.id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-black">
                                                    <jet-nav-link :href="route('author.show', { author: author.id })">
                                                        {{ author.name }}
                                                    </jet-nav-link>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-black">
                                            {{ author.address }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-black">
                                            {{ author.publications.length ?? 0 }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-black">
                                            <form :action="route('author.destroy', author.id)" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input type="hidden" name="_token" :value="csrf" />
                                                <button type="submit" class="btn btn-error w-24">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import JetNavLink from "../Jetstream/NavLink";

export default {
    name: "AuthorIndex",
    props: ['authors', 'csrf'],
    components: {
        AppLayout,
        JetNavLink
    }
}
</script>

<style scoped>

</style>
