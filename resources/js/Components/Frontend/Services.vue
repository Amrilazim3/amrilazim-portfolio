<script setup>

</script>
<template>
    <section
        id="services"
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
            <div class="flex flex-col items-center text-center mb-12">
                <h2 class="section-title">How I Can Help Your Business</h2>
                <p class="subtitle">
                    From initial concept to final deployment, I provide comprehensive web development services 
                    that help businesses establish a strong digital presence and achieve their goals.
                </p>
            </div>
            <div class="grid lg:grid-cols-4 gap-6">
                <div
                    class="bg-light-tail-100 dark:bg-dark-navy-500 p-6 rounded-2xl"
                >
                    <div
                        class="text-accent rounded-sm w-12 h-12 flex justify-center items-center mb-16 text-[28px]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-24 w-24"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"
                            />
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium mb-2">UI/UX Design</h4>
                    <p>
                        Creating intuitive, user-centered designs that convert visitors into customers. 
                        I focus on modern aesthetics combined with exceptional usability to ensure your 
                        website not only looks great but drives results.
                    </p>
                </div>
                <div
                    class="bg-light-tail-100 dark:bg-dark-navy-500 p-6 rounded-2xl"
                >
                    <div
                        class="text-accent rounded-sm w-12 h-12 flex justify-center items-center mb-16 text-[28px]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-24 w-24"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium mb-2">Full-Stack Development</h4>
                    <p>
                        Building robust, scalable web applications using Laravel and Vue.js. From database 
                        design to responsive frontends, I deliver complete solutions that grow with your business. 
                        Clean code, best practices, and performance optimization included.
                    </p>
                </div>
                <div
                    class="bg-light-tail-100 dark:bg-dark-navy-500 p-6 rounded-2xl"
                >
                    <div
                        class="text-accent rounded-sm w-12 h-12 flex justify-center items-center mb-16 text-[28px]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-24 w-24"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"
                            />
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium mb-2">API Development</h4>
                    <p>
                        Creating powerful, secure APIs that connect your applications and enable seamless 
                        integrations. RESTful services, third-party integrations, and microservices 
                        architecture that scales with your business needs.
                    </p>
                </div>
                <div
                    class="bg-light-tail-100 dark:bg-dark-navy-500 p-6 rounded-2xl"
                >
                    <div
                        class="text-accent rounded-sm w-12 h-12 flex justify-center items-center mb-16 text-[28px]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-24 w-24"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                            />
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium mb-2">DevOps & Deployment</h4>
                    <p>
                        Ensuring your applications run smoothly in production with Docker containerization, 
                        automated deployments, and server optimization. Reliable hosting solutions that 
                        keep your business running 24/7.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
