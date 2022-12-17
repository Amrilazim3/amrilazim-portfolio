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
                    src="http://localhost/img/about.jpeg"
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
                            Responsible for designing, developing, and
                            maintaining web and mobile applications, as well as
                            working on the server-side infrastructure that
                            powers them
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
