<script setup>
import Project from "./Project.vue";
import { ref } from "vue";
const props = defineProps({
    skills: Object,
    projects: Object,
});

const filteredProjects = ref(props.projects);
const selectedSkill = ref("all");

const filterProjects = (id) => {
    if (id === "all") {
        filteredProjects.value = props.projects;
        selectedSkill.value = id;
    } else {
        filteredProjects.value = props.projects.filter((project) => {
            return project.skill.id === id;
        });
        selectedSkill.value = id;
    }
};
</script>

<template>
    <div class="container mx-auto">
        <nav
            class="mb-8 border-b-2 border-light-tail-100 dark:text-dark-navy-100"
        >
            <ul class="grid grid-cols-5 md:grid-cols-8">
                <li class="cursor-pointer capitalize m-4 justify-self-stretch">
                    <button
                        @click="filterProjects('all')"
                        class="flex text-center px-4 py-2 hover:bg-accent text-white rounded-md"
                        :class="[
                            selectedSkill === 'all'
                                ? 'bg-accent'
                                : 'bg-light-tail-500 dark:bg-dark-navy-100',
                        ]"
                    >
                        All
                    </button>
                </li>
                <li
                    class="cursor-pointer capitalize m-4 justify-self-stretch "
                    v-for="projectSkill in props.skills"
                    :key="projectSkill.id"
                >
                    <button
                        @click="filterProjects(projectSkill.id)"
                        class="flex text-center px-4 py-2 hover:bg-accent text-white rounded-md"
                        :class="[
                            selectedSkill == projectSkill.id
                                ? 'bg-accent'
                                : 'bg-light-tail-500 dark:bg-dark-navy-100',
                        ]"
                    >
                        {{ projectSkill.name }}
                    </button>
                </li>
            </ul>
        </nav>
        <section class="grid gap-y-8 lg:grid-cols-3 lg:gap-6">
            <Project
                v-for="project in filteredProjects"
                :key="project.id"
                :project="project"
            />
        </section>
    </div>
</template>
