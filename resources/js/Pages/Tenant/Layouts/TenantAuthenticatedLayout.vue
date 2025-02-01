<script setup>
import { ref } from 'vue';
import Navbar from './Navbar.vue';
import Sidebar from './Sidebar.vue';
import Footer from './Footer.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <Navbar />
            <Sidebar />

            <!-- Page Heading -->
            <header
                class="bg-white shadow dark:bg-gray-800"
                v-if="$slots.header"
            >
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-4 md:ml-64 h-auto pt-20">
                <slot />
            </main>

        </div>
    </div>
</template>
