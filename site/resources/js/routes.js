export const routes = [
    {
        name: 'home',
        path: '/',
        component: () => import('./component/Home.vue'),
    },
    {
        name: 'login',
        path: '/login',
        component: () => import('./component/Login.vue'),
    },
    {
        name: 'register',
        path: '/register',
        component: () => import('./component/Register.vue'),
    },
    {
        name: 'pokemon',
        path: '/pokemon',
        component: () => import('./component/Pokemon.vue'),
    },
    {
        name: 'pokemon_one',
        path: '/pokemon/:id',
        component: () => import('./component/PokemonOne.vue'),
    }
];
