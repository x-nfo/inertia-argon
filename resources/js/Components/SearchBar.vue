<script setup>
import { ref } from 'vue';

const input = ref(null);

const search = defineModel();
</script>

<template>
    <div
        class="flex items-center h-11 relative my-1 border-slate-300 dark:border-slate-750 border px-3 rounded-lg"
    >
        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
        <i
            class="fa fa-search text-slate-300 text-sm dark:text-slate-400"
            aria-hidden="true"
        ></i>
        <!--end::Svg Icon-->

        <input
            type="text"
            class="block w-50 border-0 focus:ring-0 dark:bg-slate-850 text-sm"
            placeholder="Search..."
            ref="input"
            name="search"
            v-model="search"
        />
    </div>
</template>
