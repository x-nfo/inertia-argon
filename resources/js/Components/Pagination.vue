<script setup>
import { router } from '@inertiajs/vue3';
import { pickBy } from 'lodash';
import { reactive, watchEffect } from 'vue';

const props = defineProps({
    links: Object,
    filters: Object,
});

const data = reactive({
    params: {
        search: props.filters?.search,
        field: props.filters?.field,
        order: props.filters?.order,
        perPage: props.filters?.perPage,
    },
});

const goto = (link) => {
    let params = pickBy(data.params);
    router.get(link, params, {
        replace: true,
        preserveState: true,
        preserveScroll: true,
    });
};

watchEffect(() => {
    data.params.search = props.filters?.search;
    data.params.field = props.filters?.field;
    data.params.order = props.filters?.order;
    data.params.perPage = props.filters?.perPage;
});
</script>
<template>
    <div class="flex justify-between pe-5">
        <div
            class="ml-2 text-slate-300 text-sm mb-5"
            v-if="links.data.length != 0"
        >
            Showing {{ links.from }}-{{ links.to }} {{ lang().label.of }}
            {{ links.total }} entries
        </div>
        <div
            class="flex flex-col items-center space-y-2 mx-auto p-6 text-lg"
            v-if="links.data.length == 0"
        >
            <i class="fa fa-search"></i>
            <p>{{ lang().label.no_data }}</p>
        </div>
        <div v-if="links.links.length > 3" class="mb-5">
            <ul
                class="hidden lg:flex justify-center items-center overflow-hidden"
            >
                <li v-for="(link, index) in links.links" :key="index">
                    <button
                        v-on:click="goto(link.url)"
                        class="px-3 py-2 ml-1.5 text-xs rounded-full border border-slate-100"
                        :class="{
                            'bg-indigo-500 text-slate-100 font-bold':
                                link.active,
                        }"
                        v-html="link.label"
                        :disabled="link.url == null"
                    ></button>
                </li>
            </ul>
        </div>
    </div>
</template>
