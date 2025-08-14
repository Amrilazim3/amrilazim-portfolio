<script setup>
import Projects from "./Projects.vue";
const props = defineProps({
    skills: Object,
    projects: Object,
});
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
                <h2 class="section-title">Featured Projects & Case Studies</h2>
                <p class="subtitle">
                    Real projects, real results. Here's a showcase of web applications I've built for clients, 
                    featuring detailed case studies that demonstrate my problem-solving approach and technical expertise.
                </p>
            </div>
        </div>
        <Projects :skills="props.skills" :projects="props.projects" />
    </section>
</template>
