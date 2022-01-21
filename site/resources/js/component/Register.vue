<template>
    <div class="min-h-full flex items-center justify-center py-40 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Register new account
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="#" method="POST" @submit.prevent="register">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" v-model="name" type="text" autocomplete="name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name">
                    </div>
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" v-model="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" v-model="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                </div>

                <div>
                    <button type="submit" class="ease-in-out duration-200 font-bold group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                          <!-- Heroicon name: solid/lock-closed -->
                          <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                          </svg>
                        </span>
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
    data() {
        return {
            name: '',
            email: '',
            password: '',
            error: null
        }
    },
    methods: {
        register() {
            this.axios
                .post('api/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {
                    console.log(response.data);
                    this.$modal.show(
                        {
                            template: `
                              <div class="p-4">
                                <h1 class="text-center text-3xl font-extrabold text-gray-900">Notification</h1>
                                <p class="overflow-auto p-4 mt-2">{{ text }}</p>
                              </div>
                            `,
                            props: ['text']
                        },
                        { text: response.data['result'] },
                        { height: 'auto' },
                        { 'before-close': event => {} }
                    )
                })
                .catch(function (error) {
                    if (error.response) {
                        // Request made and server responded
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        // The request was made but no response was received
                        console.log(error.request);
                    } else {
                        // Something happened in setting up the request that triggered an Error
                        console.log('Error', error.message);
                    }

                });
        }
    }
}
</script>

<style scoped>

</style>
