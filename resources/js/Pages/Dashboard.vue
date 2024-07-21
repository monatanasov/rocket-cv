
<template>
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
                        :options="uniList.data"
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
                        :options="techSkillsList.data"
                        optionLabel="name"
                        placeholder="Умения в технологии..."
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
                    @click="storeCV"

                />
            </div>
        </form>
<!--        {{ cvList }}-->
        {{ uniList }}
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import pInputText from 'primevue/inputtext';
import pCalendar from 'primevue/calendar';
import pDropdown from 'primevue/dropdown';
import pButton from 'primevue/button';
import pMultiSelect from 'primevue/multiselect';
import dayjs from 'dayjs';
import axios from 'axios';
export default {
    name: 'cv-page',
    components: {
        AuthenticatedLayout,
        pInputText,
        pCalendar,
        pDropdown,
        pButton,
        pMultiSelect,
    },
    props: {
        cvList: Object,
        uniList: Object,
        techSkillsList: Object,
    },
    data() {
        return {
            name: '',
            fathersName: '',
            surname: '',
            birthDate: null,
            selectedUniversity: null,
            selectedSkill: null,
            skills: [
                { name: 'PHP', code: '1' },
                { name: 'Laravel', code: '2' },
            ]
        };
    },
    methods: {
        storeCV() {
            const path = 'dashboard';

            const data = {
                first_name: this.name,
                father_name: this.fathersName,
                surname: this.surname,
                birth_date: dayjs(this.birthDate).format('YYYY-MM-DD'),
                university_id: this.selectedUniversity.id,
            }

            axios.post(path, data)
                .then(() => {
                    console.log('axios stored');
                })
                .catch((error) => {
                    console.log('axios error');
                    console.log(data);
                });
        },
    },
}
</script>
