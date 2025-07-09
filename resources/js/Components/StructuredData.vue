<script setup>
import { onMounted } from 'vue';

// Structured data for SEO
const generateStructuredData = () => {
    const structuredData = {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Amril Azim",
        "jobTitle": "Full Stack Developer",
        "description": "Full Stack Developer specializing in Laravel, Vue.js, and modern web applications. Building scalable solutions with clean code and exceptional user experiences.",
        "url": window.location.origin,
        "image": `${window.location.origin}/img/hero.jpeg`,
        "sameAs": [
            "https://github.com/amrilazim",
            "https://linkedin.com/in/amrilazim"
        ],
        "knowsAbout": [
            "Laravel",
            "Vue.js",
            "PHP",
            "JavaScript",
            "MySQL",
            "React",
            "Inertia.js",
            "Tailwind CSS",
            "Docker",
            "Web Development"
        ],
        "worksFor": {
            "@type": "Organization",
            "name": "Freelance"
        },
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "MY",
            "addressRegion": "Malaysia"
        },
        "alumniOf": {
            "@type": "Organization",
            "name": "Laracasts"
        }
    };

    return structuredData;
};

// Add structured data to page
const addStructuredData = () => {
    const script = document.createElement('script');
    script.type = 'application/ld+json';
    script.text = JSON.stringify(generateStructuredData());
    document.head.appendChild(script);
};

onMounted(() => {
    addStructuredData();
});
</script>

<template>
    <div style="display: none;">
        <!-- Structured data is added via JavaScript -->
    </div>
</template> 