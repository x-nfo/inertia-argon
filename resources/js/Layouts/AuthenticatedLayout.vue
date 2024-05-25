<script setup>
import { ref, watchEffect } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Sidebar from '@/Components/DashboardSidebar.vue';
import Header from '@/Components/DashboardHeader.vue';
import Footer from '@/Components/DashboardFooter.vue';
import Configurator from '@/Components/DashboardConfigurator.vue';
import Swal from 'sweetalert2';
import { onClickOutside } from '@vueuse/core';

//Mobile Sidebar
const isActive = ref(false);
const handleMobileSidebar = () => {
    isActive.value = !isActive.value;
};

//Argon Configurator
const configurator = ref(null);
const isConfiguratorActive = ref(false);
const handleConfigurator = () => {
    isConfiguratorActive.value = !isConfiguratorActive.value;
};

onClickOutside(configurator, (event) => (isConfiguratorActive.value = false));

// Flash Messages
watchEffect(() => {
    let flashMessage = usePage().props.flashMessage;

    if (flashMessage.success) {
        Swal.fire({
            html: flashMessage.success,
            icon: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Ok, got it!',
            customClass: {
                confirmButton:
                    'inline-flex px-7 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25',
            },
        });
    }

    if (flashMessage.error || Object.keys(usePage().props.errors).length > 0) {
        if (flashMessage.error) {
            Swal.fire({
                title: 'Server Error',
                html: flashMessage.error,
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Ok, got it!',
                customClass: {
                    confirmButton:
                        'inline-flex mt-5 mb-10 items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150',
                },
            });
        } else {
            Swal.fire({
                title: 'Validation Error',
                html: Object.keys(usePage().props.errors),
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Ok, got it!',
                customClass: {
                    confirmButton:
                        'inline-flex my-5 items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150',
                },
            });
        }
    }
});
</script>

<template>
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    <Sidebar v-model:isMobileSidebar="isActive" />

    <main
        class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl dark:bg-slate-900"
    >
        <Header
            @toggleMobileSidebar="handleMobileSidebar"
            @toggleConfig="handleConfigurator"
            v-model:isCollapseIconActive="isActive"
        />
        <!-- Cards -->
        <div class="w-full px-6 py-6 mx-auto">
            <div class="min-h-85-screen">
                <slot />
            </div>
            <Footer />
        </div>
        <!-- End Cards -->
    </main>

    <!-- Argon Configurator -->

    <Configurator
        ref="configurator"
        v-model:isConfiguratorActive="isConfiguratorActive"
    />

    <!-- End Argon Configurator-->
</template>
