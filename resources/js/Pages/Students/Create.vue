<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Checkbox from '@/Components/Checkbox.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { Student } from '@/types';

const props = defineProps<{
    student: {
        type: Student,
        default: null,
    }
    isUpdating: {
        type: Boolean,
        default: false,
    },
}>();

const form = useForm({
    first_name: props.student ? props.student.first_name : '',
    last_name: props.student ? props.student.last_name : '',
    email: props.student ? props.student.email : '',
    age: props.student ? props.student.age : '',
    description: props.student ? props.student.description : '',
    paid: props.student ? props.student.paid : false
});

const submit = () => (props.isUpdating ? updateStudent() : addStudent());
const updateStudent = () => form.put(route('students.update', {student: props.student.id}));
const addStudent = () => form.post(route('students.store'), {
    onSuccess: () => {
        form.reset();
    }
});
</script>
<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Add new student</h2>

            <p class="mt-1 text-sm text-gray-600">
                Add new student
            </p>
        </header>

        <form @submit.prevent="submit" class="mt-6 space-y-6">
            <div>
                <InputLabel for="first_name" value="First Name"/>

                <TextInput
                    id="first_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.first_name"
                    required
                    autocomplete="given-name"
                />

                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>

            <div>
                <InputLabel for="last_name" value="Last Name"/>

                <TextInput
                    id="last_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.last_name"
                    required
                    autocomplete="family-name"
                />

                <InputError class="mt-2" :message="form.errors.last_name" />
            </div>
        
            <div>
                <InputLabel for="email" value="E-mail" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="false"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="age" value="Age" />

                <TextInput
                    id="age"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.age"
                    required
                />

                <InputError class="mt-2" :message="form.errors.age" />
            </div>

            <div>
                <InputLabel for="description"  value="Description" />

                <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.description"
                />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>
                
            <div>
                <InputLabel for="paid" value="Paid" />

                <Checkbox
                    name="paid" v-model:checked="form.paid"
                />

                <InputError class="mt-2" :message="form.errors.paid" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">
                    {{props.isUpdating ? 'Save' : 'Add' }}
                </PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>