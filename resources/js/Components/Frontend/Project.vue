<script setup>
import { ref } from 'vue';
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    project: Object,
});

// Enhanced project data with case study details
const getProjectDetails = (project) => {
    // Demo case study data - in real app this would come from database
    const caseStudies = {
        'E-commerce Platform': {
            description: 'A comprehensive e-commerce solution built with Laravel and Vue.js, featuring advanced inventory management, payment processing, and customer analytics.',
            technologies: ['Laravel', 'Vue.js', 'MySQL', 'Stripe API', 'Redis'],
            features: ['User Authentication', 'Shopping Cart', 'Payment Integration', 'Admin Dashboard', 'Real-time Notifications'],
            challenge: 'Building a scalable platform that could handle high traffic during sales events.',
            solution: 'Implemented Redis caching, database optimization, and queue management for better performance.',
            duration: '3 months',
            outcome: 'Increased client sales by 40% and improved page load times by 60%.'
        },
        'Task Management App': {
            description: 'A modern task management application with real-time collaboration features, built for teams to streamline their workflow and boost productivity.',
            technologies: ['Vue.js', 'Laravel', 'WebSockets', 'PostgreSQL', 'Docker'],
            features: ['Real-time Collaboration', 'Task Assignment', 'Progress Tracking', 'Team Chat', 'File Sharing'],
            challenge: 'Creating seamless real-time updates across multiple users without performance issues.',
            solution: 'Used WebSockets with Laravel Broadcasting and optimized database queries for real-time performance.',
            duration: '2 months',
            outcome: 'Improved team productivity by 35% and reduced project completion time by 25%.'
        },
        'Portfolio Website': {
            description: 'A responsive portfolio website showcasing creative work with smooth animations, optimized performance, and modern design principles.',
            technologies: ['Vue.js', 'Tailwind CSS', 'Laravel', 'Inertia.js', 'Vite'],
            features: ['Responsive Design', 'Dark Mode', 'Contact Form', 'Admin Panel', 'SEO Optimization'],
            challenge: 'Creating an impressive visual experience while maintaining fast loading times.',
            solution: 'Implemented lazy loading, image optimization, and modern CSS techniques for optimal performance.',
            duration: '1 month',
            outcome: 'Achieved 95+ Google PageSpeed score and 100% accessibility rating.'
        }
    };
    
    return caseStudies[project.name] || {
        description: `Professional ${project.skill.name} project showcasing modern development practices and clean code architecture.`,
        technologies: [project.skill.name, 'HTML', 'CSS', 'JavaScript'],
        features: ['Responsive Design', 'Modern UI', 'Clean Code', 'Best Practices'],
        challenge: 'Delivering a high-quality solution that meets client requirements.',
        solution: 'Applied industry best practices and modern development methodologies.',
        duration: '1-2 months',
        outcome: 'Successfully delivered a professional solution exceeding client expectations.'
    };
};
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
                :alt="project.name"
            />
            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <a
                    :href="project.project_url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="bg-white text-gray-900 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors flex items-center"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    View Live
                </a>
            </div>
        </div>

        <!-- Project Content -->
        <div class="p-6">
            <!-- Project Header -->
            <div class="mb-4">
                <span class="inline-block bg-accent/10 text-accent px-3 py-1 rounded-full text-sm font-medium mb-3">
                    {{ project.skill.name }}
                </span>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                    {{ project.name }}
                </h3>
            </div>

            <!-- Project Description -->
            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                {{ getProjectDetails(project).description }}
            </p>

            <!-- Technologies -->
            <div class="mb-4">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Technologies Used:</h4>
                <div class="flex flex-wrap gap-2">
                    <span
                        v-for="tech in getProjectDetails(project).technologies"
                        :key="tech"
                        class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded text-xs"
                    >
                        {{ tech }}
                    </span>
                </div>
            </div>

            <!-- Key Features -->
            <div class="mb-4">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Key Features:</h4>
                <ul class="text-xs text-gray-600 dark:text-gray-300 space-y-1">
                    <li
                        v-for="feature in getProjectDetails(project).features.slice(0, 3)"
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
                    <div class="text-xs text-gray-600 dark:text-gray-400">{{ getProjectDetails(project).duration }}</div>
                </div>
                <div>
                    <div class="text-sm font-semibold text-accent">Type</div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">{{ project.skill.name }} Project</div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="mt-3">
                <a
                    :href="project.project_url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full bg-accent hover:bg-accent-hover text-white py-2 px-4 rounded-lg transition-colors duration-200 text-sm font-medium text-center block"
                >
                    View Case Study
                </a>
            </div>
        </div>
    </div>
</template>
