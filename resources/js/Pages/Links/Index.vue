<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Dropdown from "@/Components/Dropdown.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { usePage, useForm, Head , Link} from "@inertiajs/vue3";
import { ref } from "vue";
import Table from "@/Pages/Links/Inc/Table.vue";

defineProps(["links"]);
</script>

<template>
	<Head title="My Links" />

	<AuthenticatedLayout>
		<template #header>
			<div class="flex items-center justify-between">
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">My Links</h2>
				<Link
					:href="route('welcome')"
					class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
					>
					Create
				</Link>
			</div>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-0 lg:px-0">


				<Table :links="links"> </Table>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
