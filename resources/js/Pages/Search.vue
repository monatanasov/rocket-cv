<template>
    <AuthenticatedLayout>
        <h1 class="flex justify-center my-4 text-2xl">Търсене на CV-та в диапазон от дати</h1>
        <div class="max-w-2xl mx-auto my-4">
            <div class="flex flex-row gap-2 items-end">
                <div class="flex flex-col w-full">
                    <label for="startDate">Начална дата</label>
                    <p-calendar
                        v-model="startDate"
                        showIcon
                        date-format="yy-mm-dd"
                        iconDisplay="input"
                        inputId="startDate"
                    />
                </div>
                <div class="flex flex-col w-full">
                    <label for="endDate">Крайна дата</label>
                    <p-calendar
                        v-model="endDate"
                        showIcon
                        date-format="yy-mm-dd"
                        iconDisplay="input"
                        inputId="endDate"
                    />
                </div>
                <p-button
                    label="Търсене"
                    class="px-8"
                    @click="searchCVS"
                />
            </div>
            <div v-if="errors">
                <p
                    v-for="error in errors.whereStartDate"
                    :key="error" class="text-red-600"
                >
                    {{ error }}
                </p>
            </div>
            <div v-if="errors">
                <p
                    v-for="error in errors.whereEndDate"
                    :key="error" class="text-red-600"
                >
                    {{ error }}
                </p>
            </div>
        </div>
        <div class="mx-auto my-4 max-w-6xl">
            <p-data-table
                :value="cvList.data"
            >
                <template #empty>
                    <p class="text-center">
                        Няма намерени резултати
                    </p>
                </template>
                <p-column field="id" header="ID" />
                <p-column field="first_name" header="Име" />
                <p-column field="middle_name" header="Презиме" />
                <p-column field="last_name" header="Фамилия" />
                <p-column field="birthDate" header="Дата на раждане" />
                <p-column field="university.name" header="Университет" />
                <p-column field="skills" header="Технически умения" />
            </p-data-table>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import pCalendar from 'primevue/calendar';
import pDataTable from 'primevue/datatable';
import pColumn from 'primevue/column';
import pButton from 'primevue/button';
import axios from 'axios';
import dayjs from 'dayjs';

export default {
    name: 'search-page',
    components: {
        AuthenticatedLayout,
        pCalendar,
        pDataTable,
        pColumn,
        pButton,
    },
    props: {
        cvList: Object,
    },
    data() {
        return {
            startDate: null,
            endDate: null,
            errors: [],
        };
    },
    created() {
        this.errors = [];
    },
    mounted() {
        this.cvList.data.forEach((cv, index) => {

            let skillsList = null;

            cv.techSkills.forEach((skill) => {
                if (skillsList) {
                    skillsList = skillsList + ', ' + skill.name;
                } else {
                    skillsList = skill.name;
                }
            });

            this.cvList.data[index].skills = skillsList;
        });
    },
    methods: {
        async searchCVS() {
            this.errors = [];
            let whereStartDate = dayjs(this.startDate).format('YYYY-MM-DD');
            let whereEndDate = dayjs(this.endDate).format('YYYY-MM-DD')
            let path = `search?whereStartDate=${whereStartDate}&whereEndDate=${whereEndDate}&wantsJson=1`;

            await axios.get(path)
                .then((response) => {
                    this.cvList.data = response.data.data;
                })
                .catch((response) => {
                    // alert('error');
                    this.errors = response.response.data.errors;
                });
        },
    },

}
</script>
