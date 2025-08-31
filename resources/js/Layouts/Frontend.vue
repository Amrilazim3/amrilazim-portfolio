<script setup>
import Header from "@/Components/Frontend/Header.vue";
import Footer from "@/Components/Frontend/Footer.vue";
import StructuredData from "@/Components/StructuredData.vue";
import Performance from "@/Components/Performance.vue";
import { computed } from 'vue';

const props = defineProps({
    heroData: {
        type: Object,
        default: () => ({})
    },
});

const resumeFile = computed(() => props.heroData?.resume_file);
</script>
<template>
  <div class="bg-slate-200 dark:bg-slate-900">
    <!-- Skip to main content link for accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- SEO and Analytics Components -->
    <StructuredData />
    <Performance />
    
    <!-- Header -->
    <Header :resumeFile="resumeFile" />
    <main id="main-content" class="min-h-screen" role="main">
      <slot />
    </main>
    <!-- Footer -->
    <Footer />
  </div>
</template>