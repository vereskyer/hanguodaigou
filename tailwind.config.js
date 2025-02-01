import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import flowbitePlugin from 'flowbite/plugin'; // 引入 Flowbite 插件

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/flowbite/**/*.js', // Flowbite 的路径
        './node_modules/flowbite-datepicker/**/*.js', // 如果使用日期组件，可以添加这个路径
        'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx,vue}', // 如果使用 Flowbite Vue 组件，可以添加这个路径
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // 你可以根据需要扩展主题，例如添加新的颜色、间距等
            colors: {
                primary: {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60a5fa',
                    500: '#3b82f6',
                    600: '#2563eb',
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',
                },
            },
        },
    },

    plugins: [
        forms, // 表单样式插件
        flowbitePlugin, // Flowbite 插件
    ],
};
