import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import AutoImport from 'unplugin-auto-import/vite';
import Components from 'unplugin-vue-components/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.ts',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        AutoImport({
            include: [
                /\.[tj]sx?$/, // .ts, .tsx, .js, .jsx
                /\.vue$/,
                /\.vue\?vue/, // .vue
                /\.md$/, // .md
            ],
            imports: [
                'vue',
                { axios: ['AxiosError', ['default', 'axios']] },
                {
                    from: 'vue',
                    imports: ['MaybeRef', 'MaybeRefOrGetter', 'Ref'],
                    type: true,
                },
                {
                    '@inertiajs/vue3': ['Link', 'router', 'usePage'],
                },
                {
                    'ziggy-js': ['route'],
                },
            ],
            dirs: ['./resources/js/composables/**'],
            vueTemplate: true,
            eslintrc: {
                enabled: true,
            },
        }),
        Components({
            dts: true,
            dirs: ['resources/js/components'],
        }),
    ],
});
