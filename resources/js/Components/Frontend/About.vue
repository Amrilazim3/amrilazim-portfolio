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
                    src="http://amrilazim.com/img/about.jpeg"
                    alt="about"
                />
                <div
                    class="flex flex-col items-center text-center lg:items-start lg:text-left"
                >
                    <div class="flex flex-col">
                        <h2
                            class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3"
                        >
                            About Me
                        </h2>
                        <P class="mb-4 text-accent">Full Stack Developer</P>
                        <hr class="mb-8 opacity-90 dark:opacity-5" />
                        <p class="mb-8">
                            Work on all layers of a software application, from
                            the user interface (UI) and front-end logic to the
                            back-end services and database. <br />
                            <br />
                            On the front-end, I am skilled in HTML, CSS, and
                            JavaScript, Typescript for native Language as well
                            as modern frameworks such as Vue.js. I have a strong
                            understanding of user experience (UX) and am able to
                            create intuitive and responsive designs that meet
                            the needs of end users.
                            <br />
                            On the back-end, I am proficient in languages such
                            as PHP, C, C++, as well as databases and server-side
                            frameworks like Laravel, MySql, and Redis. I am
                            comfortable working with APIs and microservices, and
                            have experience with deployment and server
                            management using tools such as Docker on nginx
                            server.
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
