<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue';
import JetBanner from '@/Jetstream/Banner.vue';
import JetDropdown from '@/Jetstream/Dropdown.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import JetNavLink from '@/Jetstream/NavLink.vue';
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue';
import FlashMessages from '@/Shared/FlashMessages'
import { useForm } from '@inertiajs/inertia-vue3'


defineProps({
    title: String,
    isSidebarVisible: Boolean,
    showingNavigationDropdown: Boolean,
    isOpen: Boolean,
    isReportOpen: Boolean,
    isWOpen: Boolean,
});


const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    Inertia.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    Inertia.post(route('logout'));
};

const changeWarehouse = (id) => {
    Inertia.post(route('warehouse.change'),{
        onSuccess: () => {
            window.location.reload();
        }
    })
    const warehouseForm = useForm({
        id:  id
    });
    warehouseForm.post('/warehouse/change', {
        onSuccess: () => {
            window.location.reload();
        },
    })
};






</script>
<style scoped>
    @import '../../css/style.css';

</style>

<template>
    <div>
<!--        <Head :title="title" />-->
        <div class="">
            <div class="">
                <div id="hamburger" class="print:hidden navigation-menu mr-2" @click="isSidebarVisible = !isSidebarVisible">
                    <svg width="29" height="17" viewBox="0 0 29 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.833328 0.25H28.1667V3H0.833328V0.25ZM7.66666 7.125H28.1667V9.875H7.66666V7.125ZM16.2083 14H28.1667V16.75H16.2083V14Z" fill="black"/>
                    </svg>
                </div>
<!--                //#5850EC-->
                <nav class="nav nav-sidebar site-bg nav-scroll" v-bind:class="{'nav-sidebar-open': isSidebarVisible}" style="background: rgb(30, 35, 116)">
                    <div class="nav_section">
                        <div class="nav_section_content company">
                            <div class="nav_item prelative">
                                <div class="nav_flex">
                                    <!--                            <span class="company-icon flex justify-center">-->
                                    <!--                             <i class="fas fa-fw fa-shield-alt self-center"></i>-->
                                    <!--                                <img class="h-8 w-auto sm:h-10" src="../Assets/logo.png" alt="">-->

                                    <!--                            </span>-->
                                    <span class="company_text font-bold text-white text-xl">GDG Inventory

                                        </span>
