<script setup lang="ts">
import { reactive } from 'vue';
import { useApi } from '@/composables/useApi';

type Task = { id: number; title: string; description?: string; due_date?: string | null };
const form = reactive({ title: '', description: '', due_date: '' });
const { post, loading, error } = useApi();

async function submit() {
  const payload = { ...form, due_date: form.due_date || null };
  const created = await post<{ data: Task }>('/api/tasks', payload);
  if (created) {
    form.title = ''; form.description = ''; form.due_date = '';
  }
}
</script>

<template>
  <form @submit.prevent="submit">
    <input v-model="form.title" placeholder="Title" required />
    <textarea v-model="form.description" placeholder="Description" />
    <input v-model="form.due_date" type="date" />
    <button :disabled="loading">Create</button>
    <p v-if="error" style="color:red">{{ error }}</p>
  </form>
</template>