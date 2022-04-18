<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        components:{
            AppLayout,
            Link
        }

    }

</script>
<template>
    <AppLayout title="Categories">
        <template #icon>
            <i class="fa-solid fa-layer-group"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
                Categories
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="mb-4">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Categories</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Add a new category
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form @submit.prevent="submit">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                                        Name
                                                    </label>
                                                    <div class="mt-1 flex flex-col rounded-md shadow-sm">
                                                        <input id="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="john@example.com">
                                                        <!--                                                        <JetInputError :message="" class="mt-2" />-->
                                                    </div>
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
                    </div>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                            <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                    <h3 class="font-bold">Categories list</h3>
                                    <a href="#" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-current="page">Add new</a>
                                </div>
                            </div>
                            <table class="table-auto min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left  font-semibold text-gray-600  tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Products
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        In stock
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Created
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="font-medium">
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">Electronics</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">23</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">4</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">13th May 22</td>
                                </tr>
                                <tr class="font-medium">
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">Baby wears</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">32</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">32</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">1st Feb 2021</td>
                                </tr>
                                <tr class="font-medium">
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">Men Shoes</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">3</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">1</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">3rd Jan 2022</td>
                                </tr>
                                <tr class="font-medium">
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">Malcolm Lockyer</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">1961</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="px-5 py-3 bg-white border-t flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex mt-2 xs:mt-0 text-right">
<!--                                    <a href="/" class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">-->
<!--                                        More market-->
<!--                                    </a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<style scoped>

</style>