<!--                                    <p>{{$page.props.user.roles.includes('admin') ? 'yay!' : 'Nah'}}</p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="$page.props.user.roles.includes('admin')" class="nav_section mt-5 lg:mt-2">
                        <div class="nav_section_content" style="padding-left:20px; padding-bottom: -30px;">
                            <button id="dropdownSmallButton" @click="isWOpen = !isWOpen" class="inline-flex
                                        items-center px-3 py-2 mb-3 mr-3 text-sm font-medium text-center text-white
                                        bg-blue-700 rounded-lg md:mb-0 hover:bg-blue-800 focus:ring-4 focus:outline-none
                                        focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                {{ $page.props.userWarehouse.name}}
                                <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div v-if="isWOpen"  id="dropdownSmall" class=" absolute z-10 bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSmallButton">
                                    <li v-for="warehouse in $page.props.warehouses">
                                        <a href="#" @click="changeWarehouse(warehouse.id)" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{warehouse.name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="nav_section " :class="$page.props.user.roles.includes('admin') === true ? '-mt-5 lg:-mt-5' : 'mt-8 lg:mt-8'">
                        <div class="nav_section_content" >
                            <div class="nav_item prelative">
                                <Link href="/dashboard" class="nav_link nav_flex">
                                       <span class="nav_link_icon">
                                        <i class="fa-solid fa-gauge-high"></i>
                                       </span>
                                    <span class="nav_link_text">Dashboard</span>
                                </Link>
                            </div>
                            <div class="nav_item prelative">
                                <Link :href="route('profile.show')" class="nav_link nav_flex">
                                       <span class="nav_link_icon">
                                        <i class="fa fa-fw fa-user"></i>
                                       </span>
                                    <span class="nav_link_text">Profile</span>
                                </Link>
                            </div>

                            <div v-if="$page.props.user.roles.includes('admin')" class="nav_item prelative">
                                <Link href="/roles" class="nav_link nav_flex">
                                       <span class="nav_link_icon">
                                        <i class="fa fa-fw fa-users-gear"></i>
                                       </span>
                                    <span class="nav_link_text">Roles</span>
                                </Link>
                            </div>
                            <div v-if="$page.props.user.roles.includes('admin')" class="nav_item prelative">
                                <Link href="/permissions" class="nav_link nav_flex">
                                       <span class="nav_link_icon">
                                        <i class="fa fa-fw fa-user-shield"></i>
                                       </span>
                                    <span class="nav_link_text">Permissions</span>
                                </Link>
                            </div>
                            <div v-if="$page.props.user.roles.includes('admin')" class="nav_item prelative">
                                <Link href="/users" class="nav_link nav_flex">
                                       <span class="nav_link_icon">
                                        <i class="fa fa-fw fa-users-line"></i>
                                       </span>
                                    <span class="nav_link_text">Users</span>
                                </Link>
                            </div>
                            <div v-if="$page.props.user.roles.includes('admin')" class="nav_item prelative">
                                <Link href="/warehouse" class="nav_link nav_flex">
                                       <span class="nav_link_icon">
                                        <i class="fa fa-fw fa-warehouse"></i>
                                       </span>
                                    <span class="nav_link_text">Warehouse</span>
                                </Link>
                            </div>



                            <div v-if="$page.props.user.roles.includes('staff')" class="nav_item prelative">
                                <Link href="/sales" class="nav_link nav_flex">
                                    <span class="nav_link_icon">
                                     <i class="fa-solid fa-timeline"></i>
                                    </span>
                                    <span class="nav_link_text">Cashier</span>
                                </Link>
                            </div>
                            <div v-if="$page.props.user.roles.includes('admin') || $page.props.user.roles.includes('manager')"
                                 class="nav_item prelative">
                                <Link href="/products" class="nav_link nav_flex">
                                    <span class="nav_link_icon">
                                     <i class="fa-solid fa-cart-shopping"></i>
                                    </span>
                                    <span class="nav_link_text">Products</span>
                                </Link>
                            </div>
                            <div v-if="$page.props.user.roles.includes('admin') || $page.props.user.roles.includes('manager')" class="nav_item prelative">
                                <Link href="/categories" class="nav_link nav_flex">
                                    <span class="nav_link_icon">
                                     <i class="fa-solid fa-layer-group"></i>
                                    </span>
                                    <span class="nav_link_text">Categories</span>
                                </Link>
                            </div>
                            <div class="nav_item prelative">
                                <div @click="isOpen = !isOpen" class="nav_link nav_flex">
                                    <span class="nav_link_icon">
                                     <i class="fa-solid fa-people-group"></i>
                                    </span>
                                    <span class="nav_link_text">Inventory</span>
                                    <span style="font-size: 14px; padding-left:10px">
                                    <i v-if="isOpen" class="fas fa-chevron-down"></i>
                                    <i v-else class="fas fa-chevron-right"></i>
                                </span>
                                </div>
                                <div v-if="isOpen" class=" ml-14 py-2 w-48">
                                    <Link href="/products/on-shelf" class="block px-4 py-2" style="color: #9CA8E9"> On Shelf</Link>
                                    <Link href="/products/low-stock" class="block px-4 py-2" style="color: #9CA8E9"> Low Stock</Link>
                                    <Link href="/products/out-of-stock" class="block px-4 py-2" style="color: #9CA8E9">Out of Stock</Link>
                                    <Link href="/product/stock" class="block px-4 py-2" style="color: #9CA8E9">Add stock</Link>
                                </div>
                            </div>
                            <div  class="nav_item prelative">
                                <div  @click="isReportOpen = !isReportOpen" class="nav_link nav_flex">
                                 <span class="nav_link_icon">
                                  <i class="fa-solid fa-file-invoice"></i>
                                 </span>
                                    <span class="nav_link_text">Report</span>
                                    <span style="font-size: 14px; padding-left:10px">
                                    <i v-if="isReportOpen" class="fas fa-chevron-down"></i>
                                    <i v-else class="fas fa-chevron-right"></i>
                                    </span>
                                </div>
                                <div v-if="isReportOpen" class=" ml-14 py-2 w-48">
                                    <Link href="/report/daily" class="block px-4 py-2" style="color: #9CA8E9">Daily</Link>
                                    <Link href="/report/weekly" class="block px-4 py-2" style="color: #9CA8E9">Weekly</Link>
                                    <Link href="/report/monthly" class="block px-4 py-2" style="color: #9CA8E9">Monthly</Link>
                                    <Link href="/report/yearly" class="block px-4 py-2" style="color: #9CA8E9">Yearly</Link>
                                    <Link href="/report/all" class="block px-4 py-2" style="color: #9CA8E9">All Report</Link>
<!--                                    <Link href="/report/financial" class="block px-4 py-2" style="color: #9CA8E9">Financial Report</Link>-->

                                </div>
                            </div>
                            <div v-if="$page.props.user.roles.includes('admin') || $page.props.user.roles.includes('manager')" class="nav_item prelative">
                                <Link href="/purchases" class="nav_link nav_flex">
                                 <span class="nav_link_icon">
                                  <i class="fa-solid fa-parachute-box"></i>
                                 </span>
                                    <span class="nav_link_text">Purchase History</span>
                                </Link>
                            </div>



                            <div class="nav_item prelative">
                                <form @submit.prevent="logout" class="nav_link nav_flex">
                                         <span class="nav_link_icon">
                                            <i class="fas fa-fw fa-sign-out-alt"></i>
                                        </span>
                                    <!-- <span class="nav_link_text"> -->

                                    <form @submit.prevent="logout" class="nav_link_text">
                                        <button type="submit">
                                            Logout
                                        </button>
                                    </form>

                                    <!-- </span> -->

                                </form>
                                <!--                            <Link href="/pins" class="nav_link nav_flex">-->
                                <!--                               -->
                                <!--                                <span >Logout</span>-->
                                <!--                            </Link>-->
                            </div>

                        </div>
                    </div>
                </nav>
            </div>
            <header class="d-flex shadow print:hidden">
                <div class="header-page-title mr-auto">
                    <div class="icon-block bg-indigo-600 text-white">
                        <slot name="icon"></slot>
                        <!--                    <i class="fa fas fa-fw fa-alt-t"></i>-->

                                        <i class="fa fa-fw fas fa-history"></i>
                    </div>
                    <span class="header-page-title-text"><slot name="header"></slot></span>
                </div>

                <div class="header-nav">
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="ml-3 relative">

                        </div>
                    </div>

                </div>
            </header>
        </div>

        <!-- Page Content -->
        <main class="main" id="main" style="background-color:#fafafa" @click="isSidebarVisible = false">

            <div class="main_container " >
                <flash-messages />
                <slot />
            </div>
        </main>
    </div>
</template>
