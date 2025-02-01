<script setup>
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = useForm({
    name: '',
    email: '',
    domain: '',
    password: '',
    password_confirmation: '',
});

</script>

<template>

    <AuthenticatedLayout>
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new Tenant</h2>

                <form @submit.prevent="form.post(route('tenants.store'))">
                    
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        
                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tenant Name
                            </label>
                            <TextInput type="text"  v-model="form.name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Tenant name" required="" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="Domain"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tenant Domain
                            </label>
                            <TextInput type="text"  v-model="form.domain" id="domain"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Tenant Domain" required="" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="Email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tenant Email
                            </label>
                            <TextInput type="text" v-model="form.email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Tenant Email" required="" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="Password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tenant Password
                            </label>
                            <TextInput type="password" v-model="form.password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="Password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tenant Password Confirmation
                            </label>
                            <TextInput type="password" v-model="form.password_confirmation" id="password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="" />
                        </div>
                    </div>
                    <PrimaryButton :disabled="form.processing" class="mt-4">
                        Add New Tenant
                    </PrimaryButton>
                </form>
            </div>
        </section>
    </AuthenticatedLayout>
</template>