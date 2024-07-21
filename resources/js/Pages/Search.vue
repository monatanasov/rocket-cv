<template>
    <AuthenticatedLayout>
        <div class="flex flex-row justify-between max-w-xl mx-auto">
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
    </AuthenticatedLayout>
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import pCalendar from 'primevue/calendar';


export default {
    name: 'search-page',
    components: {
        AuthenticatedLayout,
        pCalendar,
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


