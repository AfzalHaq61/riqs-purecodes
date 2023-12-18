<script setup>
import { ref } from 'vue';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Navs from '@/Components/Navs';
import MobileNavs from '@/Components/MobileNavs'
import Footer from '@/Components/Footer'
import Logo from "@/Components/Logo";
import ProfileDropdown from "@/Components/Partials/ProfileDropdown";
import NotificationButton from "@/Components/Partials/NotificationButton";
import SearchField from "@/Components/Partials/SearchField";
import MobileMenuButton from "@/Components/Partials/MobileMenuButton";
import MobileProfileDropdown from "@/Components/Partials/MobileProfileDropdown";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-full">
        <header class="pb-24 bg-indigo-600" x-data="{showMobileMenu: false}">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="relative py-5 flex items-center justify-center lg:justify-between">
                    <!-- Logo -->
                    <Logo />

                    <!-- Right section on desktop -->
                    <div class="hidden lg:ml-4 lg:flex lg:items-center lg:pr-0.5">
                        <NotificationButton />

                        <!-- Profile dropdown -->
                        <ProfileDropdown />
                    </div>

                    <!-- Search -->
                    <SearchField />

                    <!-- Menu button -->
                    <MobileMenuButton />
                </div>
                <div class="hidden lg:block border-t border-white border-opacity-20 py-5">
                    <div class="grid grid-cols-3 gap-8 items-center">
                        <div class="col-span-2">
                            <Navs />
                        </div>
                        <div>
                            <div class="max-w-md w-full mx-auto">
                                <label for="mobile-search" class="sr-only">Search</label>
                                <div class="relative text-white focus-within:text-gray-600">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                        <!-- Heroicon name: solid/search -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="mobile-search" class="block w-full bg-white bg-opacity-20 py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 text-gray-900 placeholder-white focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on mobile menu state. -->
            <div class="lg:hidden" x-show="showMobileMenu">
                <!--
                  Mobile menu overlay, show/hide based on mobile menu state.

                  Entering: "duration-150 ease-out"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "duration-150 ease-in"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="z-20 fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

                <!--
                  Mobile menu, show/hide based on mobile menu state.

                  Entering: "duration-150 ease-out"
                    From: "opacity-0 scale-95"
                    To: "opacity-100 scale-100"
                  Leaving: "duration-150 ease-in"
                    From: "opacity-100 scale-100"
                    To: "opacity-0 scale-95"
                -->
                <div class="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition transform origin-top">
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
                        <div class="pt-3 pb-2">
                            <div class="flex items-center justify-between px-4">
                                <div>
                                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                                </div>
                                <div class="-mr-2">
                                    <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                        <span class="sr-only">Close menu</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg x-on:click="showMobileMenu=false" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <MobileNavs />
                        </div>
                        <MobileProfileDropdown />
                    </div>
                </div>
            </div>
        </header>
        <main class="-mt-24 pb-8">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="sr-only">Page title</h1>
                <slot />
            </div>
        </main>
        <Footer/>
    </div>
</template>
