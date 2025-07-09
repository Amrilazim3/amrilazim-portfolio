<script setup>
defineProps({
    courses: {
        type: Array,
        default: () => [
            {
                id: 1,
                title: "Laravel 8 From Scratch",
                platform: "Laracasts",
                instructor: "Jeffrey Way",
                date: "2021",
                image: "https://laracasts.com/images/series/2018/laravel-from-scratch-2021.svg",
                description: "Master Laravel fundamentals including Eloquent ORM, authentication, authorization, and building blog post web application",
                skills: ["Laravel 8", "PHP 7.4", "Eloquent ORM", "Blade Templates", "Authentication", "MVC"],
                duration: "1 week",
                status: "Completed",
                courseUrl: "https://laracasts.com/series/laravel-8-from-scratch"
            },
            {
                id: 2,
                title: "Vue 3 + Inertia",
                platform: "Laracasts",
                instructor: "Jeffrey Way",
                date: "2022",
                image: "https://laracasts.com/images/series/2021/vue-3-inertia.svg",
                description: "Build modern single-page applications with Vue 3, Inertia.js, and Laravel for seamless full-stack development",
                skills: ["Vue 3", "Inertia.js", "Composition API", "Laravel Integration", "SPA", "Tailwind CSS"],
                duration: "1 week",
                status: "Completed",
                courseUrl: "https://laracasts.com/series/build-modern-laravel-apps-using-inertia-js"
            },
            {
                id: 3,
                title: "React From Scratch",
                platform: "Laracasts",
                instructor: "Simon Vrachliotis",
                date: "2022",
                image: "https://laracasts.com/images/series/2020/react-inertia.svg",
                description: "Learn React fundamentals and integrate with Laravel using Inertia.js for powerful full-stack applications",
                skills: ["React", "JSX", "Hooks"],
                duration: "< 1 week",
                status: "Completed",
                courseUrl: "https://laracasts.com/series/react-from-scratch"
            },
            {
                id: 4,
                title: "MySQL Database Design",
                platform: "Laracasts",
                instructor: "Jeffrey Way",
                date: "2023",
                image: "https://laracasts.com/images/series/2017/mysql-database-design.svg",
                description: "Master database design principles, normalization, relationships, and optimization for scalable applications",
                skills: ["MySQL", "Database Design", "Normalization", "Relationships", "Optimization"],
                duration: "1 day",
                status: "Completed",
                courseUrl: "https://laracasts.com/series/mysql-database-design"
            },
            {
                id: 5,
                title: "Laravel 9",
                platform: "Laracasts",
                instructor: "Jeffrey Way",
                date: "2023",
                image: "https://laracasts.com/images/series/2019/laravel-testing.svg",
                description: "Comprehensive testing strategies for Laravel applications including unit tests, feature tests, and TDD practices",
                skills: ["Laravel 9", "PHP 8"],
                duration: "< 1 day",
                status: "Completed",
                courseUrl: "https://laracasts.com/series/whats-new-in-laravel-9"
            },
            {
                id: 6,
                title: "Laravel 10",
                platform: "Laracasts",
                instructor: "Jeffrey Way",
                date: "2023",
                image: "https://laracasts.com/images/series/2018/advanced-laravel.svg",
                description: "Advanced Laravel concepts including service containers, facades, middleware, and custom packages",
                skills: ["Laravel 10", "PHP 8"],
                duration: "< 1 day",
                status: "Completed",
                courseUrl: "https://laracasts.com/series/whats-new-in-laravel-10"
            }
        ]
    }
});
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
                <h2 class="section-title">Continuous Learning Journey</h2>
                <p class="subtitle">
                    Committed to staying current with the latest technologies and best practices. 
                    Here are some of the courses I've completed to enhance my skills and knowledge.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <div
                    v-for="(course, index) in courses"
                    :key="course.id"
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
                                <h3 class="font-bold text-lg text-gray-900 dark:text-white">{{ course.title }}</h3>
                                <p class="text-accent text-sm font-medium">{{ course.platform }}</p>
                            </div>
                        </div>
                        <span class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded-full text-xs font-medium">
                            {{ course.status }}
                        </span>
                    </div>

                    <!-- Instructor -->
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-3">
                        <span class="font-medium">Instructor:</span> {{ course.instructor }}
                    </p>

                    <!-- Description -->
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 leading-relaxed">
                        {{ course.description }}
                    </p>

                    <!-- Skills -->
                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Skills Covered:</h4>
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="skill in course.skills"
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
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ course.duration }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Completed</p>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ course.date }}</p>
                                </div>
                            </div>
                            <a
                                :href="course.courseUrl"
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

            <!-- Learning Philosophy -->
            <div 
                class="bg-gradient-to-r from-accent/10 to-accent/5 dark:from-accent/20 dark:to-accent/10 rounded-2xl p-8 text-center"
                v-motion
                :initial="{ opacity: 0, y: 50 }"
                :visible="{ opacity: 1, y: 0, transition: { delay: 600 } }"
            >
                <div class="max-w-3xl mx-auto">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">
                        🚀 Committed to Continuous Growth
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                        Technology evolves rapidly, and so do I. I'm constantly learning new technologies through 
                        online courses, practical projects, and staying current with industry best practices. 
                        This commitment to continuous learning ensures I can always bring the latest techniques to your projects.
                    </p>
                    <div class="grid md:grid-cols-3 gap-6 mt-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">6+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Laracasts Courses</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">100+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Hours of Learning</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">4+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Years of Experience</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template> 