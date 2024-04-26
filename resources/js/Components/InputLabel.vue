<script setup>
import { computed } from 'vue';
const props = defineProps({
    value: {
        type: String,
    },
    isRequired: { type: Boolean, default: false, required: false },
});

const inputRequired = computed(() => {
    if (props.isRequired) {
        return `<span class='text-red-500'>*</span>`;
    }
});
</script>

<template>
    <label
        class="block font-semibold text-sm text-gray-700 dark:text-slate-500"
    >
        <span v-if="value">
            {{ value }}

            <span v-if="isRequired" class="text-red-500">*</span>
        </span>

        <span v-else><slot /></span>
    </label>
</template>
