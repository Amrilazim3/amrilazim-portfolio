<script setup>
import { computed } from 'vue';

const props = defineProps({
    heroData: {
        type: Object,
        default: () => ({})
    },
    socialLinks: {
        type: Array,
        default: () => []
    }
});

// Computed properties with fallbacks
const greeting = computed(() => props.heroData?.greeting || '👋 Hey, I\'m Amril');
const title = computed(() => props.heroData?.title || 'I Build Amazing');
const titleHighlight = computed(() => props.heroData?.title_highlight || 'Digital Experiences');
const description = computed(() => props.heroData?.description || 'Full-stack developer with experience...');
const ctaText = computed(() => props.heroData?.cta_text || 'Work with me');
const ctaLink = computed(() => props.heroData?.cta_link || '/#contact');
const heroImage = computed(() => props.heroData?.image || '/img/hero-mh3f1u.jpeg');
const resumeFile = computed(() => props.heroData?.resume_file || '/img/amrilresumeJULY25.pdf');

// Function to track social media clicks
const trackSocialClick = (platform) => {
    if (typeof window !== 'undefined' && window.gtag) {
        window.gtag('event', 'social_click', {
            event_category: 'engagement',
            event_label: platform,
            value: 1
        });
    }
};
</script>
<template>
    <section
        id="home"
        class="flex items-center bg-light-primary dark:bg-dark-primary py-32 lg:py-0 overflow-hidden"
    >
        <div class="container mx-auto h-full">
            <div
                class="flex flex-col md:flex-row items-center h-full pt-8 lg:my-36"
            >
                <div class="flex-1 flex flex-col items-center lg:items-start">
                    <p class="text-lg text-accent text-md mb-[22px] animate-pulse">
                        {{ greeting }}
                    </p>
                    <h1
                        class="text-4xl leading-[44px] md:text-5xl md:leading-tight lg:text-7xl lg:leading-[1.2] font-bold md:tracking-[-2px]"
                    >
                        {{ title }}
                        <span class="text-accent">{{ titleHighlight }}</span>
                    </h1>
                    <p
                        class="pt-4 pb-6 md:pt-6 md:pb-8 max-w-[520px] text-lg text-center lg:text-left leading-relaxed"
                        v-html="description"
                    ></p>
                    <button
                        class="btn btn-md bg-accent hover:bg-light-secondary hover:text-light-tail-500 dark:hover:bg-dark-secondary dark:hover:text-dark-navy-100 md:btn-lg transition-all"
                        @click="trackSocialClick('hero_cta')"
                    >
                        <a :href="ctaLink">{{ ctaText }}</a>
                    </button>
                    <div class="pt-12">
                        <h5
                            class="text-lg flex justify-center lg:justify-start items-center text-black dark:text-white mb-2"
                        >
                            Follow me on
                        </h5>
                        <div class="flex items-center mb-6">
                            <a
                                v-for="link in socialLinks"
                                :key="link.id"
                                class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-black dark:text-white hover:bg-light-secondary hover:border-light-secondary dark:hover:bg-dark-secondary dark:hover:border-dark-secondary mr-3 sm:mr-4"
                                :href="link.url"
                                @click="trackSocialClick(link.platform.toLowerCase())"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <div v-html="link.icon_svg" class="w-5 h-5"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-1 justify-end items-center h-full mt-8 md:mt-0"
                >
                    <img
                        class="rounded-lg"
                        :src="heroImage"
                        :alt="`${greeting.replace('👋 ', '').replace(',', '')} - Full Stack Developer`"
                        loading="eager"
                        fetchpriority="high"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
