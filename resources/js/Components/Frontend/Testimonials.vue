<script setup>
defineProps({
    testimonials: {
        type: Array,
        default: () => [
            {
                id: 1,
                name: "Sarah Johnson",
                position: "Project Manager",
                company: "TechFlow Solutions",
                image: "https://amrilazim.com/img/testimonial-1.jpg",
                content: "Amril delivered exceptional work on our Laravel application. His attention to detail and ability to solve complex problems impressed our entire team. The project was completed on time and exceeded our expectations.",
                rating: 5
            },
            {
                id: 2,
                name: "Michael Chen",
                position: "CTO",
                company: "Digital Innovations",
                image: "https://amrilazim.com/img/testimonial-2.jpg",
                content: "Working with Amril was a fantastic experience. His Vue.js expertise and full-stack knowledge helped us build a robust web application. Professional, reliable, and highly skilled.",
                rating: 5
            },
            {
                id: 3,
                name: "Emily Rodriguez",
                position: "Startup Founder",
                company: "QuickStart Labs",
                image: "https://amrilazim.com/img/testimonial-3.jpg",
                content: "Amril transformed our startup idea into a fully functional web platform. His technical skills combined with great communication made the development process smooth and enjoyable.",
                rating: 5
            }
        ]
    }
});
</script>

<template>
    <section 
        id="testimonials" 
        class="section bg-light-secondary dark:bg-dark-secondary"
    >
        <div class="container mx-auto">
            <div
                class="flex flex-col items-center text-center mb-12"
                v-motion
                :initial="{ opacity: 0, y: 100 }"
                :visible="{ opacity: 1, y: 0 }"
            >
                <h2 class="section-title">What Clients Say</h2>
                <p class="subtitle">
                    Don't just take my word for it - here's what clients and colleagues have to say about working with me.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    v-for="(testimonial, index) in testimonials"
                    :key="testimonial.id"
                    class="bg-white dark:bg-dark-navy-500 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300"
                    v-motion
                    :initial="{ opacity: 0, y: 50 }"
                    :visible="{ 
                        opacity: 1, 
                        y: 0,
                        transition: { delay: index * 200 }
                    }"
                >
                    <!-- Rating Stars -->
                    <div class="flex items-center mb-6">
                        <div class="flex space-x-1">
                            <svg
                                v-for="star in testimonial.rating"
                                :key="star"
                                class="w-5 h-5 text-yellow-400 fill-current"
                                viewBox="0 0 20 20"
                            >
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                            ({{ testimonial.rating }}.0)
                        </span>
                    </div>

                    <!-- Testimonial Content -->
                    <blockquote class="text-paragraph dark:text-gray-300 mb-6 leading-relaxed">
                        "{{ testimonial.content }}"
                    </blockquote>

                    <!-- Client Info -->
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center mr-4">
                            <span class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ testimonial.name.charAt(0) }}
                            </span>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 dark:text-white">
                                {{ testimonial.name }}
                            </div>
                            <div class="text-sm text-accent">
                                {{ testimonial.position }} at {{ testimonial.company }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div 
                class="text-center mt-12"
                v-motion
                :initial="{ opacity: 0, y: 50 }"
                :visible="{ opacity: 1, y: 0, transition: { delay: 600 } }"
            >
                <h3 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-white">
                    Ready to work together?
                </h3>
                <p class="text-paragraph mb-6 max-w-2xl mx-auto">
                    Join these satisfied clients and let's build something amazing together. 
                    I'm always excited to take on new challenges and deliver exceptional results.
                </p>
                <a 
                    href="#contact" 
                    class="btn btn-lg bg-accent hover:bg-accent-hover text-white inline-flex items-center"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    Start Your Project
                </a>
            </div>
        </div>
    </section>
</template> 