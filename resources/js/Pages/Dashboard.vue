
<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <form @submit.prevent>
            <div class="flex flex-col max-w-screen-xl mx-auto my-4 gap-2 border-2 border-red-500">
                <label class="flex justify-center max-w-sm text-2xl font-medium">Създаване на CV</label>
                <div class="flex flex-col max-w-sm">
                    <label for="name">Име:</label>
                    <p-input-text
                        id="name"
                        v-model="name"
                        placeholder="Име..."
                    />
                </div>
                <div class="flex flex-col max-w-sm">
                    <label for="fathersName">Презиме:</label>
                    <p-input-text
                        id="fathersName"
                        v-model="fathersName"
                        placeholder="Презиме..."
                    />
                </div>
                <div class="flex flex-col max-w-sm">
                    <label for="surname">Фамилия:</label>
                    <p-input-text
                        id="surname"
                        v-model="surname"
                        placeholder="Фамилия..."
                    />
                </div>
                <div class="flex justify-between items-center max-w-sm">
                    <label for="birthDate">Дата на раждане:</label>
                    <p-calendar
                        v-model="birthDate"
                        class="flex"
                        showIcon
                        iconDisplay="input"
                        inputId="birthDate"
                    />
                </div>
                <div class="flex justify-between max-w-sm">
                    <p-dropdown
                        v-model="selectedUniversity"
                        :options="university"
                        optionLabel="name"
                        placeholder="Изберете университет..."
                        class="w-full md:w-14rem mr-4"
                    />
                    <p-button
                        icon="pi pi-pencil"
                        aria-label="Submit"
                    />
                </div>
                <div class="flex justify-between max-w-sm">
                    <p-multi-select
                        v-model="selectedSkill"
                        :options="skills"
                        optionLabel="name"
                        placeholder="Select Cities"
                        :maxSelectedLabels="3"
                        class="w-full md:w-20rem mr-4"
                    />
                    <p-button
                        icon="pi pi-pencil"
                        aria-label="Submit"
                    />
                </div>
                <p-button
                    label="Запис на CV"
                    class="max-w-sm"
                />
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import pInputText from 'primevue/inputtext';
import pCalendar from 'primevue/calendar';
import pDropdown from 'primevue/dropdown';
import pButton from 'primevue/button';
import pMultiSelect from 'primevue/multiselect';

const name = ref(null);
const fathersName = ref(null);
const surname = ref(null);
const birthDate = ref();
const selectedUniversity = ref();
const university = ref([
    { name: 'University of Economics', code: 'UE' },
    { name: 'Technical University', code: 'TU' },
]);
const selectedSkill = ref();
const skills = ref([
    { name: 'PHP', code: 'PHP' },
    { name: 'Laravel', code: 'LV' },
]);
</script>
