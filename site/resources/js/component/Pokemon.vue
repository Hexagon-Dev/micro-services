<template>
    <div class="container m-auto mt-20">
        <div v-if="loading">
            <div style="border-top-color:transparent" class="w-16 h-16 border-4 border-indigo-600 border-solid rounded-full animate-spin m-auto"></div>
        </div>
        <transition name="fade" mode="out-in">
        <div v-if="!loading" class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    HP
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Views
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="pokemon in data.pokemons" :key="pokemon.id" @click="redirect(pokemon.id)" class="cursor-pointer hover:bg-gray-100 ease-in-out duration-200">
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{ pokemon.id }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{ pokemon.name }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{ pokemon.description }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{ pokemon.hp }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{ data.stats[pokemon.id - 1].views }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: "Pokemon",
    data() {
        return {
            loading: true,
            data: {},
        }
    },
    watch: {
        '$route': 'created'
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.axios
                .get(`/api/pokemon`)
                .then((res) => {
                    console.log(res.data);
                    this.data = res.data;
                    this.loading = false;
                });
        },
        redirect(id) {
            this.$router.push({ name: 'pokemon_one', params: { id: id } });
        }
    }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity .2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
