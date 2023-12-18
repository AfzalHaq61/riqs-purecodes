<template>
    <div class="ml-4 relative flex-shrink-0" x-data="{open: false}">
        <div>
            <button x-on:click="open = ! open" type="button" class="bg-white rounded-full flex text-sm ring-2 ring-white ring-opacity-20 focus:outline-none focus:ring-opacity-100" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
        </div>
        <div
            x-show="open"
            x-on:click.outside="open = false"
            x-on:keydown.escape="open = false"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="origin-top-right z-40 absolute -right-2 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
<!--            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>-->

            <!-- Active: "bg-gray-100", Not Active: "" -->
<!--            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>-->

            <!-- Active: "bg-gray-100", Not Active: "" -->
            <Link href="/logout"  method="post" as="button" role="menuitem" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" tabindex="-1">Logout</Link>
        </div>
    </div>
</template>


