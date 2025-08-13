<script setup>
import { computed } from 'vue';

const props = defineProps({
    servicesData: {
        type: Object,
        default: () => ({})
    }
});

// Computed properties with fallbacks
const title = computed(() => props.servicesData?.settings?.title || 'How I Can Help Your Business');
const subtitle = computed(() => props.servicesData?.settings?.subtitle || 'From initial concept to final deployment...');
const services = computed(() => props.servicesData?.services || []);
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
                <h2 class="section-title">{{ title }}</h2>
                <p class="subtitle">{{ subtitle }}</p>
            </div>
            <div class="grid lg:grid-cols-4 gap-6">
                <div
                    v-for="service in services"
                    :key="service.id"
                    class="bg-light-tail-100 dark:bg-dark-navy-500 p-6 rounded-2xl"
                >
                    <div
                        class="text-accent rounded-sm w-12 h-12 flex justify-center items-center mb-16 text-[28px]"
                    >
                        <div 
                            v-if="service.icon_type === 'svg'" 
                            v-html="service.icon_content"
                            class="text-accent"
                        ></div>
                        <i 
                            v-else 
                            :class="service.icon_content"
                            class="text-accent text-6xl"
                        ></i>
                    </div>
                    <h4 class="text-xl font-medium mb-2">{{ service.title }}</h4>
                    <p v-html="service.description"></p>
                </div>
            </div>
        </div>
    </section>
</template>
