<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { FwbAlert } from 'flowbite-vue'
import { FwbButton } from 'flowbite-vue'

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <img src="https://images.pexels.com/photos/1337380/pexels-photo-1337380.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="Logo" class="h-8" />
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                        </Link>

                        <template v-else>
                            <Link :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                            </Link>

                            <Link v-if="canRegister" :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <section class="bg-white dark:bg-gray-900">

                        <div class="grid gap-2">
                            <fwb-alert type="info">
                                Info alert! Change a few things up and try submitting again.
                            </fwb-alert>
                            <fwb-alert type="warning">
                                Warning alert! Change a few things up and try submitting again.
                            </fwb-alert>
                            <fwb-alert type="danger">
                                Danger alert! Change a few things up and try submitting again.
                            </fwb-alert>
                            <fwb-alert type="dark">
                                Dark alert! Change a few things up and try submitting again.
                            </fwb-alert>
                            <fwb-alert type="success">
                                Success alert! Change a few things up and try submitting again.
                            </fwb-alert>
                        </div>

                        <div class="mt-8">
                            <fwb-button color="default">Default</fwb-button>
                            <fwb-button color="alternative">Alternative</fwb-button>
                            <fwb-button color="dark">Dark</fwb-button>
                            <fwb-button color="light">Light</fwb-button>
                            <fwb-button color="green">Green</fwb-button>
                            <fwb-button color="red">Red</fwb-button>
                            <fwb-button color="yellow">Yellow</fwb-button>
                            <fwb-button color="purple">Purple</fwb-button>
                            <fwb-button color="pink">Pink</fwb-button>
                        </div>
                        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                                    Designed for
                                    business teams like yours</h2>
                                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Here at Flowbite
                                    we focus on
                                    markets where technology, innovation, and capital can unlock long-term value and
                                    drive economic
                                    growth.</p>
                            </div>
                            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                                <!-- Pricing Card -->
                                <div
                                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">Starter</h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best option for
                                        personal use & for
                                        your next project.</p>
                                    <div class="flex justify-center items-baseline my-8">
                                        <span class="mr-2 text-5xl font-extrabold">$29</span>
                                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                                    </div>
                                    <!-- List -->
                                    <ul role="list" class="mb-8 space-y-4 text-left">
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Individual configuration</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>No setup, or hidden fees</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Team size: <span class="font-semibold">1 developer</span></span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Premium support: <span class="font-semibold">6 months</span></span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Free updates: <span class="font-semibold">6 months</span></span>
                                        </li>
                                    </ul>
                                    <a href="#"
                                        class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Get
                                        started</a>
                                </div>
                                <!-- Pricing Card -->
                                <div
                                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">Company</h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Relevant for
                                        multiple users,
                                        extended & premium support.</p>
                                    <div class="flex justify-center items-baseline my-8">
                                        <span class="mr-2 text-5xl font-extrabold">$99</span>
                                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                                    </div>
                                    <!-- List -->
                                    <ul role="list" class="mb-8 space-y-4 text-left">
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Individual configuration</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>No setup, or hidden fees</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Team size: <span class="font-semibold">10 developers</span></span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Premium support: <span class="font-semibold">24 months</span></span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Free updates: <span class="font-semibold">24 months</span></span>
                                        </li>
                                    </ul>
                                    <a href="#"
                                        class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Get
                                        started</a>
                                </div>
                                <!-- Pricing Card -->
                                <div
                                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">Enterprise</h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best for large
                                        scale uses and
                                        extended redistribution rights.</p>
                                    <div class="flex justify-center items-baseline my-8">
                                        <span class="mr-2 text-5xl font-extrabold">$499</span>
                                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                                    </div>
                                    <!-- List -->
                                    <ul role="list" class="mb-8 space-y-4 text-left">
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Individual configuration</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>No setup, or hidden fees</span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Team size: <span class="font-semibold">100+ developers</span></span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Premium support: <span class="font-semibold">36 months</span></span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Free updates: <span class="font-semibold">36 months</span></span>
                                        </li>
                                    </ul>
                                    <a href="#"
                                        class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Get
                                        started</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
