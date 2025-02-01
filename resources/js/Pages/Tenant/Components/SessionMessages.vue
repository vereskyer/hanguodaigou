<!-- resources/js/Pages/Tenant/Components/SessionMessages.vue -->
<script setup>
import { watch, ref } from 'vue';

const props = defineProps({
    status: String,
    success: String,
    error: String,
});

const show = ref(false);

// 监听所有消息属性的变化
watch(
    () => [props.status, props.success, props.error],
    (newValues) => {
        if (newValues.some(value => value)) {
            // 有新消息时显示
            show.value = true;
            // 3秒后隐藏
            setTimeout(() => {
                show.value = false;
            }, 3000);
        }
    },
    { immediate: true }
);
</script>

<template>
    <Transition
        enter-active-class="transition ease-out duration-300"
        enter-from-class="transform opacity-0"
        enter-to-class="transform opacity-100"
        leave-active-class="transition ease-in duration-300"
        leave-from-class="transform opacity-100"
        leave-to-class="transform opacity-0"
    >
        <div v-if="show && (status || success || error)" class="fixed top-4 right-4 z-50">
            <div v-if="status || success" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
                {{ status || success }}
            </div>
            <div v-if="error" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
                {{ error }}
            </div>
        </div>
    </Transition>
</template>