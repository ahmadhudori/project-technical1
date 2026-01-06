<div class="min-h-full">
	<nav class="bg-gray-800/50">
		<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
			<div class="flex h-16 items-center justify-between">
				<div class="flex items-center">
					<div class="shrink-0">
						<img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
					</div>
					<div class="block">
						<div class="ml-10 flex items-baseline space-x-4">
						<!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
						<a href="{{ route('dashboard') }}" aria-current="page" class="{{ (Route::is('dashboard.*') || Route::is('dashboard')) ? 'hover:bg-indigo-800/50 text-white bg-indigo-800' : 'hover:bg-white/5 text-gray-300' }} rounded-md px-3 py-2 text-sm font-medium ">Dashboard</a>
						<a href="{{ route('input-chart') }}" class="{{ Route::is('input-chart') ? 'hover:bg-indigo-800/50 text-white bg-indigo-800' : 'hover:bg-white/5 text-gray-300' }} rounded-md px-3 py-2 text-sm font-medium ">Chart Sidewall</a>
						<div
							x-data="{
								openMaterialsMenu: false,
								openMaterial1: false,
								openMaterial2: false,
							}"
							class="relative"
						>
							<!-- MAIN MENU -->
							<button
								@click="openMaterialsMenu = !openMaterialsMenu"
								class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white"
							>
								Materials
							</button>

							<!-- DROPDOWN LEVEL 1 -->
							<div
								x-show="openMaterialsMenu"
								x-cloak
								@click.outside="
									openMaterialsMenu = false;
									openMaterial1 = false;
									openMaterial2 = false;
								"
								x-transition
								class="absolute right-0 z-50 mt-2 w-56 rounded-md bg-gray-800 py-1 shadow-lg"
							>
								<!-- MATERIAL 1 -->
								<div class="relative">
									<button
										@click="openMaterial1 = !openMaterial1; openMaterial2 = false"
										:class="openMaterial1 ? 'bg-gray-700' : ''"
										class="flex w-full items-center justify-between px-4 py-2 text-sm text-gray-300 hover:bg-white/5"
									>
										Material 1
										<span x-show="!openMaterial1"><i class="fas fa-caret-right"></i></span>
										<span x-show="openMaterial1"><i class="fas fa-caret-down"></i></span>
									</button>

									<!-- DROPDOWN LEVEL 2 -->
									<div
										x-show="openMaterial1"
										x-cloak
										x-transition
										class="absolute top-0 left-full ml-1 w-32 rounded-md bg-gray-800 py-1 shadow-lg"
									>
										<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
											List A
										</a>
										<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
											List B
										</a>
									</div>
								</div>

								<!-- MATERIAL 2 -->
								<div class="relative">
									<button
										@click="openMaterial2 = !openMaterial2; openMaterial1 = false"
										:class="openMaterial2 ? 'bg-gray-700' : ''"
										class="flex w-full items-center justify-between px-4 py-2 text-sm text-gray-300 hover:bg-white/5"
									>
										Material 2
										<span x-show="!openMaterial2"><i class="fas fa-caret-right"></i></span>
										<span x-show="openMaterial2"><i class="fas fa-caret-down"></i></span>
									</button>

									<!-- DROPDOWN LEVEL 2 -->
									<div
										x-show="openMaterial2"
										x-cloak
										x-transition
										class="absolute top-0 left-full ml-1 w-48 rounded-md bg-gray-800 py-1 shadow-lg"
									>
										<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
											List C
										</a>
										<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
											List D
										</a>
									</div>
								</div>
							</div>
						</div>
						<a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Calendar</a>
						<a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Reports</a>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="ml-4 flex items-center md:ml-6">
						<div class="flex items-center text-white mr-4">
							<span class="mr-1 text-sm">light</span>
							<input
								type="checkbox"
								name="dark-toggle"
								id="dark-toggle"
								class="hidden" />
							<label for="dark-toggle">
								<div
									class="flex h-5 w-9 cursor-pointer rounded-full bg-slate-500 p-1 items-center">
									<div
										class="toggle-circle h-4 w-4 bg-white rounded-full transition duration-300 ease-in-out"></div>
								</div>
							</label>
							<span class="ml-1 text-sm">dark</span>
						</div>

						<!-- Profile dropdown -->
						<div class="relative ml-3" x-data="{ openProfileMenu: false }">
							<button
								@click="openProfileMenu = !openProfileMenu"
								class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
							>
								<span class="absolute -inset-1.5"></span>
								<span class="sr-only">Open user menu</span>
								<img
								src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('asset/img/avatar2.png') }}"
								class="size-8 rounded-full outline -outline-offset-1 outline-white/10  object-cover"
								alt="avatar"
								/>
							</button>
							<div
								x-show="openProfileMenu"
								x-cloak
								@click.outside="openProfileMenu = false"
								x-transition
								class="absolute right-0 z-50 mt-2 w-48 rounded-md bg-gray-800 py-1 shadow-lg"
							>
								<div class="flex justify-center">
									<img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('asset/img/avatar2.png') }}" class="w-28 h-24 rounded rounded-s object-cover" alt="">
								</div>
								<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
								Your profile
								</a>
								<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
								Settings
								</a>
								<form action="{{ route('logout') }}" method="post">
									@csrf
									<button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
									Sign out
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
</div>
@push('js')
	<!-- Dark Mode Toggle Script -->
		<script>
			const darkToggle = document.querySelector("#dark-toggle");
			const html = document.querySelector("html");

			darkToggle.addEventListener("click", function () {
			if (darkToggle.checked) {
				html.classList.add("dark");
				localStorage.theme = "dark";
				console.log("dark");
			} else {
				html.classList.remove("dark");
				localStorage.theme = "light";
			}
			});

			// Pindahkan toggle circle sesuai Mode ketika di riset
			if (
			localStorage.theme === "dark" ||
			(!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)
			) {
			darkToggle.checked = true;
			} else {
			darkToggle.checked = false;
			}
		</script>
@endpush