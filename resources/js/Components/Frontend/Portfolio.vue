<script setup>
import Projects from "./Projects.vue";
defineProps({
    skills: Object,
    projects: Object,
});
</script>
<template>
    <section
        id="portfolio"
        class="section bg-light-primary dark:bg-dark-primary min-h-[1400px]"
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
                <h2 class="section-title">My Projects!</h2>
                <p class="subtitle">
                    Laravel is current favourite framework to work with any
                    projects because it can do everything from front to the back
                    end side.
                </p>
            </div>
        </div>
        <Projects :skills="skills" :projects="projects" />
    </section>
</template>
