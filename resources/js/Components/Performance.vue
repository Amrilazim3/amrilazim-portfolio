<script setup>
import { onMounted, nextTick } from 'vue';

// Performance optimizations
const initPerformanceOptimizations = () => {
    // Optimize third-party scripts loading
    setTimeout(() => {
        loadThirdPartyScripts();
    }, 3000);

    // Prefetch important pages
    prefetchCriticalResources();
    
    // Initialize intersection observer for performance monitoring
    initPerformanceObserver();
    
    // Service Worker registration (if available)
    registerServiceWorker();
};

// Load third-party scripts after initial page load
const loadThirdPartyScripts = () => {
    // Load non-critical scripts after main content
    const scripts = [
        // Add any third-party scripts here
    ];
    
    scripts.forEach(src => {
        const script = document.createElement('script');
        script.src = src;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    });
};

// Prefetch critical resources
const prefetchCriticalResources = () => {
    const criticalResources = [
        '/img/about.jpeg',
        // Add other critical resources
    ];
    
    criticalResources.forEach(resource => {
        const link = document.createElement('link');
        link.rel = 'prefetch';
        link.href = resource;
        document.head.appendChild(link);
    });
};

// Performance observer for monitoring
const initPerformanceObserver = () => {
    if ('PerformanceObserver' in window) {
        // Monitor largest contentful paint
        const lcp = new PerformanceObserver((entryList) => {
            const entries = entryList.getEntries();
            const lastEntry = entries[entries.length - 1];
            
            // Track LCP performance
            if (window.gtag) {
                window.gtag('event', 'LCP', {
                    event_category: 'Web Vitals',
                    value: Math.round(lastEntry.startTime),
                    custom_parameter_1: 'navigation'
                });
            }
        });
        
        try {
            lcp.observe({ entryTypes: ['largest-contentful-paint'] });
        } catch (e) {
            // Fallback for older browsers
            console.log('LCP observer not supported');
        }

        // Monitor first input delay
        const fid = new PerformanceObserver((entryList) => {
            for (const entry of entryList.getEntries()) {
                if (window.gtag) {
                    window.gtag('event', 'FID', {
                        event_category: 'Web Vitals',
                        value: Math.round(entry.processingStart - entry.startTime),
                        custom_parameter_1: 'navigation'
                    });
                }
            }
        });
        
        try {
            fid.observe({ entryTypes: ['first-input'] });
        } catch (e) {
            console.log('FID observer not supported');
        }
    }
};

// Service Worker registration
const registerServiceWorker = () => {
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/sw.js')
                .then((registration) => {
                    console.log('SW registered: ', registration);
                })
                .catch((registrationError) => {
                    console.log('SW registration failed: ', registrationError);
                });
        });
    }
};

// Critical CSS loading optimization
const optimizeCSSLoading = () => {
    // Load non-critical CSS asynchronously
    const nonCriticalCSS = document.querySelectorAll('link[rel="preload"][as="style"]');
    nonCriticalCSS.forEach(link => {
        link.addEventListener('load', () => {
            link.rel = 'stylesheet';
        });
    });
};

// Font loading optimization
const optimizeFontLoading = () => {
    // Preload font files
    const fonts = [
        '/fonts/playfair-display-v30-latin-regular.woff2',
        '/fonts/work-sans-v19-latin-regular.woff2'
    ];
    
    fonts.forEach(font => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.href = font;
        link.as = 'font';
        link.type = 'font/woff2';
        link.crossOrigin = 'anonymous';
        document.head.appendChild(link);
    });
};

// Image lazy loading optimization
const optimizeImageLoading = () => {
    // Add intersection observer for images
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                observer.unobserve(img);
            }
        });
    }, {
        rootMargin: '50px 0px'
    });

    // Observe all lazy images
    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
};

// Resource hints for performance
const addResourceHints = () => {
    const hints = [
        { rel: 'dns-prefetch', href: '//fonts.googleapis.com' },
        { rel: 'dns-prefetch', href: '//fonts.gstatic.com' },
        { rel: 'preconnect', href: 'https://www.google-analytics.com' }
    ];
    
    hints.forEach(hint => {
        const link = document.createElement('link');
        link.rel = hint.rel;
        link.href = hint.href;
        if (hint.crossorigin) link.crossOrigin = hint.crossorigin;
        document.head.appendChild(link);
    });
};

// Initialize performance optimizations on component mount
onMounted(() => {
    nextTick(() => {
        initPerformanceOptimizations();
        optimizeCSSLoading();
        optimizeFontLoading();
        addResourceHints();
        
        // Delay non-critical optimizations
        setTimeout(() => {
            optimizeImageLoading();
        }, 1000);
    });
});
</script>

<template>
    <div style="display: none;">
        <!-- Performance component - handles optimizations via JavaScript -->
    </div>
</template> 