<template>
    <AuthenticatedLayout>
        <div class="flex flex-row justify-between max-w-2xl mx-auto my-4">
            <div class="flex flex-col">
                <label for="startDate">Начална дата</label>
                <p-calendar
                    v-model="startDate"
                    showIcon
                    date-format="yy-mm-dd"
                    iconDisplay="input"
                    inputId="startDate"
                />
            </div>
            <div class="flex flex-col max-w-sm">
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
                class=""
                @click="searchCVS"
            />
        </div>
        <div class="mx-auto my-4 max-w-6xl">
            <p-data-table
                :value="cvList.data"
            >
                <p-column field="id" header="ID"></p-column>
                <p-column field="first_name" header="Име"></p-column>
                <p-column field="middle_name" header="Презиме"></p-column>
                <p-column field="last_name" header="Фамилия"></p-column>
                <p-column field="birthDate" header="Дата на раждане"></p-column>
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
        };
    },
    created() {

    },
    methods: {
        async searchCVS() {
            let whereStartDate = dayjs(this.startDate).format('YYYY-MM-DD');
            let whereEndDate = dayjs(this.endDate).format('YYYY-MM-DD')
            let path = `search?whereStartDate=${whereStartDate}&whereEndDate=${whereEndDate}&wantsJson=1`;

            await axios.get(path)
                .then((response) => {
                    this.cvList.data = response.data.data;
                })
                .catch((response) => {
                    alert('error');
                    // this.errors = response.response.data.errors;
                });
        },
    },

}
</script>


