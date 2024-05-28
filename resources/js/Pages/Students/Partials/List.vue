<script setup lang="ts">
import SecondaryButton from '@/Components/SecondaryButton.vue';
import NavLink from '@/Components/NavLink.vue';
import { useForm } from '@inertiajs/vue3';
import { Student } from '@/types';

const form_paid = useForm({
    paid: 1
});

const form_delete = useForm({});

defineProps<{
    students?: Student[];
    status?: String;
}>();



const columns = [
    { data: 'id' },
    { data: 'first_name' },
    { data: 'last_name' },
    { data: 'index' },
    { data: 'email' },
    { data: 'age' },
    { data: 'description' },
    { data: 'paid', render: function (data: any) {
        return data ? 'Tak' : 'Nie';
    }},
    {
        data: null,
        render: {
        _: 'name',
        display: '#set_paid'
        },
        title: 'Set Paid'
    },
    {
        data: null,
        render: {
        _: 'name',
        display: '#edit'
        },
        title: 'Edit'
    },
    {
        data: null,
        render: {
        _: 'name',
        display: '#delete'
        },
        title: 'Delete'
    },
];

function set_paid(student_data) {
    
  form_paid.post(route('students.set_paid', {student: student_data.id}));
}


function delete_student(student_data){
    form_delete.delete(route('students.destroy', {student: student_data.id}));
    
}


</script>

<template>
  <Head title="Students" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <DataTable :data="students" :columns="columns" class="display nowrap">
                <template #set_paid="props">
                    <SecondaryButton
                        @click="set_paid(props.rowData)"
                    >Set Paid</SecondaryButton>
                </template>
                <template #edit="props">
                    <NavLink :href="route('students.edit', {student: props.rowData.id})"> 
                        <SecondaryButton>Edit</SecondaryButton>
                    </NavLink>
                </template>
                <template #delete="props">
                    <SecondaryButton
                        @click="delete_student(props.rowData)"
                    >Delete</SecondaryButton>
                </template>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Index</th>
                    <th>E-mail</th>
                    <th>Age</th>
                    <th>Descripion</th>
                    <th>Paid</th>
                    <th>Set Paid</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
            </DataTable>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>: { id: any; }: any: { id: any; }