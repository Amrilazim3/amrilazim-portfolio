<script setup>
const props = defineProps({
    skills: Object,
});

</script>
<template>
    <section class="section bg-light-tail-100 dark:bg-dark-navy-500">
        <div class="container mx-auto">
            <h2 class="section-title text-center">Acquired Skills</h2>
            <div class="grid grid-cols-8 md:grid-cols-10">
                <div
                    class="pb-8"
                    v-for="skill in props.skills"
                    :key="skill.id"
                >
                    <img :src="skill.image" :alt="`${skill.name} skill`" class="lg:h-20" loading="lazy" />
                </div>
            </div>
        </div>
    </section>
</template>
