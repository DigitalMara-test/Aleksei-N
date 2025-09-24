import { ref } from 'vue';

export function useUserFilters() {
    const role = ref(null);
    const status = ref(null);

    const params = () => ({
        role: role.value,
        status: status.value
    });

    return { role, status, params };
}
