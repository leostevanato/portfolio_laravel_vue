import { ref } from 'vue';

export function useFetch(url) {
	const loading = ref(true);
	const data = ref(null);
	const error = ref(null);

	fetch(url)
		.then(res => res.json())
		.then(json => {
			loading.value = false;
			data.value = json;
		})
		.catch(err => {
			loading.value = false;
			error.value = err;
		});

	return { loading, data, error };
}