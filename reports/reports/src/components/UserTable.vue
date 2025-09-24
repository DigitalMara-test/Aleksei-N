<template>
  <div>
    <select v-model="role">
      <option value="">All Roles</option>
      <option value="admin">Admin</option>
      <option value="user">User</option>
    </select>

    <select v-model="status">
      <option value="">All Statuses</option>
      <option value="active">Active</option>
      <option value="blocked">Blocked</option>
    </select>

    <button @click="fetchUsers">Load</button>
    <button @click="exportCsv">Export CSV</button>

    <table>
      <tr><th>ID</th><th>Name</th><th>Email</th></tr>
      <tr v-for="u in users" :key="u.id">
        <td>{{ u.id }}</td>
        <td>{{ u.name }}</td>
        <td>{{ u.email }}</td>
      </tr>
    </table>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useUserFilters } from '../composables/useUserFilters';

const users = ref([]);
const { role, status, params } = useUserFilters();

async function fetchUsers() {
  const { data } = await axios.get('/api/users', { params: params() });
  users.value = data;
}

async function exportCsv() {
  const { data } = await axios.get('/api/users/export', {
    params: params(),
    responseType: 'blob'
  });
  const url = window.URL.createObjectURL(new Blob([data]));
  const link = document.createElement('a');
  link.href = url;
  link.setAttribute('download', 'users.csv');
  document.body.appendChild(link);
  link.click();
}
</script>
