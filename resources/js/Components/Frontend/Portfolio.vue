<script setup>
import Projects from "./Projects.vue";
import { computed } from 'vue';

const props = defineProps({
    skills: Object,
    projects: Object,
    portfolioData: Object,
});

const title = computed(() => props.portfolioData?.title);
const subtitle = computed(() => props.portfolioData?.subtitle);
</script>
<template>
    <section
    id="portfolio"
    class="section bg-light-primary dark:bg-dark-primary"
>
        <div
            class="container mx-auto"
            v-motion
            :initial="{
                opacity: 0,
                y: 100,
            }"
            :visible="{
                opacity: 1,
                y: 0,
            }"
        >
            <div class="flex flex-col items-center text-center">
                <h2 class="section-title">{{ title }}</h2>
                <p class="subtitle">{{ subtitle }}</p>
            </div>
        </div>
        <Projects :skills="props.skills" :projects="props.projects" />
    </section>
</template>
