<script>
    import AppLayout from '@/Layouts/AppLayout.vue';

    export default {
        components:{
            AppLayout
        }

    }

</script>
<template>
    <AppLayout title="Products">
        <template #icon>
            <i class="fa-solid fa-timeline"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
                Sales
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    purchases
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<style scoped>

</style>



