<script setup>
import TenantAuthenticatedLayout from '../Layouts/TenantAuthenticatedLayout.vue';
import PrimaryButton from '../Components/PrimaryButton.vue';
import { router } from '@inertiajs/vue3';
import NavLink from '../Components/NavLink.vue';
import PaginationLinks from '@/Components/PaginationLinks.vue';

defineProps({
    products: Object
})

</script>

<template>
    <TenantAuthenticatedLayout>
        <h1>create new product</h1>

    </TenantAuthenticatedLayout>
</template>