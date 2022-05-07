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



defineProps({
    title: String,
    isSidebarVisible: Boolean,
    showingNavigationDropdown: Boolean,
    isOpen: Boolean
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


</script>
<style scoped>
    @import '../../css/style.css';

</style>

<template>
    <div>
<!--        <Head :title="title" />-->
        <div class="">
            <div class="">
                <div id="hamburger" class="navigation-menu mr-2" @click="isSidebarVisible = !isSidebarVisible">
                    <svg width="29" height="17" viewBox="0 0 29 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.833328 0.25H28.1667V3H0.833328V0.25ZM7.66666 7.125H28.1667V9.875H7.66666V7.125ZM16.2083 14H28.1667V16.75H16.2083V14Z" fill="black"/>
                    </svg>
                </div>
                <nav class="nav nav-sidebar site-bg" v-bind:class="{'nav-sidebar-open': isSidebarVisible}" style="background: rgb(30, 35, 116)">
                    <div class="nav_section">
                        <div class="nav_section_content company">
                            <div class="nav_item prelative">
                                <Link href="" class="nav_flex">
                                    <!--                            <span class="company-icon flex justify-center">-->
                                    <!--                             <i class="fas fa-fw fa-shield-alt self-center"></i>-->
                                    <!--                                <img class="h-8 w-auto sm:h-10" src="../Assets/logo.png" alt="">-->

                                    <!--                            </span>-->
                                    <span class="company_text font-bold text-white text-xl">GDG Inventory

                                        </span>
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div class="nav_section mt-5 lg:mt-2">
                        <div class="nav_section_content">
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

                            <div class="nav_item prelative">
                                <Link href="/warehouse" class="nav_link nav_flex">
                                       <span class="nav_link_icon">
                                        <i class="fa fa-fw fa-warehouse"></i>
                                       </span>
                                    <span class="nav_link_text">Warehouse</span>
                                </Link>
                            </div>

                            <div class="nav_item prelative">
                                <Link href="/categories" class="nav_link nav_flex">
                                    <span class="nav_link_icon">
                                     <i class="fa-solid fa-layer-group"></i>
                                    </span>
                                    <span class="nav_link_text">Categories</span>
                                </Link>
                            </div>

                            <div class="nav_item prelative">
                                <Link href="/products" class="nav_link nav_flex">
                                    <span class="nav_link_icon">
                                     <i class="fa-solid fa-cart-shopping"></i>
                                    </span>
                                    <span class="nav_link_text">Products</span>
                                </Link>
                            </div>
                            <div class="nav_item prelative">
                                <Link href="/purchases" class="nav_link nav_flex">
                                 <span class="nav_link_icon">
                                  <i class="fa-solid fa-basket-shopping"></i>
                                 </span>
                                    <span class="nav_link_text">Purchases</span>
                                </Link>
                            </div>
                            <div class="nav_item prelative">
                                <Link href="/suppliers" class="nav_link nav_flex">
                                 <span class="nav_link_icon">
                                  <i class="fa-solid fa-parachute-box"></i>
                                 </span>
                                    <span class="nav_link_text">Suppliers</span>
                                </Link>
                            </div>

                            <div class="nav_item prelative">
                                <Link href="/customers" class="nav_link nav_flex">
                                    <span class="nav_link_icon">
                                     <i class="fa-solid fa-people-group"></i>
                                    </span>
                                    <span class="nav_link_text">Customers</span>
                                </Link>
                            </div>

                            <div class="nav_item prelative">
                                <Link href="/sales" class="nav_link nav_flex">
                                    <span class="nav_link_icon">
                                     <i class="fa-solid fa-timeline"></i>
                                    </span>
                                    <span class="nav_link_text">Sales</span>
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
            <header class="d-flex shadow">
                <div class="header-page-title mr-auto">
                    <div class="icon-block bg-indigo-600 text-white">
                        <slot name="icon"></slot>
                        <!--                    <i class="fa fas fa-fw fa-alt-t"></i>-->

                        <!--                <i class="fa fa-fw fas fa-history"></i>-->
                    </div>
                    <span class="header-page-title-text"><slot name="header"></slot></span>
                </div>

                <div class="header-nav">
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="ml-3 relative">
<!--                            <jet-dropdown align="right" width="48">-->
<!--                                <template #trigger>-->
<!--                                    <button v-if="$page.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">-->
<!--                                        <img class="h-8 w-8 rounded-full object-cover" :src="$page.user.profile_photo_url" :alt="$page.user.name" />-->
<!--                                    </button>-->

<!--                                    <button v-else class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">-->
<!--                                        <div>{{ $page.user.name }}</div>-->

<!--                                        <div class="ml-1">-->
<!--                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">-->
<!--                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />-->
<!--                                            </svg>-->
<!--                                        </div>-->
<!--                                    </button>-->
<!--                                </template>-->

<!--                                <template #content>-->
<!--                                    &lt;!&ndash; Account Management &ndash;&gt;-->
<!--                                    <div class="block px-4 py-2 text-xs text-gray-400">-->
<!--                                        Manage Account-->
<!--                                    </div>-->

<!--                                    <jet-dropdown-link :href="route('profile.show')">-->
<!--                                        Profile-->
<!--                                    </jet-dropdown-link>-->

<!--                                    <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.jetstream.hasApiFeatures">-->
<!--                                        API Tokens-->
<!--                                    </jet-dropdown-link>-->

<!--                                    <div class="border-t border-gray-100"></div>-->

<!--                                    &lt;!&ndash; Team Management &ndash;&gt;-->
<!--                                    <template v-if="$page.jetstream.hasTeamFeatures">-->
<!--                                        <div class="block px-4 py-2 text-xs text-gray-400">-->
<!--                                            Manage Team-->
<!--                                        </div>-->

<!--                                        &lt;!&ndash; Team Settings &ndash;&gt;-->
<!--                                        <jet-dropdown-link :href="route('teams.show', $page.user.current_team)">-->
<!--                                            Team Settings-->
<!--                                        </jet-dropdown-link>-->

<!--                                        <jet-dropdown-link :href="route('teams.create')" v-if="$page.jetstream.canCreateTeams">-->
<!--                                            Create New Team-->
<!--                                        </jet-dropdown-link>-->

<!--                                        <div class="border-t border-gray-100"></div>-->

<!--                                        &lt;!&ndash; Team Switcher &ndash;&gt;-->
<!--                                        <div class="block px-4 py-2 text-xs text-gray-400">-->
<!--                                            Switch Teams-->
<!--                                        </div>-->

<!--                                        <template v-for="team in $page.user.all_teams">-->
<!--                                            <form @submit.prevent="switchToTeam(team)" :key="team.id">-->
<!--                                                <jet-dropdown-link as="button">-->
<!--                                                    <div class="flex items-center">-->
<!--                                                        <svg v-if="team.id == $page.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>-->
<!--                                                        <div>{{ team.name }}</div>-->
<!--                                                    </div>-->
<!--                                                </jet-dropdown-link>-->
<!--                                            </form>-->
<!--                                        </template>-->

<!--                                        <div class="border-t border-gray-100"></div>-->
<!--                                    </template>-->

<!--                                    &lt;!&ndash; Authentication &ndash;&gt;-->
<!--                                    <form @submit.prevent="logout">-->
<!--                                        <jet-dropdown-link as="button">-->
<!--                                            Logout-->
<!--                                        </jet-dropdown-link>-->
<!--                                    </form>-->
<!--                                </template>-->
<!--                            </jet-dropdown>-->
                        </div>
                    </div>
                    <!--                <span class="header-nav-item">-->
                    <!--                    <img class="avatar rounded-full img-thumbnail img-fluid" src="/img/avatar-1.jpg" alt="profile pics">-->
                    <!--                    &lt;!&ndash;                <p class="avatar">Hi! Noble</p>&ndash;&gt;-->
                    <!--                </span>-->
                    <!--                <div class="nav-dropdown">-->
                    <!--                    <div class="nav-dropdown-item">-->
                    <!--                        <div class="nav-dropdown-item-link">-->
                    <!--                            Profile-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="nav-dropdown-item">-->
                    <!--                        <div class="nav-dropdown-item-link">-->
                    <!--                            Settings-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="nav-dropdown-item">-->
                    <!--                        <div class="nav-dropdown-item-link">-->
                    <!--                            Logout-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                </div>
            </header>
        </div>

        <!-- Page Content -->
        <main class="main" id="main" style="background-color:#fafafa" @click="isSidebarVisible = false">

            <div class="main_container" >
                <flash-messages />
                <slot />
            </div>
        </main>
    </div>
</template>
