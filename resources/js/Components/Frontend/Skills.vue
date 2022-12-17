<script setup>
defineProps({
    skills: Object,
});
</script>
<template>
    <section class="bg-light-tail-100 dark:bg-dark-navy-500 py-16">
        <h2 class="text-2xl mb-8 font-semibold text-center">Acquired Skills</h2>
        <div class="container mx-auto">
            <div class="grid grid-cols-8 md:grid-cols-10">
                <div
                    class="pb-10"
                    v-for="skill in skills.data"
                    :key="skill.id"
                >
                    <img :src="skill.image" :alt="skill.name" class="lg:h-20" />
                </div>
            </div>
        </div>
    </section>
</template>
