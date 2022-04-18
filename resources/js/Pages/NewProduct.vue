<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'
    import JetButton from '@/Jetstream/Button.vue';
    import JetFormSection from '@/Jetstream/FormSection.vue';
    import JetInput from '@/Jetstream/Input.vue';
    import JetInputError from '@/Jetstream/InputError.vue';
    import JetLabel from '@/Jetstream/Label.vue';
    import JetActionMessage from '@/Jetstream/ActionMessage.vue';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue';

    export default {
        components:{
            AppLayout,
            Link,
            JetInput,
            JetInputError,
            JetFormSection,
            JetButton,
            JetLabel,
            JetActionMessage,
            JetSecondaryButton

        }

    }

</script>
<template>
    <AppLayout title="Warehouse">
        <template #icon>
            <i class="fa-solid fa-gift"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
               New Product
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="mb-4">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">New Product</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Add a new product
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form @submit.prevent="submit">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Category</label>
                                                    <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option>Electronics</option>
                                                        <option>Men Shoes</option>
                                                        <option>Phones</option>
                                                        <option>Computing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">

                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Name</label>
                                                    <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">

                                                </div>
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                                        Barcode
                                                    </label>
                                                    <div class="mt-1 flex flex-col rounded-md shadow-sm">
                                                        <input id="barcode" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="0495382430">
                                                        <!--                                                        <JetInputError :message="`Who deeyy`" class="mt-2" />-->
                                                    </div>
                                                </div>
                                                <div class="col-span-3 sm:col-span-2">

                                                    <label for="cost_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cost price</label>
                                                    <div class="flex">
                                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                        ₦
                                                        </span>
                                                        <input type="text" id="cost_price" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">
                                                    </div>

                                                </div>
                                                <div class="col-span-3 sm:col-span-2">

                                                    <label for="sales_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sales price</label>
                                                    <div class="flex">
                                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                        ₦
                                                        </span>
                                                        <input type="text" id="sales_price" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">
                                                    </div>

                                                </div>
                                                <div class="col-span-3 sm:col-span-2">

                                                    <label for="tax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tax</label>
                                                    <div class="flex">
                                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                        ₦
                                                        </span>
                                                        <input type="text" id="tax" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">
                                                    </div>

                                                </div>
                                                <div class="col-span-3 sm:col-span-2">

                                                    <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Weight</label>
                                                    <div class="flex">
                                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                        kg
                                                        </span>
                                                        <input type="text" id="website-admin" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">
                                                    </div>

                                                </div>

                                                <div class="col-span-3 sm:col-span-2">
                                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                                                    <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="A blue bottle with a red cap."></textarea>
                                                </div>

                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Product image</label>
                                                    <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
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
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<style scoped>

</style>

