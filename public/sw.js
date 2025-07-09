// Service Worker for Amril Azim Portfolio
// Version: 1.0.0

const CACHE_NAME = 'amril-portfolio-v1';
const STATIC_CACHE = 'static-v1';

// Assets to cache immediately
const STATIC_ASSETS = [
    '/',
    '/css/app.css',
    '/js/app.js',
    '/img/logo.png',
    '/img/hero.jpeg',
    '/img/about.jpeg',
    // Add more critical assets
];

// API endpoints to cache with network-first strategy
const API_CACHE_PATTERNS = [
    /^\/api\//,
    /^\/projects/,
    /^\/skills/
];

// Install event - cache static assets
self.addEventListener('install', (event) => {
    console.log('Service Worker installing...');
    
    event.waitUntil(
        Promise.all([
            caches.open(STATIC_CACHE).then((cache) => {
                console.log('Caching static assets...');
                return cache.addAll(STATIC_ASSETS);
            })
        ])
    );
    
    // Skip waiting to activate immediately
    self.skipWaiting();
});

// Activate event - clean up old caches
self.addEventListener('activate', (event) => {
    console.log('Service Worker activating...');
    
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (cacheName !== CACHE_NAME && cacheName !== STATIC_CACHE) {
                        console.log('Deleting old cache:', cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
    
    // Take control of all pages immediately
    self.clients.claim();
});

// Fetch event - implement caching strategies
self.addEventListener('fetch', (event) => {
    const request = event.request;
    const url = new URL(request.url);
    
    // Skip non-GET requests
    if (request.method !== 'GET') {
        return;
    }
    
    // Skip Chrome extension requests
    if (url.protocol === 'chrome-extension:') {
        return;
    }
    
    // Handle different types of requests with appropriate strategies
    if (isStaticAsset(request)) {
        // Cache first strategy for static assets
        event.respondWith(cacheFirst(request, STATIC_CACHE));
    } else if (isAPIRequest(request)) {
        // Network first strategy for API requests
        event.respondWith(networkFirst(request, CACHE_NAME));
    } else if (isHTMLRequest(request)) {
        // Network first with offline fallback for HTML
        event.respondWith(networkFirstWithOfflineFallback(request));
    } else {
        // Default to network with cache fallback
        event.respondWith(networkWithCacheFallback(request));
    }
});

// Cache first strategy - good for static assets
async function cacheFirst(request, cacheName) {
    try {
        const cache = await caches.open(cacheName);
        const cachedResponse = await cache.match(request);
        
        if (cachedResponse) {
            return cachedResponse;
        }
        
        const networkResponse = await fetch(request);
        if (networkResponse.ok) {
            cache.put(request, networkResponse.clone());
        }
        
        return networkResponse;
    } catch (error) {
        console.error('Cache first strategy failed:', error);
        throw error;
    }
}

// Network first strategy - good for dynamic content
async function networkFirst(request, cacheName) {
    try {
        const cache = await caches.open(cacheName);
        
        try {
            const networkResponse = await fetch(request);
            if (networkResponse.ok) {
                cache.put(request, networkResponse.clone());
            }
            return networkResponse;
        } catch (networkError) {
            const cachedResponse = await cache.match(request);
            if (cachedResponse) {
                return cachedResponse;
            }
            throw networkError;
        }
    } catch (error) {
        console.error('Network first strategy failed:', error);
        throw error;
    }
}

// Network first with offline fallback for HTML pages
async function networkFirstWithOfflineFallback(request) {
    try {
        const networkResponse = await fetch(request);
        return networkResponse;
    } catch (error) {
        const cache = await caches.open(STATIC_CACHE);
        const cachedResponse = await cache.match('/');
        return cachedResponse || new Response('Offline', { status: 503 });
    }
}

// Network with cache fallback
async function networkWithCacheFallback(request) {
    try {
        const networkResponse = await fetch(request);
        
        if (networkResponse.ok) {
            const cache = await caches.open(CACHE_NAME);
            cache.put(request, networkResponse.clone());
        }
        
        return networkResponse;
    } catch (error) {
        const cache = await caches.open(CACHE_NAME);
        const cachedResponse = await cache.match(request);
        
        if (cachedResponse) {
            return cachedResponse;
        }
        
        throw error;
    }
}

// Helper functions
function isStaticAsset(request) {
    const url = new URL(request.url);
    return url.pathname.match(/\.(css|js|png|jpg|jpeg|gif|svg|woff|woff2|ttf|eot)$/);
}

function isAPIRequest(request) {
    const url = new URL(request.url);
    return API_CACHE_PATTERNS.some(pattern => pattern.test(url.pathname));
}

function isHTMLRequest(request) {
    return request.headers.get('accept').includes('text/html');
}

// Background sync for offline actions
self.addEventListener('sync', (event) => {
    if (event.tag === 'contact-form') {
        event.waitUntil(syncContactForm());
    }
});

// Sync contact form submissions when back online
async function syncContactForm() {
    try {
        // Get pending form submissions from IndexedDB
        // Implementation would depend on your offline storage strategy
        console.log('Syncing contact form submissions...');
    } catch (error) {
        console.error('Failed to sync contact form:', error);
    }
}

// Push notification handling (for future use)
self.addEventListener('push', (event) => {
    if (event.data) {
        const data = event.data.json();
        
        const options = {
            body: data.body,
            icon: '/img/logo.png',
            badge: '/img/logo.png',
            data: data.data || {},
            actions: data.actions || []
        };
        
        event.waitUntil(
            self.registration.showNotification(data.title, options)
        );
    }
});

// Notification click handling
self.addEventListener('notificationclick', (event) => {
    event.notification.close();
    
    if (event.action) {
        // Handle specific action
        console.log('Action clicked:', event.action);
    } else {
        // Default action - open the app
        event.waitUntil(
            clients.openWindow('/')
        );
    }
});

console.log('Service Worker loaded and ready!'); 