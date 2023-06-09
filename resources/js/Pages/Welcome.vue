<script setup>
import { Head, Link, usePage } from "@inertiajs/vue3";
import InputLink from "@/Pages/Inc/InputLink.vue";
import { computed } from "vue";

defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
	url: {
		type: String,
	},
});

const { props } = usePage();
// var url = props.url ?? '';
// var url = computed(() => props.url);
</script>

<template>
	<Head title="Welcome" />

	<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
		<div
			v-if="canLogin"
			class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
			<Link
				v-if="$page.props.auth.user"
				:href="route('dashboard')"
				class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
				>Dashboard</Link
			>

			<template v-else>
				<Link
					:href="route('login')"
					class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
					>Log in</Link
				>

				<Link
					v-if="canRegister"
					:href="route('register')"
					class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
					>Register</Link
				>
			</template>
		</div>
		<div class="max-w-7xl mx-auto p-6 lg:p-8">
			<div class="flex items-center justify-center">
				<a href="#">
					<svg
						xmlns:xlink="http://www.w3.org/1999/xlink"
						width="150"
						height="150"
                        class="fill-red-500"
						viewBox="0 0 512 512"
						version="1.1"
						xmlns="http://www.w3.org/2000/svg">
						<g fill="ill-red-500">
							<path
								d=" M 23.71 85.08 C 17.22 49.81 49.44 14.86 85.08 18.12 C 118.83 19.21 145.72 53.33 139.45 86.37 C 155.64 102.30 171.32 118.83 187.87 134.36 C 198.32 111.73 208.84 89.12 219.57 66.62 C 226.05 53.84 243.47 48.74 255.73 56.27 C 263.76 62.10 270.34 69.69 277.25 76.75 C 286.28 86.61 285.72 102.89 276.31 112.31 C 223.38 165.37 170.38 218.37 117.35 271.34 C 107.72 280.99 91.01 281.25 81.11 271.86 C 74.39 264.94 66.82 258.69 61.24 250.77 C 53.72 238.52 58.85 221.07 71.64 214.62 C 94.11 203.87 116.72 193.38 139.33 182.91 C 123.81 166.36 107.30 150.68 91.37 134.49 C 60.20 140.28 27.37 116.78 23.71 85.08 Z"></path>
							<path
								d=" M 205.21 201.23 C 225.32 181.36 260.88 181.11 281.14 200.86 C 299.25 218.75 317.37 236.65 335.10 254.93 C 356.73 278.01 352.01 318.70 326.03 336.56 C 320.07 330.47 313.73 324.65 308.12 318.28 C 323.86 309.39 328.76 286.18 316.63 272.39 C 301.73 256.95 286.30 242.03 271.24 226.75 C 264.49 219.65 256.80 212.00 246.37 211.52 C 224.65 208.64 205.52 233.36 214.49 253.58 C 221.09 266.81 234.22 275.12 243.62 286.24 C 240.43 295.96 238.09 306.13 238.29 316.46 C 225.55 304.29 213.16 291.73 200.89 279.09 C 180.97 257.57 183.10 220.45 205.21 201.23 Z"></path>
							<path
								d=" M 273.90 352.07 C 252.28 328.99 256.98 288.31 282.96 270.46 C 288.93 276.54 295.26 282.36 300.88 288.72 C 285.14 297.62 280.23 320.82 292.38 334.61 C 307.27 350.05 322.70 364.96 337.75 380.25 C 344.51 387.35 352.20 395.00 362.64 395.48 C 384.35 398.37 403.49 373.64 394.51 353.42 C 387.92 340.18 374.78 331.88 365.38 320.76 C 368.56 311.04 370.91 300.86 370.71 290.54 C 383.45 302.70 395.84 315.27 408.11 327.91 C 428.03 349.43 425.90 386.55 403.78 405.77 C 383.68 425.64 348.13 425.89 327.86 406.14 C 309.75 388.25 291.60 370.37 273.90 352.07 Z"></path>
							<path
								d=" M 422.11 403.83 C 431.96 394.07 441.60 384.06 451.66 374.51 C 460.90 383.74 471.89 392.70 474.89 406.11 C 480.16 429.97 484.08 454.13 488.76 478.12 C 490.00 483.41 484.47 488.29 479.35 486.63 C 454.66 481.52 429.55 478.12 405.14 471.84 C 393.17 467.97 385.20 457.75 376.55 449.27 C 386.39 439.49 396.13 429.60 406.06 419.91 C 416.37 433.45 435.74 414.00 422.11 403.83 Z"></path>
						</g>
					</svg>
				</a>
			</div>
			<div class="mt-8 text-5xl font-semibold text-gray-900 dark:text-white text-center">Size isn't everything, except when it comes to links!</div>
			<div class="mt-16">
				<div
					class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
					<InputLink :url="url"> </InputLink>
				</div>
			</div>

			<div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
				<div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
					<div class="flex items-center gap-4">
						<a
							href="https://github.com/NBGamer99"
							class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
							<svg
								xmlns="http://www.w3.org/2000/svg"
								fill="none"
								viewBox="0 0 24 24"
								stroke-width="1.5"
								class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
							</svg>

							Made with love by @Yasser
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style>
.bg-dots-darker {
	background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
	.dark\:bg-dots-lighter {
		background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
	}
}
</style>
