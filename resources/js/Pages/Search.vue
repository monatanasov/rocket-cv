<template>
    <AuthenticatedLayout>
        <div class="flex flex-row justify-between max-w-xl mx-auto my-4">
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

        {{ cvList.data }}
    </AuthenticatedLayout>
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import pCalendar from 'primevue/calendar';
import pDataTable from 'primevue/datatable';
import pColumn from 'primevue/column';

export default {
    name: 'search-page',
    components: {
        AuthenticatedLayout,
        pCalendar,
        pDataTable,
        pColumn,
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
}
</script>


