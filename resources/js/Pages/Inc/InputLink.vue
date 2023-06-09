<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { ref } from "vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

defineProps({
	url: {
		type: String,
	},
});

const LinkInput = ref(null);

const form = useForm({
	orginal_url: "",
});

const shortenLink = () => {
	form.post(route("shorten.url"), {
		onFinish: () => form.reset(),
	});
};
const { props } = usePage();

// console.log(successMessage);
</script>

<template>
	<section>
		<form
			@submit.prevent="shortenLink"
			class="mt-0 space-y-5">
			<div class="grid grid-cols-2 gap-0">
				<div class="col-span-2 md:col-span-1">
					<div class="grid grid-cols-2 gap-4">
						<div class="w-full">
							<TextInput
								id="orginal_url"
								type="url"
								class="mt-0 xl:w-96 md:w-full "
								ref="LinkInput"
								placeholder="Enter Link Here!"
								v-model="form.orginal_url"
								required
								autofocus
								autocomplete="link" />
						</div>
						<div class="flex justify-center w-30">
							<PrimaryButton
								:disabled="form.processing"
								class="scale-105 border-red-500 border-2 active:border-red-700">
								Shorten
							</PrimaryButton>
						</div>
						<div>
							<InputError
								class="mt-2"
								:message="form.errors.orginal_url" />
							<Transition
								enter-active-class="transition-opacity ease-in-out duration-300"
								leave-active-class="transition-opacity ease-in-out duration-300">
								<p
									v-if="form.recentlySuccessful"
									class="mt-2 text-sm text-green-600">
									Shortened.
								</p>
							</Transition>

							<div v-if="!$page.props.auth.user" class="text-xl font-semibold text-gray-900 dark:text-white mt-0">
								Want to see all your links?
								<Link
									href="{{ route('register') }}"
									class="underline"
									>Register</Link
								>
								now!
							</div>
							<div
							class="text-xl font-semibold text-gray-900 dark:text-white mt-0"
							v-else>
								Check links stats from <Link
									:href="route('links.index')"
									class="underline text-red-500"
									>Here</Link
								>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div
						v-if="url"
						class="text-center">
						<p class="lg:text-3xl md:text-1xl sm:text-1xl font-semibold text-gray-900 dark:text-white mt-0">
							Your Short URL is
							<p >

								<Link
								:href="url"
								class="underline text-red-500"
								:target="'_blank'"
								>{{ url }}</Link
								>
							</p>
						</p>
					</div>
				</div>
			</div>
		</form>
	</section>
</template>
