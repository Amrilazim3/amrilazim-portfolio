<script setup>
import { computed } from 'vue';

const props = defineProps({
    aboutData: {
        type: Object,
        default: () => ({})
    }
});

// Computed properties with fallbacks
const title = computed(() => props.aboutData?.title);
const subtitle = computed(() => props.aboutData?.subtitle);
const description = computed(() => props.aboutData?.description);
const approachText = computed(() => props.aboutData?.approach_text);
const aboutImage = computed(() => props.aboutData?.image);
const frontendSkills = computed(() => props.aboutData?.frontend_skills);
const backendSkills = computed(() => props.aboutData?.backend_skills);
const devopsSkills = computed(() => props.aboutData?.devops_skills);
</script>

<template>
    <section
        id="about"
        class="section bg-light-secondary dark:bg-dark-secondary"
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
            <div class="flex flex-col xl:flex-row gap-24">
                <img
                    class="object-cover h-full w-[566px] md:mx-auto lg:mx-0 rounded-2xl"
                    :src="aboutImage"
                    :alt="`${title} - About Me`"
                    loading="lazy"
                />
                <div
                    class="flex flex-col items-center text-center lg:items-start lg:text-left"
                >
                    <div class="flex flex-col">
                        <h2
                            class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-4"
                        >
                            {{ title }}
                        </h2>
                        <p class="mb-3 text-accent">{{ subtitle }}</p>
                        <hr class="mb-6 opacity-90 dark:opacity-5" />
                        <p class="mb-6 leading-relaxed" v-html="description"></p>
                        
                        <div class="mb-6">
                            <h3 class="font-semibold text-lg mb-4 text-gray-900 dark:text-white">🎯 What I Excel At:</h3>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-accent rounded-full mr-3"></span>
                                    <span><strong>Frontend:</strong> {{ frontendSkills.join(', ') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-accent rounded-full mr-3"></span>
                                    <span><strong>Backend:</strong> {{ backendSkills.join(', ') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-accent rounded-full mr-3"></span>
                                    <span><strong>DevOps:</strong> {{ devopsSkills.join(', ') }}</span>
                                </div>
                            </div>
                        </div>

                        <p class="mb-6 leading-relaxed text-sm bg-gray-50 dark:bg-gray-800 p-4 rounded-lg border-l-4 border-accent" v-html="approachText"></p>
                    </div>
                    <a
                        href="#contact"
                        class="btn btn-md bg-accent text-light-tail-100"
                    >
                        Contact me
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
