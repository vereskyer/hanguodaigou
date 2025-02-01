<script setup>
import TenantAuthenticatedLayout from '../Layouts/TenantAuthenticatedLayout.vue';
import PrimaryButton from '../Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import NavLink from '../Components/NavLink.vue';
import PaginationLinks from '@/Components/PaginationLinks.vue';
import InputField from '@/Components/InputField.vue';
import TextArea from '@/Components/TextArea.vue';
import ImageUpload from '@/Components/ImageUpload.vue';
import { ref } from 'vue';

const props = defineProps({
    products: Object,
    imageUrl: String,
})

// 初始化表单
const form = useForm({
    name: null,
    image: null,
    description: null,
    price: null,
});

// 提交表单
const submitForm = () => {
    form.post(route('tenant.products.store'), {
        onSuccess: () => {
            // 提交成功后，关闭 Modal
            closeModal();
            // 重置表单
            form.reset();
        },
    });
};

// 获取商品图片的函数
const getProductImage = (product) => {
    if (product.image_storage_type === 'central') {
        // 如果图片来自中央商品库
        return `/storage/${product.image}`;
    } else {
        // 如果图片来自租户的存储
        return `${window.location.origin}/tenancy/assets/${product.image}`;
    }
};


// 控制 Modal 的显示状态
const isModalVisible = ref(false);

// 打开 Modal 的方法
const openModal = () => {
    isModalVisible.value = true;
};

// 关闭 Modal 的方法
const closeModal = () => {
    isModalVisible.value = false;
};
</script>

<template>
    <TenantAuthenticatedLayout>
        <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
            <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    <div
                        class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                        <div class="flex items-center flex-1 space-x-4">
                            <h5>
                                <span class="text-gray-500">All Products:</span>
                                <span class="dark:text-white">123456</span>
                            </h5>
                            <!-- <h5>
                                <span class="text-gray-500">Total sales:</span>
                                <span class="dark:text-white">$88.4k</span>
                            </h5> -->
                        </div>
                        <div
                            class="ml-auto flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:space-y-0 md:space-x-3">
                            <!-- 按钮 -->
                            <button @click="openModal" type="button"
                                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add new product
                            </button>
                            <button type="button"
                                class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-purple-700/10 ring-inset">
                                    可导入1000个商品
                                </span>
                            </button>
                            <!-- <button type="button"
                                class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                Export
                            </button> -->
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">Image</th>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">Price</th>
                                    <th scope="col" class="px-4 py-3">Description</th>
                                    <th scope="col" class="px-4 py-3">Show</th>
                                    <th scope="col" class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in props.products.data" :key="product.id"
                                    class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="w-4 px-4 py-3">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox"
                                                onclick="event.stopPropagation()"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img v-if="getProductImage(product)" :src="getProductImage(product)"
                                            alt="Product Image" class="h-16 w-16 object-cover" />

                                        <!-- <img :src="getProductImage(product)" alt="Product Image"
                                            class="w-auto h-8 mr-3" /> -->
                                        <!-- <img :src="`/storage/images/${product.image || 'central-images/default.jpg'}`"
                                            alt="Product Image" class="w-auto h-8 mr-3"> -->
                                    </th>
                                    <td class="px-4 py-2">
                                        <span
                                            class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                            {{ product.name }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            <div class="inline-block w-4 h-4 mr-2 bg-red-700 rounded-full"></div>
                                            {{ product.price }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ product.description }}
                                    </td>


                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        show product detail button
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <NavLink href="#"
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Edit
                                        </NavLink>

                                        <button @click.prevent="" type="button"
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        <PaginationLinks :paginator="products" />
                    </div>
                </div>
            </div>


            <!-- Main modal -->
            <div v-if="isModalVisible" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Add Product
                            </h3>
                            <button @click="closeModal" type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <form @submit.prevent="submitForm">
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                <!-- Product Name -->
                                <div>
                                    <InputField label="商品名称" icon="heading" required="" v-model="form.name"
                                        placeholder="Type product name" />
                                </div>
                                <div>
                                    <InputField label="商品价格" icon="heading" required="" v-model="form.price"
                                        placeholder="商品价格" />
                                </div>
                                <div class="sm:col-span-2">
                                    <TextArea label="Description" icon="newspaper" placeholder="Product description"
                                        v-model="form.description" />
                                </div>
                                <div class="sm:col-span-2">
                                    <ImageUpload @image="(e) => (form.image = e)" />
                                </div>
                            </div>
                            <button :disabled="form.processing"
                                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add new product
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    </TenantAuthenticatedLayout>
</template>