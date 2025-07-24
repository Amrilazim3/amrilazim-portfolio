<script setup>
import { computed } from 'vue';
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    project: Object,
});

// Fallback values for projects that might not have all new fields populated yet
const projectDetails = computed(() => ({
    description: props.project.detailed_description || `Professional ${props.project.skill.name} project showcasing modern development practices and clean code architecture.`,
    technologies: props.project.technologies || [props.project.skill.name, 'HTML', 'CSS', 'JavaScript'],
    features: props.project.features || ['Responsive Design', 'Modern UI', 'Clean Code', 'Best Practices'],
    challenge: props.project.challenge || 'Delivering a high-quality solution that meets client requirements.',
    solution: props.project.solution || 'Applied industry best practices and modern development methodologies.',
    duration: props.project.duration || '1-2 months',
    outcome: props.project.outcome || 'Successfully delivered a professional solution exceeding client expectations.'
}));

// Format project type for display
const projectTypeLabel = computed(() => {
    const types = {
        'client': 'Client Project',
        'personal': 'Personal Project',
        'open_source': 'Open Source',
        'freelance': 'Freelance Project'
    };
    return types[props.project.type] || 'Personal Project';
});
</script>

<template>
    <div
        class="group bg-white dark:bg-dark-navy-500 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden"
        v-motion
        :initial="{ opacity: 0, y: 50 }"
        :enter="{ opacity: 1, y: 0 }"
    >
        <!-- Project Image -->
        <div class="relative overflow-hidden">
            <img
                class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
                :src="project.image"
                :alt="`${project.name} - ${project.skill.name} Project`"
                loading="lazy"
            />
            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <a
                    v-if="project.project_url"
                    :href="project.project_url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="bg-white text-gray-900 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors flex items-center mr-2"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    View Live
                </a>
                <a
                    v-if="project.github_url"
                    :href="project.github_url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="bg-gray-800 text-white px-4 py-2 rounded-lg font-medium hover:bg-gray-700 transition-colors flex items-center"
                >
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.374 0 0 5.373 0 12 0 17.302 3.438 21.8 8.207 23.387c.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                    </svg>
                    GitHub
                </a>
            </div>
        </div>

        <!-- Project Content -->
        <div class="p-6">
            <!-- Project Header -->
            <div class="mb-4">
                <div class="flex items-center justify-between mb-3">
                    <span class="inline-block bg-accent/10 text-accent px-3 py-1 rounded-full text-sm font-medium">
                        {{ project.skill.name }}
                    </span>
                    <span class="text-xs text-gray-500 dark:text-gray-400 font-medium">
                        {{ projectTypeLabel }}
                    </span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                    {{ project.name }}
                </h3>
            </div>

            <!-- Project Description -->
            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                {{ projectDetails.description }}
            </p>

            <!-- Technologies -->
            <div class="mb-4" v-if="projectDetails.technologies.length > 0">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Technologies Used:</h4>
                <div class="flex flex-wrap gap-2">
                    <span
                        v-for="tech in projectDetails.technologies"
                        :key="tech"
                        class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded text-xs"
                    >
                        {{ tech }}
                    </span>
                </div>
            </div>

            <!-- Key Features -->
            <div class="mb-4" v-if="projectDetails.features.length > 0">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Key Features:</h4>
                <ul class="text-xs text-gray-600 dark:text-gray-300 space-y-1">
                    <li
                        v-for="feature in projectDetails.features.slice(0, 3)"
                        :key="feature"
                        class="flex items-center"
                    >
                        <svg class="w-3 h-3 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        {{ feature }}
                    </li>
                </ul>
            </div>

            <!-- Project Stats -->
            <div class="grid grid-cols-2 gap-4 text-center pt-3 border-t border-gray-200 dark:border-gray-600">
                <div>
                    <div class="text-sm font-semibold text-accent">Duration</div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">{{ projectDetails.duration }}</div>
                </div>
                <div>
                    <div class="text-sm font-semibold text-accent">Type</div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">{{ projectTypeLabel }}</div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="mt-3">
                <a
                    v-if="project.project_url"
                    :href="project.project_url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full bg-accent hover:bg-accent-hover text-white py-2 px-4 rounded-lg transition-colors duration-200 text-sm font-medium text-center block"
                >
                    View Case Study
                </a>
                <a
                    v-else-if="project.github_url"
                    :href="project.github_url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded-lg transition-colors duration-200 text-sm font-medium text-center block"
                >
                    View on GitHub
                </a>
                <div
                    v-else
                    class="w-full bg-gray-200 dark:bg-gray-600 text-gray-500 dark:text-gray-400 py-2 px-4 rounded-lg text-sm font-medium text-center"
                >
                    Project Details
                </div>
            </div>
        </div>
    </div>
</template>
