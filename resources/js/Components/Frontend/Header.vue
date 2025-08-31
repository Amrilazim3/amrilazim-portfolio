<script setup>
import { computed, ref, onMounted, reactive, onUnmounted } from "vue";
import { Link } from '@inertiajs/inertia-vue3'
const showMobileMenu = ref(false);
const scrollBg = ref(false);
const currentSection = ref('home');

const props = defineProps({
    resumeFile: {
        type: String,
        default: () => ''
    }
});

const resumeFile = computed(() => props.resumeFile);

const navigations = reactive([
    { name: "Home", href: "#home", active: true },
    { name: "About", href: "#about", active: false },
    { name: "Portfolio", href: "#portfolio", active: false },
    { name: "Services", href: "#services", active: false },
    // { name: "Testimonials", href: "#testimonials", active: false },
    { name: "Learning", href: "#certifications", active: false },
    { name: "Contact", href: "#contact", active: false },
    { name: "Resume", href: resumeFile.value, active: false },
]);

const setScrollBg = (value) => {
    scrollBg.value = value;
};

const updateActiveSection = () => {
    const sections = ['home', 'about', 'portfolio', 'services', 'certifications', 'contact'];
    const scrollPosition = window.scrollY + 100; // Offset to trigger earlier
    
    for (let i = sections.length - 1; i >= 0; i--) {
        const section = document.getElementById(sections[i]);
        if (section && scrollPosition >= section.offsetTop) {
            currentSection.value = sections[i];
            
            // Update navigation active states based on current section
            navigations.forEach((nav, index) => {
                const sectionName = nav.href.replace('#', '');
                if (sectionName === 'certifications' && currentSection.value === 'certifications') {
                    nav.active = nav.name === 'Learning';
                } else if (sectionName === currentSection.value) {
                    nav.active = true;
                } else if (nav.name !== 'Resume') {
                    nav.active = false;
                }
            });
            break;
        }
    }
};

const activeLink = (index, event) => {
    const navigation = navigations[index];
    
    // Track analytics for different link types
    if (typeof window !== 'undefined' && window.gtag) {
        if (navigation.name === 'Resume') {
            // Track resume download
            window.gtag('event', 'file_download', {
                event_category: 'engagement',
                event_label: 'resume_download',
                value: 1
            });
        } else {
            // Track navigation clicks
            window.gtag('event', 'navigation_click', {
                event_category: 'engagement',
                event_label: navigation.name.toLowerCase(),
                value: 1
            });
        }
    }
    
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
};

let scrollHandler;

onMounted(() => {
    scrollHandler = () => {
        const scrollY = window.scrollY;
        setScrollBg(scrollY > 50);
        updateActiveSection();
    };
    
    window.addEventListener("scroll", scrollHandler);
    // Initial call to set correct active section
    updateActiveSection();
});

onUnmounted(() => {
    if (scrollHandler) {
        window.removeEventListener("scroll", scrollHandler);
    }
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
                            class="block py-2 pr-4 pl-3 rounded transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-accent"
                            :class="[
                                navigation.active
                                    ? navigation.name === 'Contact' 
                                        ? 'text-white bg-accent shadow-lg scale-105 ring-2 ring-accent/50' 
                                        : 'text-light-tail-100 dark:text-white bg-accent/20'
                                    : 'text-light-tail-500 dark:text-dark-navy-100 hover:text-light-tail-100 dark:hover:text-white hover:bg-accent/10',
                                navigation.name === 'Contact' && navigation.active ? 'font-semibold' : ''
                            ]"
                            :aria-current="navigation.active ? 'page' : null"
                        >
                            <span class="flex items-center">
                                {{ navigation.name }}
                                <svg 
                                    v-if="navigation.name === 'Contact' && navigation.active" 
                                    class="ml-2 w-4 h-4 animate-pulse" 
                                    fill="currentColor" 
                                    viewBox="0 0 20 20"
                                >
                                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
