module.exports = {
    env: {
        browser: true,
        es2021: true,
    },
    extends: [
        'eslint:recommended',
        'plugin:@typescript-eslint/recommended',
        'plugin:vue/vue3-recommended',
        'plugin:prettier/recommended',
        './.eslintrc-auto-import.json',
    ],
    overrides: [
        {
            env: {
                node: true,
            },
            files: ['.eslintrc.{js,cjs}'],
            parserOptions: {
                sourceType: 'script',
            },
        },
    ],
    parserOptions: {
        ecmaVersion: 'latest',
        parser: '@typescript-eslint/parser',
        sourceType: 'module',
    },
    plugins: ['@typescript-eslint', 'vue', 'prettier'],
    rules: {
        indent: ['error', 4],
        semi: ['error', 'always'],
        'no-console': 'warn',
        'no-debugger': 'warn',
        'linebreak-style': ['error', 'unix'],
        'vue/multi-word-component-names': 'off',
        'vue/require-default-prop': 'off',
        'vue/no-dupe-keys': 'off',
        'vue/attributes-order': 'error',
        'vue/order-in-components': 'error',
        'vue/attribute-hyphenation': ['warn', 'never'],
        'vue/v-on-event-hyphenation': ['warn', 'never'],
        'no-undef': 'off',
        'vue/html-indent': ['error', 4],
        'vue/no-v-text-v-html-on-component': ['error', { allow: ['component'] }],
        'vue/no-v-html': 'off',
        'vue/max-attributes-per-line': [
            'error',
            {
                singleline: {
                    max: 20,
                },
                multiline: {
                    max: 4,
                },
            },
        ],
        '@typescript-eslint/no-unused-vars': ['error', { ignoreRestSiblings: true }],
        '@typescript-eslint/consistent-type-imports': [
            'error',
            {
                prefer: 'type-imports',
                disallowTypeAnnotations: true,
                fixStyle: 'separate-type-imports',
            },
        ],
        'prettier/prettier': [
            'error',
            {
                singleAttributePerLine: false,
                semi: true,
                singleQuote: true,
                printWidth: 130,
                trailingComma: 'es5',
            },
        ],
    },
};
