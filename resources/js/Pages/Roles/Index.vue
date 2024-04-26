<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, usePage } from '@inertiajs/vue3';
import { computed, reactive, watch } from 'vue';
import { cloneDeep, debounce, pickBy } from 'lodash';
import Create from '@/Pages/Users/Create.vue';
import Edit from '@/Pages/Users/Edit.vue';
import Delete from '@/Pages/Users/Delete.vue';
import DeleteBulk from '@/Pages/Users/DeleteBulk.vue';
import SearchBar from '@/Components/SearchBar.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import DangerButton from '@/Components/DangerButton.vue';

const page = usePage();
const onlineUser = computed(() => page.props.auth.user);

const props = defineProps({
    users: Object,
    filters: Object,
    perPage: Number,
    roles: Object,
});

const data = reactive({
    params: {
        search: props.filters.search,
        field: props.filters.field,
        order: props.filters.order,
        perPage: props.perPage,
    },
    user: null,
    dataSet: usePage().props.app.perpage,
    selectedId: [],
    isMultiple: false,
});

const order = (request) => {
    data.params.field = request;
    data.params.order = data.params.order === 'asc' ? 'desc' : 'asc';
};

watch(
    () => cloneDeep(data.params),
    debounce(() => {
        let param = pickBy(data.params);

        router.get(route('user.index'), param, {
            replace: true,
            preserveState: true,
            preserveScroll: true,
        });
    }, 150)
);

const selectAll = (event) => {
    if (event.target.checked === false) {
        data.selectedId = [];
    } else {
        props.users?.data.forEach((user) => {
            data.selectedId.push(user.id);
        });
    }
};

const select = () => {
    if (props.users?.data.length == data.selectedId.length) {
        data.isMultiple = true;
    } else {
        data.isMultiple = false;
    }
};
</script>
<template>
    <Head title="Users List" />

    <AuthenticatedLayout>
        <div class="flex flex-wrap -mx-3">
            <div class="mx-auto w-10/12 sm:px-6 lg:px-8 space-y-6 py-12">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-lg bg-clip-border"
                >
                    <div
                        class="flex flex-row justify-between items-center px-6 pb-0 mb-0 rounded-t-2xl"
                    >
                        <div class="flex items-center space-x-2">
                            <SelectInput
                                class="w-15 h-10 text-sm"
                                v-model="data.params.perPage"
                                :dataSet="data.dataSet"
                            />
                            <!-- <h5 class="dark:text-white">User table</h5> -->
                            <SearchBar v-model="data.params.search" />

                            <DeleteBulk
                                v-show="
                                    data.selectedId.length != 0 &&
                                    can(['delete user'])
                                "
                                :selectedId="data.selectedId"
                            />
                        </div>

                        <div>
                            <Create :roles="props.roles" />
                        </div>
                    </div>
                    <div class="flex-auto px-5 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table
                                class="items-center w-full mb-5 align-top border-collapse dark:border-white/40 text-slate-500"
                            >
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                        >
                                            <Checkbox
                                                class="p-2"
                                                v-model:checked="
                                                    data.isMultiple
                                                "
                                                @change="selectAll"
                                            />
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                            @click="order('name')"
                                        >
                                            Name
                                            <i
                                                v-show="
                                                    data.params.field ===
                                                        'name' &&
                                                    data.params.order === 'asc'
                                                "
                                                class="fas fa-angle-up ms-3"
                                            ></i>
                                            <i
                                                v-show="
                                                    data.params.field ===
                                                        'name' &&
                                                    data.params.order === 'desc'
                                                "
                                                class="fas fa-angle-down ms-3"
                                            ></i>
                                        </th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                            @click="order('email')"
                                        >
                                            Email
                                            <i
                                                v-show="
                                                    data.params.field ===
                                                        'email' &&
                                                    data.params.order === 'asc'
                                                "
                                                class="fas fa-angle-up ms-3"
                                            ></i>
                                            <i
                                                v-show="
                                                    data.params.field ===
                                                        'email' &&
                                                    data.params.order === 'desc'
                                                "
                                                class="fas fa-angle-down ms-3"
                                            ></i>
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                            @click="order('created_at')"
                                        >
                                            Joint Date
                                            <i
                                                v-show="
                                                    data.params.field ===
                                                        'created_at' &&
                                                    data.params.order === 'asc'
                                                "
                                                class="fas fa-angle-up ms-3"
                                            ></i>
                                            <i
                                                v-show="
                                                    data.params.field ===
                                                        'created_at' &&
                                                    data.params.order === 'desc'
                                                "
                                                class="fas fa-angle-down ms-3"
                                            ></i>
                                        </th>

                                        <th
                                            class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                        ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(user, index) in props.users
                                            .data"
                                        :key="index"
                                        class="border-b dark:border-slate-400 last:border-0"
                                    >
                                        <td
                                            class="px-6 align-middle bg-transparent dark:border-0 whitespace-nowrap shadow-transparent"
                                        >
                                            <input
                                                class="rounded p-2 dark:bg-slate-900 border-slate-300 dark:border-slate-700 text-primary dark:text-primary focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-slate-800 dark:checked:bg-primary dark:checked:border-primary"
                                                type="checkbox"
                                                @change="select"
                                                :value="user.id"
                                                v-model="data.selectedId"
                                            />
                                        </td>

                                        <td
                                            class="py-2 pr-12 align-middle bg-transparent dark:border-0 whitespace-nowrap shadow-transparent"
                                        >
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img
                                                        :src="`assets/img/team-${
                                                            index + 1
                                                        }.jpg`"
                                                        class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                        :alt="`user${index}`"
                                                    />
                                                </div>
                                                <div
                                                    class="flex flex-col justify-center"
                                                >
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        {{ user.name }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent whitespace-nowrap shadow-transparent"
                                        >
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"
                                            >
                                                {{ user.email }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal text-center align-middle bg-transparent whitespace-nowrap shadow-transparent"
                                        >
                                            {{ user.created_at }}
                                        </td>
                                        <td
                                            class="flex gap-5 justify-center items-center p-2 align-middle bg-transparent whitespace-nowrap shadow-transparent"
                                        >
                                            <Edit
                                                :roles="props.roles"
                                                :user="(data.user = user)"
                                            />
                                            <Delete
                                                :user="(data.user = user)"
                                            />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
