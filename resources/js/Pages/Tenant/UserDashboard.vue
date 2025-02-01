<script setup>
import NavLink from './Components/NavLink.vue';
import DropdownLink from './Components/DropdownLink.vue';
</script>
<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    User Dashboard
                </div>
            </div>
        </div>
    </div>

    <div>
        <DropdownLink :href="route('logout')" method="post" as="button">
                            Log Out
                        </DropdownLink>
    </div>
</template>