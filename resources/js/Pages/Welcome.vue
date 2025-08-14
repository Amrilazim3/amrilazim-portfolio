<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import FrontendLayout from "@/Layouts/Frontend.vue";
import Hero from "@/Components/Frontend/Hero.vue";
import Promote from "@/Components/Frontend/Promote.vue";
import About from "@/Components/Frontend/About.vue";
import Skills from "@/Components/Frontend/Skills.vue";
import Portfolio from "@/Components/Frontend/Portfolio.vue";
import Services from "@/Components/Frontend/Services.vue";
import Testimonials from "@/Components/Frontend/Testimonials.vue";
import Certifications from "@/Components/Frontend/Certifications.vue";
import ContactMe from "../Components/Frontend/ContactMe.vue";

defineProps({
    skills: Object,
    projects: Object,
    certifications: Object,
    heroData: Object,
    aboutData: Object,
    contactData: Object,
    servicesData: Object,
    socialLinks: Array,
});
</script>

<template>
    <Head title="Welcome Page" />
    <FrontendLayout :hero-data="heroData">
        <!-- Hero primary -->
        <Hero :hero-data="heroData" :social-links="socialLinks" />
        <!-- About secondary -->
        <About :about-data="aboutData" />
        <!-- Skills primary -->
        <Skills :skills="skills" />
        <!-- Portfolio primary -->
        <Portfolio :skills="skills" :projects="projects" />
        <!-- Services secondary -->
        <Services :services-data="servicesData" />
        <!-- Testimonials primary -->
        <!-- <Testimonials /> -->
        <!-- Continuous Learning secondary -->
        <Certifications :certifications="certifications" />
        <!-- Contact primary -->
        <ContactMe :contact-data="contactData" />
    </FrontendLayout>
</template>
