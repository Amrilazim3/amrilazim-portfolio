<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const showMessage = ref(false);

const form = useForm({
    name: "",
    email: "",
    body: "",
});

function setShowMessage(value) {
    showMessage.value = value;
}

function cleanForm() {
    form.reset();
    setShowMessage(true);
    setTimeout(() => setShowMessage(false), 2000);
    
    // Track contact form submission in Google Analytics
    if (typeof window !== 'undefined' && window.gtag) {
        window.gtag('event', 'form_submit', {
            event_category: 'engagement',
            event_label: 'contact_form',
            value: 1
        });
    }
}

const submit = () => {
    form.post(route("contact"), {
        preserveScroll: true,
        onSuccess: () => cleanForm(),
        onError: () => {
            // Track form errors
            if (typeof window !== 'undefined' && window.gtag) {
                window.gtag('event', 'form_error', {
                    event_category: 'engagement',
                    event_label: 'contact_form_error',
                    value: 1
                });
            }
        }
    });
};
</script>

<template>
    <section id="contact" class="section bg-light-primary dark:bg-dark-primary">
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
            <div class="flex flex-col items-center text-center">
                <h2 class="section-title">Contact Me</h2>
                <p class="subtitle">
                    If you are interested in working with me, feel free to send me an email or message.
                </p>
            </div>
            <div class="flex flex-col lg:flex-row lg:gap-x-8">
                <div
                    class="flex flex-1 flex-col items-start space-y-6 mb-8 lg:mb-0 lg:pt-2"
                >
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div
                            class="text-accent rounded-sm w-14 h-14 flex items-start justify-center mt-2 mb-4 lg:mb-0 text-2xl"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                                />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">
                                Have a question?
                            </h4>
                            <p class="text-accent font-normal">
                                Email me at a.azim0711@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
                <form
                    @submit.prevent="submit"
                    class="space-y-6 w-full max-w-md"
                    role="form"
                    aria-label="Contact form"
                >
                    <div
                        v-if="showMessage"
                        class="m-2 p-4 bg-green-500 text-white rounded-lg shadow-lg transform transition-all duration-300 ease-in-out"
                        v-motion
                        :initial="{ opacity: 0, y: -20 }"
                        :enter="{ opacity: 1, y: 0 }"
                    >
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Thank you for contacting me! I'll get back to you soon.
                        </div>
                    </div>
                    <div class="flex gap-8">
                        <div>
                            <label for="contact-name" class="sr-only">Your Name</label>
                            <input
                                id="contact-name"
                                v-model="form.name"
                                type="text"
                                class="input transition-all duration-200"
                                :class="{ 'border-red-500 border-2 bg-red-50 dark:bg-red-900/20': form.errors.name }"
                                placeholder="Your Name"
                                aria-required="true"
                                :aria-invalid="!!form.errors.name"
                                :aria-describedby="form.errors.name ? 'name-error' : null"
                            />
                            <div
                                v-if="form.errors.name"
                                id="name-error"
                                class="mt-2 p-2 bg-red-100 dark:bg-red-900/30 border border-red-300 dark:border-red-700 rounded-md"
                                v-motion
                                :initial="{ opacity: 0, y: -10 }"
                                :enter="{ opacity: 1, y: 0 }"
                                role="alert"
                                aria-live="polite"
                            >
                                <div class="flex items-center text-red-600 dark:text-red-400 text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ form.errors.name }}
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="contact-email" class="sr-only">Your Email</label>
                            <input
                                id="contact-email"
                                v-model="form.email"
                                type="email"
                                class="input transition-all duration-200"
                                :class="{ 'border-red-500 border-2 bg-red-50 dark:bg-red-900/20': form.errors.email }"
                                placeholder="Your Email"
                                aria-required="true"
                                :aria-invalid="!!form.errors.email"
                                :aria-describedby="form.errors.email ? 'email-error' : null"
                            />
                            <div
                                v-if="form.errors.email"
                                id="email-error"
                                class="mt-2 p-2 bg-red-100 dark:bg-red-900/30 border border-red-300 dark:border-red-700 rounded-md"
                                v-motion
                                :initial="{ opacity: 0, y: -10 }"
                                :enter="{ opacity: 1, y: 0 }"
                                role="alert"
                                aria-live="polite"
                            >
                                <div class="flex items-center text-red-600 dark:text-red-400 text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ form.errors.email }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="contact-message" class="sr-only">Your Message</label>
                    <textarea
                        id="contact-message"
                        v-model="form.body"
                        class="textarea transition-all duration-200"
                        :class="{ 'border-red-500 border-2 bg-red-50 dark:bg-red-900/20': form.errors.body }"
                        placeholder="Your Message"
                        spellcheck="false"
                        aria-required="true"
                        :aria-invalid="!!form.errors.body"
                        :aria-describedby="form.errors.body ? 'message-error' : null"
                    ></textarea>
                    <div
                        v-if="form.errors.body"
                        id="message-error"
                        class="mt-2 p-2 bg-red-100 dark:bg-red-900/30 border border-red-300 dark:border-red-700 rounded-md"
                        v-motion
                        :initial="{ opacity: 0, y: -10 }"
                        :enter="{ opacity: 1, y: 0 }"
                        role="alert"
                        aria-live="polite"
                    >
                        <div class="flex items-center text-red-600 dark:text-red-400 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ form.errors.body }}
                        </div>
                    </div>

                    <button
                        class="btn btn-lg bg-accent hover:bg-secondary text-white transition-all duration-200"
                        :disabled="form.processing"
                        :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                    >
                        <span v-if="form.processing" class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Sending...
                        </span>
                        <span v-else>Send message</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>
