<template>
	<div>
		<div class="flex justify-between pb-4">
			<!-- <div>
				<label
					for="table-search"
					class="sr-only"
					>Search</label
				>
				<div class="relative">
					<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
						<svg
							class="w-5 h-5 text-gray-500 dark:text-gray-400"
							aria-hidden="true"
							fill="currentColor"
							viewBox="0 0 20 20"
							xmlns="http://www.w3.org/2000/svg">
							<path
								fill-rule="evenodd"
								d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
								clip-rule="evenodd"></path>
						</svg>
					</div>
					<input
						v-model="search"
						type="text"
						id="table-search"
						class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
						placeholder="Search for items" />
				</div>
				<div>
					<nav
						class="flex items-center justify-between pt-4"
						aria-label="Table navigation">
						<ul class="inline-flex items-center -space-x-px">
							<li>
								<a
									href="#"
									class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
									<span class="sr-only">Previous</span>
									<svg
										class="w-5 h-5"
										aria-hidden="true"
										fill="currentColor"
										viewBox="0 0 20 20"
										xmlns="http://www.w3.org/2000/svg">
										<path
											fill-rule="evenodd"
											d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
											clip-rule="evenodd"></path>
									</svg>
								</a>
							</li>
							<li>
								<a
									href="#"
									class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
									<span class="sr-only">Next</span>
									<svg
										class="w-5 h-5"
										aria-hidden="true"
										fill="currentColor"
										viewBox="0 0 20 20"
										xmlns="http://www.w3.org/2000/svg">
										<path
											fill-rule="evenodd"
											d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
											clip-rule="evenodd"></path>
									</svg>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div> -->
		</div>
		<div class="flex flex-col mb-6">
			<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
				<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
					<div class="min-w-full overflow-x-auto">
						<table class="min-w-full divide-y divide-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
							<thead class="bg-gray-50">
								<tr>
									<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
									<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Url</th>
									<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shorten</th>
									<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Visits</th>
									<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Active</th>
									<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
									<th class="relative px-6 py-3">Edit</th>
								</tr>
							</thead>
							<tbody class="bg-white divide-y divide-gray-200">
								<tr
									v-for="link in links"
									:key="link.id">
									<td class="px-6 py-4 whitespace-nowrap">
										{{ link.short_url }}
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="text-gray-500">
											<a :href="link.org_url">{{ truncate(link.org_url, 28) }}</a>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="text-gray-500">
											<a
												class="underline"
												@click="handleLinkClick(link)"
												:href="'http://localhost:8000/shorten/' + link.short_url">
												Click Me!
											</a>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
										{{ link.clicks }}
									</td>
									<td class="px-6 py-4 whitespace-nowrap inline-flex items-center">
										<div>
											<form @submit.prevent="updateState(link.id)">
												<label class="relative mb-5 cursor-pointer">
													<input
														id="checkbox"
														type="checkbox"
														value=""
														:checked="link.is_enabled"
														:v-model="link.is_enabled"
														@change="toggleState(link)"
														class="sr-only peer" />
													<div
														class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 peer-checked:peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-600"></div>
												</label>
											</form>
										</div>
										<div class="ml-5 inline-flex items-center">
											<span
												v-if="link.is_enabled"
												class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
												Active
											</span>
											<span
												v-else
												class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
												Inactive
											</span>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="text-sm text-gray-900">{{ new Date(link.created_at).toLocaleString() }}</div>
										<div class="text-sm text-gray-500">{{ dayjs(link.created_at).fromNow() }}</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap flex justify-evenly text-right text-sm font-medium">
										<DropdownLink as="button"
											class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
											:href="route('shorten.destroy', link.id)"
											method="delete"
											>delete</DropdownLink
										>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<p
			v-if="links.length === 0"
			class="text-gray-800 font-bold text-2xl text-center my-10">
			No links found! Go create some I guess ?
			<Link
				class="text-red-500 underline"
				:href="route('welcome')"
				>Take me there</Link
			>
		</p>
	</div>
</template>
<script setup>
import dayjs from "dayjs";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Link, useForm} from "@inertiajs/vue3";
import relativeTime from "dayjs/plugin/relativeTime";
import { defineProps, ref,watch } from "vue";

defineProps(["links"]);

const search = ref('');

const perPage = ref(10);

const form = useForm({});

watch(search, (value) => {
	form.get(route("links.index", { search: value, perPage: perPage.value }));
});

const updateState = (linkId) => {
	form.put(route("shorten.update", linkId));
};

function handleLinkClick(link) {
	setTimeout(() => {
		window.location.reload();
	}, 2000);
}

function toggleState(link) {
	link.is_enabled = !link.is_enabled; // Toggle the state
	this.updateState(link.id, link.is_enabled); // Update the state in the database
}

function truncate(value, length) {
	if (value.length <= length) {
		return value;
	} else {
		return value.substr(0, length) + "...";
	}
}

dayjs.extend(relativeTime);
</script>

<style></style>
