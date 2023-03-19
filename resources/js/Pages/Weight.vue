<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
</script>

<template>
    <Head title="Weight" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Weight</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="mx-auto mt-8 grid max-w-3xl grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                            <div class="space-y-6 lg:col-span-2 lg:col-start-1">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Date</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Weight</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="weight in weights" :key="weight.id">
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-0">{{ weight.date }}</td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ weight.weight }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="lg:col-span-1 lg:col-start-3">
                                <form @submit.prevent="store" class="space-y-5">
                                    <div>
                                        <InputLabel for="date" value="Date" />
                                        <TextInput
                                            type="date"
                                            class="mt-1 block w-full"
                                            required
                                            v-model="form.date"
                                        />
                                    </div>
                                    <div>
                                        <InputLabel for="weight" value="Weight" />
                                        <TextInput
                                            type="number"
                                            class="mt-1 block w-full"
                                            required
                                            v-model="form.weight"
                                        />
                                    </div>
                                    <PrimaryButton type="submit">Add</PrimaryButton>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
    export default {
        props: {
            weights: Array,
        },
        data() {
            return {
                form: this.$inertia.form({
                    date: '',
                    weight: '',
                }),
            }
        },
        methods: {
            store() {
                this.form.post('/weight', {
                    preserveScroll: true,
                    onSuccess: () => this.form.reset('date', 'weight'),
                })
            },
        },
    };
</script>
