<script setup>
import { ref, onMounted, reactive } from "vue";
import { Link } from '@inertiajs/inertia-vue3'
const showMobileMenu = ref(false);
const scrollBg = ref(false);

const navigations = reactive([
    { name: "Home", href: "#home", active: true },
    { name: "About", href: "#about", active: false },
    { name: "Portfolio", href: "#portfolio", active: false },
    { name: "Services", href: "#services", active: false },
    // { name: "Testimonials", href: "#testimonials", active: false },
    { name: "Learning", href: "#certifications", active: false },
    { name: "Contact", href: "#contact", active: false },
    { name: "Resume", href: route().t.url + '/img/amrilresumeJULY25.pdf', active: false },
]);

const setScrollBg = (value) => {
    scrollBg.value = value;
};

const activeLink = (index, event) => {
    const navigation = navigations[index];
    
    // Handle smooth scrolling for internal links
    if (navigation.href.startsWith('#')) {
        event.preventDefault();
        const targetElement = document.querySelector(navigation.href);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
    
    // Close mobile menu after clicking
    showMobileMenu.value = false;
    
    // Update active state
    navigations.forEach((link, key) => {
        if (key === index) {
            link.active = true;
        } else {
            link.active = false;
        }
    });
};

onMounted(() => {
    window.addEventListener("scroll", () => {
        return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
    });
});
</script>
<template>
    <nav
        class="w-full fixed z-20 border-gray-200 px-2 sm:px-4 py-2.5 rounded"
        :class="{
            'bg-light-primary dark:bg-dark-primary': scrollBg,
            'bg-white dark:bg-slate-800': !scrollBg,
        }"
    >
        <div
            class="container flex flex-wrap justify-between items-center mx-auto"
            bis_skin_checked="1"
        >
            <Link :href="route().t.url" class="flex items-center">
                <img
                    :src="route().t.url + '/img/logo.png'"
                    class="mr-3 h-6 sm:h-9"
                    alt="User Icon"
                />
                <span
                    class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"
                    >amril azim</span
                >
            </Link>
            <button
                @click="showMobileMenu = !showMobileMenu"
                data-collapse-toggle="navbar-default"
                type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 transition-colors duration-200"
                aria-controls="navbar-default"
                :aria-expanded="showMobileMenu"
                aria-label="Toggle navigation menu"
            >
                <span class="sr-only">{{ showMobileMenu ? 'Close' : 'Open' }} main menu</span>
                <svg
                    class="w-6 h-6"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </button>
            <div
                class="w-full md:block md:w-auto transition-all duration-300 ease-in-out"
                :class="{ hidden: !showMobileMenu }"
                id="navbar-default"
                bis_skin_checked="1"
            >
                <ul
                    class="flex flex-col p-4 mt-4 rounded-lg border border-light-tail-500 dark:border-dark-navy-100 md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0"
                    role="navigation"
                    aria-label="Main navigation"
                >
                    <li v-for="(navigation, index) in navigations" :key="index">
                        <a
                            @click="activeLink(index, $event)"
                            :href="navigation.href"
                            class="block py-2 pr-4 pl-3 rounded transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-accent"
                            :class="
                                navigation.active
                                    ? 'text-light-tail-100 dark:text-white bg-accent/20'
                                    : 'text-light-tail-500 dark:text-dark-navy-100 hover:text-light-tail-100 dark:hover:text-white hover:bg-accent/10'
                            "
                            :aria-current="navigation.active ? 'page' : null"
                            >{{ navigation.name }}</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
