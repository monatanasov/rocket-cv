
<template>
    <AuthenticatedLayout>
        <form @submit.prevent>
            <div class="flex flex-col max-w-screen-xl mx-auto my-4 gap-2">
                <label class="flex justify-center max-w-sm text-2xl font-medium">Създаване на CV</label>
                <div class="flex flex-col max-w-sm">
                    <label for="name">Име:<asterisk /></label>
                    <p-input-text
                        id="name"
                        v-model="name"
                        placeholder="Име..."
                    />
                    <div v-if="errors">
                        <p
                            v-for="error in errors.first_name"
                            :key="error" class="text-red-600"
                        >
                            {{ error }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-col max-w-sm">
                    <label for="fathersName">Презиме:<asterisk /></label>
                    <p-input-text
                        id="fathersName"
                        v-model="fathersName"
                        placeholder="Презиме..."
                    />
                    <div v-if="errors">
                        <p
                            v-for="error in errors.father_name"
                            :key="error" class="text-red-600"
                        >
                            {{ error }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-col max-w-sm">
                    <label for="surname">Фамилия:<asterisk /></label>
                    <p-input-text
                        id="surname"
                        v-model="surname"
                        placeholder="Фамилия..."
                    />
                    <div v-if="errors">
                        <p
                            v-for="error in errors.surname"
                            :key="error" class="text-red-600"
                        >
                            {{ error }}
                        </p>
                    </div>
                </div>

                <div class="flex flex-col justify-between max-w-sm">

                    <div class="flex justify-between items-center max-w-sm">
                        <label for="birthDate">Дата на раждане:<asterisk /></label>
                        <p-calendar
                            v-model="birthDate"
                            class="flex"
                            showIcon
                            date-format="yy-mm-dd"
                            iconDisplay="input"
                            inputId="birthDate"
                        />
                    </div>
                    <div v-if="errors">
                        <p
                            v-for="error in errors.birth_date"
                            :key="error" class="text-red-600"
                        >
                            {{ error }}
                        </p>
                    </div>
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
                        @click="showUniversityModal = true"
                    />
                </div>
                <div class="max-w-sm">
                    <label for="selectedSkill">Умения:<asterisk /></label>
                    <div class="flex justify-between">
                        <p-multi-select
                            v-model="selectedSkill"
                            :options="techSkillsList.data"
                            inputId="selectedSkill"
                            optionLabel="name"
                            placeholder="Умения в технологии..."
                            :maxSelectedLabels="3"
                            class="w-full md:w-20rem mr-4"
                        />
                        <p-button
                            icon="pi pi-pencil"
                            aria-label="Submit"
                            @click="showSkillsModal = true"
                        />
                    </div>
                    <div v-if="errors">
                        <p
                            v-for="error in errors.skills"
                            :key="error" class="text-red-600"
                        >
                            {{ error }}
                        </p>
                    </div>
                </div>
                <div class="text-red-600">
                    <asterisk
                        :showText="true"
                    />
                </div>
                <p-button
                    label="Запис на CV"
                    class="max-w-sm"
                    @click="storeCV"
                />
            </div>
        </form>
        <p-dialog
            v-model:visible="showUniversityModal"
            modal
            header="Добавяне на университет"
            :style="{ width: '25rem' }"
        >
            <div class="flex flex-col">
                <label for="universityName" class="font-semibold w-6rem">Име</label>
                <p-input-text
                    v-model="universityName"
                    id="universityName"
                    class="flex-auto"
                    autocomplete="off"
                />
            </div>
            <div class="flex flex-col mb-3">
                <label for="universityEvaluation" class="font-semibold w-6rem">Акредитационна оценка</label>
                <p-input-text
                    v-model="universityEvaluation"
                    id="universityEvaluation"
                    class="flex-auto"
                    autocomplete="off"
                />
            </div>
            <div class="flex justify-end gap-2">
                <p-button type="button" label="Cancel" severity="secondary" @click="showUniversityModal = false"></p-button>
                <p-button type="button" label="Save" @click="storeUniversity"></p-button>
            </div>
        </p-dialog>

        <p-dialog
            v-model:visible="showSkillsModal"
            modal
            header="Добавяне на умение"
            :style="{ width: '25rem' }"
        >
            <div class="flex align-items-center gap-3 mb-3">
                <label for="skillName" class="font-semibold w-6rem">Име</label>
                <p-input-text
                    v-model="skillName"
                    id="skillName"
                    class="flex-auto"
                    autocomplete="off"
                />
            </div>
            <div class="flex justify-content-end gap-2">
                <p-button type="button" label="Cancel" severity="secondary" @click="showSkillsModal = false"></p-button>
                <p-button type="button" label="Save" @click="storeTechSkill"></p-button>
            </div>
        </p-dialog>
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
import pDialog from 'primevue/dialog';
import asterisk from '../Components/asterisk.vue';

export default {
    name: 'cv-page',
    components: {
        AuthenticatedLayout,
        pInputText,
        pCalendar,
        pDropdown,
        pButton,
        pMultiSelect,
        pDialog,
        asterisk,
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
            errors: [],
            showUniversityModal: false,
            universityName: '',
            universityEvaluation: '',
            showSkillsModal: false,
            skillName: ''
        };
    },
    created() {
        this.errors = [];
    },
    methods: {
        async storeCV() {
            const path = 'dashboard';
            let skillIds = null;

            if (this.selectedSkill) {
                skillIds = this.selectedSkill.map((skill) => {
                    return skill.id;
                });
            }

            const data = {
                first_name: this.name,
                father_name: this.fathersName,
                surname: this.surname,
                birth_date: dayjs(this.birthDate).format('YYYY-MM-DD'),
                university_id: this.selectedUniversity ? this.selectedUniversity.id : null,
                skills: skillIds,
            }

            await axios.post(path, data)
                .then(() => {
                    this.clearFields()
                    console.log('axios stored');
                })
                .catch((response) => {
                    this.errors = response.response.data.errors;
                });
        },
        async storeUniversity() {
            const path = 'universities';

            const data = {
                name: this.universityName,
                evaluation: this.universityEvaluation,
            }

            await axios.post(path, data)
                .then((response) => {
                    this.showUniversityModal = false;
                    this.universityName = '';
                    this.universityEvaluation = '';
                    this.uniList.data.push(response.data.data);
                    this.selectedUniversity = response.data.data;
                })
                .catch((response) => {
                    // this.errors = response.response.data.errors;
                });
        },
        async storeTechSkill() {
            const path = 'tech-skills';

            const data = {
                name: this.skillName,
            }

            await axios.post(path, data)
                .then((response) => {
                    this.showSkillsModal = false;
                    this.skillName = '';
                    this.techSkillsList.data.push(response.data.data);
                    this.selectedSkill.push(response.data.data);
                })
                .catch((response) => {
                    // this.errors = response.response.data.errors;
                });
        },
        clearFields() {
            this.name = '';
            this.fathersName = '';
            this.surname = '';
            this.birthDate = null;
            this.selectedUniversity = null;
            this.selectedSkill = null;
            this.errors = [];
        }
    },
}
</script>
