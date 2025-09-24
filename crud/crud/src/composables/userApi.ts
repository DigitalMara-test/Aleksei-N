import { ref } from 'vue';

export function useApi() {
    const loading = ref(false);
    const error = ref<string | null>(null);

    async function post<T>(url: string, body: unknown): Promise<T | null> {
        loading.value = true;
        error.value = null;
        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
                body: JSON.stringify(body),
            });
            if (!res.ok) {
                const payload = await res.json().catch(() => ({}));
                throw new Error(payload.message ?? `HTTP ${res.status}`);
            }
            return (await res.json()) as T;
        } catch (e: any) {
            error.value = e.message ?? 'Unknown error';
            return null;
        } finally {
            loading.value = false;
        }
    }

    return { post, loading, error };
}