<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    mostClicked : {
        type:String,
    },
    shortUrl : {
        type:String,
    },
    totalShortenedLinks : {
        type:String,
    },
});
</script>

<template>
    <Head title="Dashboard" />

	<AuthenticatedLayout>
		<template #header>
			<div class="flex items-center justify-between">
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
				<Link
					:href="route('welcome')"
					class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
					Create
				</Link>
			</div>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="flex flex-wrap">
						<div class="w-full md:w-1/2 xl:w-1/3 p-6">
							<!--Metric Card-->
							<div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
								<div class="flex flex-row items-center">
									<div class="flex-shrink pr-4">
										<div class="rounded-full p-5 bg-green-600"><i class="fa-solid fa-signs-post fa-2x fa-inverse"></i></div>
									</div>
									<div class="flex-1 text-right md:text-center">
										<h2 class="font-bold uppercase text-gray-600">Most Clicks</h2>
										<p class="font-bold text-3xl">
											{{ mostClicked }}
										</p>
									</div>
								</div>
							</div>
							<!--/Metric Card-->
						</div>


						<div class="w-full md:w-1/2 xl:w-1/3 p-6">
							<!--Metric Card-->
							<div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
								<div class="flex flex-row items-center">
									<div class="flex-shrink pr-4">
										<div class="rounded-full p-5 bg-blue-600"><i class="fas fa-computer-mouse fa-2x fa-inverse"></i></div>
									</div>
									<div class="flex-1 text-right md:text-center">
										<h2 class="font-bold uppercase text-gray-600">Most Clicked Slug</h2>
										<p class="font-bold text-3xl">{{ shortUrl }}</p>
									</div>
								</div>
							</div>
							<!--/Metric Card-->
						</div>

						<div class="w-full md:w-1/2 xl:w-1/3 p-6">
							<!--Metric Card-->
							<div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
								<div class="flex flex-row items-center">
									<div class="flex-shrink pr-4">
										<div class="rounded-full p-5 bg-red-600"><i class="fas fa-link fa-2x fa-inverse"></i></div>
									</div>
									<div class="flex-1 text-right md:text-center">
										<h2 class="font-bold uppercase text-gray-600">links shortened</h2>
										<p class="font-bold text-3xl">
											{{ totalShortenedLinks }}
										</p>
									</div>
								</div>
							</div>
							<!--/Metric Card-->
						</div>
					</div>
                    <div class="text-center text-3xl p-4 font-bold">
                        Keep up the good work !
                    </div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
