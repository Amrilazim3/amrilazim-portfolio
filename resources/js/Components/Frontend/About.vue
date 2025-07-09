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
                        src="/img/about.jpeg"
                        alt="Amril Azim - About Me"
                        loading="lazy"
                    />
                <div
                    class="flex flex-col items-center text-center lg:items-start lg:text-left"
                >
                    <div class="flex flex-col">
                        <h2
                            class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-4"
                        >
                            Turning Ideas Into Reality
                        </h2>
                        <P class="mb-3 text-accent">Full Stack Developer & Problem Solver</P>
                        <hr class="mb-6 opacity-90 dark:opacity-5" />
                        <p class="mb-6 leading-relaxed">
                            With over <strong>4+ years</strong> of experience, I specialize in building scalable web applications 
                            that solve real business problems. My passion lies in creating digital solutions that not only 
                            look great but perform exceptionally well.
                        </p>
                        
                        <div class="mb-6">
                            <h3 class="font-semibold text-lg mb-4 text-gray-900 dark:text-white">🎯 What I Excel At:</h3>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-accent rounded-full mr-3"></span>
                                    <span><strong>Frontend:</strong> Vue.js, JavaScript/TypeScript, Tailwind CSS, Responsive Design</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-accent rounded-full mr-3"></span>
                                    <span><strong>Backend:</strong> Laravel (PHP), MySQL, Redis, RESTful APIs</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-accent rounded-full mr-3"></span>
                                    <span><strong>DevOps:</strong> Docker, Linux Server Management, Git, CI/CD</span>
                                </div>
                            </div>
                        </div>

                        <p class="mb-6 leading-relaxed text-sm bg-gray-50 dark:bg-gray-800 p-4 rounded-lg border-l-4 border-accent">
                            <strong>💡 My Approach:</strong> I believe in writing clean, maintainable code and following industry best practices. 
                            Every project is an opportunity to create something meaningful that delivers real value to users and businesses.
                        </p>
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
