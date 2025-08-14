<script setup>
import { computed } from 'vue';

const props = defineProps({
    certifications: Object,
    learningData: Object
});

const title = computed(() => props.learningData?.title);
const subtitle = computed(() => props.learningData?.subtitle);
const phylosophyTitle = computed(() => props.learningData?.phylosophy?.title);
const phylosophyDescription = computed(() => props.learningData?.phylosophy?.description);
const hoursValue = computed(() => props.learningData?.hours?.value);
const hoursDescription = computed(() => props.learningData?.hours?.description);
const yearsValue = computed(() => props.learningData?.years?.value);
const yearsDescription = computed(() => props.learningData?.years?.description);
const coursesValue = computed(() => props.learningData?.courses?.value);
const coursesDescription = computed(() => props.learningData?.courses?.description);
</script>

<template>
    <section 
        id="certifications" 
        class="section bg-light-primary dark:bg-dark-primary"
    >
        <div class="container mx-auto">
            <div
                class="flex flex-col items-center text-center mb-12"
                v-motion
                :initial="{ opacity: 0, y: 100 }"
                :visible="{ opacity: 1, y: 0 }"
            >
                <h2 class="section-title">{{ title }}</h2>
                <p class="subtitle">
                    {{ subtitle }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12" v-if="props.certifications.length > 0">
                <div
                    v-for="(certification, index) in props.certifications"
                    :key="certification.id"
                    class="bg-white dark:bg-dark-navy-500 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6"
                    v-motion
                    :initial="{ opacity: 0, y: 50 }"
                    :visible="{ 
                        opacity: 1, 
                        y: 0,
                        transition: { delay: index * 100 }
                    }"
                >
                    <!-- Course Header -->
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 dark:text-white">{{ certification.title }}</h3>
                                <p class="text-accent text-sm font-medium">{{ certification.platform }}</p>
                            </div>
                        </div>
                        <span class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded-full text-xs font-medium">
                            {{ certification.status.charAt(0).toUpperCase() + certification.status.slice(1) }}
                        </span>
                    </div>

                    <!-- Instructor -->
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-3">
                        <span class="font-medium">Instructor:</span> {{ certification.instructor }}
                    </p>

                    <!-- Description -->
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 leading-relaxed">
                        {{ certification.description }}
                    </p>

                    <!-- Skills -->
                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Skills Covered:</h4>
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="skill in certification.skills"
                                :key="skill"
                                class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-2 py-1 rounded text-xs"
                            >
                                {{ skill }}
                            </span>
                        </div>
                    </div>

                    <!-- Course Info -->
                    <div class="border-t border-gray-200 dark:border-gray-600 pt-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Duration</p>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ certification.duration }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Completed</p>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ certification.date }}</p>
                                </div>
                            </div>
                            <a
                                v-if="certification.courseUrl"
                                :href="certification.courseUrl"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-accent hover:text-accent-hover text-sm font-medium flex items-center"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                View Course
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty State -->
            <div 
                v-else
                class="text-center py-12"
                v-motion
                :initial="{ opacity: 0, y: 50 }"
                :visible="{ opacity: 1, y: 0 }"
            >
                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No Certifications Yet</h3>
                <p class="text-gray-600 dark:text-gray-300">Check back soon for new certifications and learning achievements!</p>
            </div>

            <!-- Learning Philosophy -->
            <div 
                class="bg-gradient-to-r from-accent/10 to-accent/5 dark:from-accent/20 dark:to-accent/10 rounded-2xl p-8 text-center"
                v-motion
                :initial="{ opacity: 0, y: 50 }"
                :visible="{ opacity: 1, y: 0, transition: { delay: 600 } }"
            >
                <div class="max-w-3xl mx-auto">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">
                        {{ phylosophyTitle }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        {{ phylosophyDescription }}
                    </p>
                    <div class="grid md:grid-cols-3 gap-6 mt-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">{{ props.certifications.length }}+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">{{ coursesDescription }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">{{ hoursValue }}</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">{{ hoursDescription }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">{{ yearsValue }}</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">{{ yearsDescription }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template> 