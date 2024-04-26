<script setup>
import { usePage, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const titlePage = computed(() =>
    usePage().props.route.title.replace(/\./g, ' / ')
);
</script>

<template>
    <nav>
        <!-- breadcrumb -->
        <ol
            class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16"
        >
            <li class="text-sm leading-normal">
                <a class="text-white opacity-50" href="javascript:;">Pages</a>
            </li>
            <li
                class="text-sm pl-1 opacity-50 capitalize leading-normal text-white before:float-left before:pr-1 before:text-white before:content-['/']"
                aria-current="page"
            >
                {{ titlePage }}
            </li>
        </ol>
        <h6 class="mb-0 font-bold text-white capitalize">
            {{ titlePage }}
        </h6>
    </nav>
</template>
