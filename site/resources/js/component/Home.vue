<template>
    <div>
        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
            <div class="sm:text-center">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block xl:inline">Super pokemons</span>
                    <span class="block text-indigo-600 xl:inline">viewer</span>
                </h1>
                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
                    You can easily review list of pokemons here. Just register and browse.
                </p>
                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center">
                    <div class="rounded-md shadow">
                        <router-link :to="{ name: 'register' }" class="ease-in-out duration-200 font-bold w-full flex items-center justify-center px-8 py-3 border border-transparent text-base rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                            Register
                        </router-link>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <router-link :to="{ name: 'login' }" class="ease-in-out duration-200 font-bold w-full flex items-center justify-center px-8 py-3 border border-transparent text-base rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                            Login
                        </router-link>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style scoped>

</style>
