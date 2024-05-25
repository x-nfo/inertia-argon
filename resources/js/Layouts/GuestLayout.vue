<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import { useDark } from '@vueuse/core';
import { watchEffect } from 'vue';

const year = new Date().getFullYear();

const isDark = useDark();

watchEffect(() => {
    if (isDark.value == true) {
        localStorage.setItem('data-theme', 'dark');
    }
});
</script>

<template>
    <div class="container sticky top-0 z-sticky">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 flex-0">
                <!-- Navbar -->
                <nav
                    class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 m-6 mb-0 shadow-sm rounded-xl bg-white/80 dark:bg-slate-750/70 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start"
                >
                    <div
                        class="flex items-center justify-between w-full p-0 px-6 mx-auto flex-wrap-inherit"
                    >
                        <Link
                            class="py-1.75 text-sm mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 dark:text-slate-100 lg:ml-0"
                            :href="route('dashboard')"
                            target="_blank"
                        >
                            Argon Dashboard 2
                        </Link>
                        <button
                            navbar-trigger
                            class="px-3 py-1 ml-2 leading-none transition-all ease-in-out bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg lg:hidden"
                            type="button"
                            aria-controls="navigation"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span
                                class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none"
                            >
                                <span
                                    bar1
                                    class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"
                                ></span>
                                <span
                                    bar2
                                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"
                                ></span>
                                <span
                                    bar3
                                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"
                                ></span>
                            </span>
                        </button>
                        <div
                            navbar-menu
                            class="items-center flex-grow transition-all duration-500 lg-max:overflow-hidden ease lg-max:max-h-0 basis-full lg:flex lg:basis-auto"
                        >
                            <ul
                                class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto"
                            >
                                <li>
                                    <Link
                                        class="flex items-center px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 dark:text-slate-100 lg:px-2"
                                        aria-current="page"
                                        :href="route('dashboard')"
                                    >
                                        <i
                                            class="mr-1 fa fa-chart-pie opacity-60"
                                        ></i>
                                        Dashboard
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 dark:text-slate-100 lg:px-2"
                                        :href="route('profile.edit')"
                                    >
                                        <i
                                            class="mr-1 fa fa-user opacity-60"
                                        ></i>
                                        Profile
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 dark:text-slate-100 lg:px-2"
                                        :href="route('register')"
                                    >
                                        <i
                                            class="mr-1 fas fa-user-circle opacity-60"
                                        ></i>
                                        Sign Up
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 dark:text-slate-100 lg:px-2"
                                        :href="route('login')"
                                    >
                                        <i
                                            class="mr-1 fas fa-key opacity-60"
                                        ></i>
                                        Sign In
                                    </Link>
                                </li>
                            </ul>
                            <!-- online builder btn  -->
                            <!-- <li class="flex items-center">
                  <a
                    class="leading-pro ease-in text-blue-500 border-blue-500 text-xs tracking-tight-rem bg-150 bg-x-25 rounded-3.5xl hover:border-blue-500 hover:-translate-y-px hover:text-blue-500 active:hover:border-blue-500 active:hover:-translate-y-px active:hover:text-blue-500 active:opacity-85 active:shadow-xs active:bg-blue-500 active:border-blue-500 mr-2 mb-0 inline-block cursor-pointer border border-solid bg-transparent py-2 px-8 text-center align-middle font-bold uppercase shadow-none transition-all hover:bg-transparent hover:opacity-75 hover:shadow-none active:scale-100 active:text-white active:hover:bg-transparent active:hover:opacity-75 active:hover:shadow-none"
                    target="_blank"
                    href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053"
                    >Online Builder</a
                  >
                </li> -->
                            <ul
                                class="hidden pl-0 mb-0 list-none lg:block lg:flex-row"
                            >
                                <li>
                                    <a
                                        href="https://www.creative-tim.com/product/argon-dashboard-tailwind"
                                        target="_blank"
                                        class="inline-block px-8 py-2 mb-0 mr-1 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer hover:-translate-y-px hover:shadow-xs active:opacity-85 text-xs tracking-tight-rem"
                                        >Free Download</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div
                class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover"
            >
                <div class="container z-1">
                    <div class="flex flex-wrap -mx-3">
                        <div
                            class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12"
                        >
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border"
                            >
                                <slot />
                            </div>
                        </div>
                        <div
                            class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex"
                        >
                            <div
                                class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg')] rounded-xl"
                            >
                                <span
                                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"
                                ></span>
                                <h4 class="z-20 mt-12 font-bold text-white">
                                    "Attention is the new currency"
                                </h4>
                                <p class="z-20 text-white">
                                    The more effortless the writing looks, the
                                    more effort the writer actually put into the
                                    process.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-12">
        <div class="container">
            <div class="flex flex-wrap -mx-3">
                <div
                    class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:flex-0 lg:w-8/12"
                >
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
                    >
                        Company
                    </a>
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
                    >
                        About Us
                    </a>
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
                    >
                        Team
                    </a>
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
                    >
                        Products
                    </a>
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
                    >
                        Blog
                    </a>
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"
                    >
                        Pricing
                    </a>
                </div>
                <div
                    class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12"
                >
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mr-6 text-slate-400"
                    >
                        <span class="text-lg fab fa-dribbble"></span>
                    </a>
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mr-6 text-slate-400"
                    >
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mr-6 text-slate-400"
                    >
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mr-6 text-slate-400"
                    >
                        <span class="text-lg fab fa-pinterest"></span>
                    </a>
                    <a
                        href="javascript:;"
                        target="_blank"
                        class="mr-6 text-slate-400"
                    >
                        <span class="text-lg fab fa-github"></span>
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div
                    class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0"
                >
                    <p class="mb-0 text-slate-400">
                        Copyright ©
                        {{ year }}
                        Argon Dashboard 2 by Creative Tim.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</template>
