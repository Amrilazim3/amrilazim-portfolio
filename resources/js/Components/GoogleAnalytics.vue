<script setup>
import { onMounted } from 'vue';

// Google Analytics 4 Configuration
// Replace GA_MEASUREMENT_ID with your actual Google Analytics Measurement ID
const GA_MEASUREMENT_ID = 'G-XXXXXXXXXX'; // Replace with your actual GA4 ID

// Initialize Google Analytics
const initGA = () => {
    if (typeof window !== 'undefined' && window.gtag) {
        window.gtag('config', GA_MEASUREMENT_ID, {
            page_title: document.title,
            page_location: window.location.href,
        });
    }
};

// Track page views
const trackPageView = (url) => {
    if (typeof window !== 'undefined' && window.gtag) {
        window.gtag('config', GA_MEASUREMENT_ID, {
            page_path: url,
        });
    }
};

// Track custom events
const trackEvent = (action, category, label, value) => {
    if (typeof window !== 'undefined' && window.gtag) {
        window.gtag('event', action, {
            event_category: category,
            event_label: label,
            value: value,
        });
    }
};

// Track contact form submissions
const trackContactForm = () => {
    trackEvent('form_submit', 'engagement', 'contact_form', 1);
};

// Track resume downloads
const trackResumeDownload = () => {
    trackEvent('file_download', 'engagement', 'resume_download', 1);
};

// Track project clicks
const trackProjectClick = (projectName) => {
    trackEvent('click', 'engagement', `project_${projectName}`, 1);
};

// Expose tracking functions
defineExpose({
    trackPageView,
    trackEvent,
    trackContactForm,
    trackResumeDownload,
    trackProjectClick,
});

// Initialize on mount
onMounted(() => {
    initGA();
});
</script>

<template>
    <!-- Google Analytics Scripts -->
    <div v-if="GA_MEASUREMENT_ID !== 'G-XXXXXXXXXX'">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-XXXXXXXXXX');
        </script>
    </div>
</template> 