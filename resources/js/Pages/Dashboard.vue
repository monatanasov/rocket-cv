
<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div class="flex flex-col max-w-screen-xl mx-auto my-4 border-2 border-red-500">
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
            <div class="flex justify-between max-w-sm">
                <label for="birthDate">Date of birth:</label>
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
                    placeholder="Select a City"
                    class="w-full md:w-14rem"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import pInputText from 'primevue/inputtext';
import pCalendar from 'primevue/calendar';
import pDropdown from 'primevue/dropdown';


const name = ref(null);
const fathersName = ref(null);
const surname = ref(null);
const birthDate = ref();
const selectedUniversity = ref();
const university = ref([
    { name: 'University of Economics', code: 'UE' },
    { name: 'Technical University', code: 'TU' },
]);
</script>
