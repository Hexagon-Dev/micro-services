<template>
    <div>
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            <span class="text-2xl tracking-tight font-extrabold text-gray-100">Pokemons</span>
                        </div>
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <router-link :to="{ name: 'home' }" exact class="ease-in-out duration-200 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</router-link>
                                <router-link :to="{ name: 'login' }" exact class=" ease-in-out duration-200 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</router-link>
                                <router-link :to="{ name: 'register' }" exact class="ease-in-out duration-200 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</router-link>
                                <router-link :to="{ name: 'pokemon' }" exact class="ease-in-out duration-200 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Pokemons</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sm:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <router-link :to="{ name: 'home' }" exact class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</router-link>
                    <router-link :to="{ name: 'login' }" exact class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Login</router-link>
                    <router-link :to="{ name: 'register' }" exact class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Register</router-link>
                    <router-link :to="{ name: 'pokemon' }" exact class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Pokemon</router-link>
                </div>
            </div>
        </nav>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition-property: opacity;
    transition-duration: .2s;
}

.fade-enter-active {
    transition-delay: .2s;
}

.fade-enter, .fade-leave-active {
    opacity: 0
}
</style>
