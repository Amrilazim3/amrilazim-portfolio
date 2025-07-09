<script setup>
defineProps({
    certifications: {
        type: Array,
        default: () => [
            {
                id: 1,
                title: "Laravel Certified Developer",
                issuer: "Laravel",
                date: "2023",
                image: "https://laravel.com/img/logomark.min.svg",
                description: "Advanced Laravel framework certification covering Eloquent ORM, Artisan commands, queues, and testing",
                skills: ["Laravel", "PHP", "Eloquent ORM", "Testing"],
                credentialId: "LC-2023-001",
                verifyUrl: "#"
            },
            {
                id: 2,
                title: "Vue.js 3 Complete Course",
                issuer: "Vue Mastery",
                date: "2023",
                image: "https://vuejs.org/images/logo.png",
                description: "Comprehensive Vue.js 3 course covering Composition API, TypeScript integration, and modern development practices",
                skills: ["Vue.js 3", "Composition API", "TypeScript", "Pinia"],
                credentialId: "VM-VUE3-2023",
                verifyUrl: "#"
            },
            {
                id: 3,
                title: "AWS Cloud Practitioner",
                issuer: "Amazon Web Services",
                date: "2022",
                image: "https://aws.amazon.com/favicon.ico",
                description: "Foundational cloud computing certification covering AWS services, architecture, and deployment best practices",
                skills: ["AWS", "Cloud Computing", "S3", "EC2", "Lambda"],
                credentialId: "AWS-CP-2022-789",
                verifyUrl: "#"
            },
            {
                id: 4,
                title: "Docker & Kubernetes Essentials",
                issuer: "Linux Foundation",
                date: "2022",
                image: "https://www.docker.com/wp-content/uploads/2022/03/Moby-logo.png",
                description: "Container orchestration and deployment certification focusing on Docker containerization and Kubernetes management",
                skills: ["Docker", "Kubernetes", "Container Orchestration", "DevOps"],
                credentialId: "LF-DK-2022-456",
                verifyUrl: "#"
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
                <h2 class="section-title">Certifications & Continuous Learning</h2>
                <p class="subtitle">
                    Staying current with industry trends and technologies through professional certifications 
                    and continuous education. Here are some of my recent achievements and credentials.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-6 mb-12">
                <div
                    v-for="(cert, index) in certifications"
                    :key="cert.id"
                    class="bg-white dark:bg-dark-navy-500 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6"
                    v-motion
                    :initial="{ opacity: 0, y: 50 }"
                    :visible="{ 
                        opacity: 1, 
                        y: 0,
                        transition: { delay: index * 150 }
                    }"
                >
                    <!-- Certificate Header -->
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900 dark:text-white">{{ cert.title }}</h3>
                                <p class="text-accent text-sm font-medium">{{ cert.issuer }}</p>
                            </div>
                        </div>
                        <span class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded-full text-xs font-medium">
                            {{ cert.date }}
                        </span>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 leading-relaxed">
                        {{ cert.description }}
                    </p>

                    <!-- Skills -->
                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Skills Covered:</h4>
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="skill in cert.skills"
                                :key="skill"
                                class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-2 py-1 rounded text-xs"
                            >
                                {{ skill }}
                            </span>
                        </div>
                    </div>

                    <!-- Credential Info -->
                    <div class="border-t border-gray-200 dark:border-gray-600 pt-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Credential ID</p>
                                <p class="text-sm font-mono text-gray-700 dark:text-gray-300">{{ cert.credentialId }}</p>
                            </div>
                            <a
                                :href="cert.verifyUrl"
                                class="text-accent hover:text-accent-hover text-sm font-medium flex items-center"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                Verify
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
                        Technology evolves rapidly, and so do I. I'm constantly learning new technologies, 
                        attending conferences, and pursuing certifications to stay at the forefront of web development. 
                        This commitment to growth ensures I can always bring the latest best practices to your projects.
                    </p>
                    <div class="grid md:grid-cols-3 gap-6 mt-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">4+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Professional Certifications</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">50+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Online Courses Completed</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-accent mb-2">3+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Years of Experience</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template> 