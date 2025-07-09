<script setup>
import { ref, computed, onMounted } from 'vue';

const props = defineProps({
    src: {
        type: String,
        required: true
    },
    alt: {
        type: String,
        required: true
    },
    width: {
        type: [String, Number],
        default: null
    },
    height: {
        type: [String, Number],
        default: null
    },
    loading: {
        type: String,
        default: 'lazy' // 'lazy', 'eager'
    },
    fetchpriority: {
        type: String,
        default: 'auto' // 'high', 'low', 'auto'
    },
    className: {
        type: String,
        default: ''
    },
    placeholder: {
        type: Boolean,
        default: true
    }
});

const isLoaded = ref(false);
const hasError = ref(false);
const imageRef = ref(null);

// Generate WebP source path
const webpSrc = computed(() => {
    if (props.src.endsWith('.jpeg') || props.src.endsWith('.jpg')) {
        return props.src.replace(/\.(jpeg|jpg)$/, '.webp');
    }
    return props.src;
});

// Handle image load
const handleLoad = () => {
    isLoaded.value = true;
};

// Handle image error (fallback to original format)
const handleError = () => {
    hasError.value = true;
    if (imageRef.value) {
        imageRef.value.src = props.src;
    }
};

// Intersection Observer for lazy loading optimization
onMounted(() => {
    if (props.loading === 'lazy' && imageRef.value && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.srcset = img.dataset.srcset;
                    observer.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px'
        });
        
        observer.observe(imageRef.value);
    }
});
</script>

<template>
    <div class="relative overflow-hidden">
        <!-- Loading placeholder -->
        <div 
            v-if="placeholder && !isLoaded"
            class="absolute inset-0 bg-gray-200 dark:bg-gray-700 animate-pulse flex items-center justify-center"
            :class="className"
        >
            <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
            </svg>
        </div>

        <!-- Optimized image with WebP support -->
        <picture>
            <!-- WebP source for modern browsers -->
            <source 
                v-if="!hasError"
                :srcset="webpSrc" 
                type="image/webp"
            >
            
            <!-- Fallback image -->
            <img
                ref="imageRef"
                :src="props.loading === 'lazy' ? 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMSIgaGVpZ2h0PSIxIiB2aWV3Qm94PSIwIDAgMSAxIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxyZWN0IHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InRyYW5zcGFyZW50Ii8+PC9zdmc+' : src"
                :data-src="props.loading === 'lazy' ? src : undefined"
                :alt="alt"
                :width="width"
                :height="height"
                :loading="loading"
                :fetchpriority="fetchpriority"
                :class="[
                    className,
                    'transition-opacity duration-300',
                    isLoaded ? 'opacity-100' : 'opacity-0'
                ]"
                @load="handleLoad"
                @error="handleError"
                decoding="async"
            />
        </picture>
    </div>
</template>

<style scoped>
/* Ensure images don't cause layout shift */
img {
    max-width: 100%;
    height: auto;
    display: block;
}

/* Aspect ratio preservation for loading state */
.relative {
    aspect-ratio: attr(width) / attr(height);
}
</style> 