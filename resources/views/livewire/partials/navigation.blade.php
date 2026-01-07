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
						<div
							x-data="{
								orderDieMenu: false,
								treadMenu: false,
								sidewallMenu: false,
								doubleMenu: false,
								tripleMenu: false,
								blackMenu: false,
								whiteMenu: false,
							}"
							class="relative"
						>
							<!-- MAIN MENU -->
							<button
								@click="orderDieMenu = !orderDieMenu"
								class="{{ Route::is('chart.*') ? 'hover:bg-indigo-800/50 text-white bg-indigo-800' : 'hover:bg-white/5 text-gray-300' }} rounded-md px-3 py-2 text-sm font-medium "
							>
								Order Die
							</button>

							<!-- DROPDOWN LEVEL 1 -->
							<div
								x-show="orderDieMenu"
								x-cloak
								@click.outside="
									orderDieMenu = false;
									treadMenu = false;
									sidewallMenu = false;
									blackMenu = false;
									whiteMenu = false;
								"
								x-transition
								class="absolute right-0 z-50 mt-2 w-56 rounded-md bg-gray-800 py-1 shadow-lg"
							>
								<!-- MATERIAL 1 -->
								<div class="relative">
									<button
										@click="treadMenu = !treadMenu; sidewallMenu = false;  blackMenu = false; whiteMenu = false"
										:class="treadMenu ? 'bg-gray-700' : ''"
										class="flex w-full items-center justify-between px-4 py-2 text-sm text-gray-300 hover:bg-white/5"
									>
										Tread
										<span x-show="!treadMenu"><i class="fas fa-caret-right"></i></span>
										<span x-show="treadMenu"><i class="fas fa-caret-down"></i></span>
									</button>

									<!-- DROPDOWN LEVEL 2 -->
									<div
										x-show="treadMenu"
										x-cloak
										x-transition
										class="absolute top-0 left-full ml-1 w-32 rounded-md bg-gray-800 py-1 shadow-lg"
									>
										<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
											Double
										</a>
										<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
											Triple
										</a>
									</div>
								</div>

								<!-- MATERIAL 2 -->
								<div class="relative">
									<button
										@click="sidewallMenu = !sidewallMenu; treadMenu = false"
										:class="sidewallMenu ? 'bg-gray-700' : ''"
										class="flex w-full items-center justify-between px-4 py-2 text-sm text-gray-300 hover:bg-white/5"
									>
										Sidewall
										<span x-show="!sidewallMenu"><i class="fas fa-caret-right"></i></span>
										<span x-show="sidewallMenu"><i class="fas fa-caret-down"></i></span>
									</button>

									<!-- DROPDOWN LEVEL 2 -->
									<div
										x-show="sidewallMenu"
										x-cloak
										x-transition
										class="absolute top-0 left-full ml-1 w-32 rounded-md bg-gray-800 py-1 shadow-lg"
									>
										<button 
										@click="blackMenu = !blackMenu; whiteMenu = false"
										:class="blackMenu ? 'bg-gray-700' : ''"
										class="flex w-full items-center justify-between px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
											Black
											<span x-show="!blackMenu"><i class="fas fa-caret-right"></i></span>
											<span x-show="blackMenu"><i class="fas fa-caret-down"></i></span>
										</button>

										<!-- DROPDOWN LEVEL 3 -->
										<button
											x-show="blackMenu"
											x-cloak
											x-transition
											class="absolute top-0 left-full ml-1 w-32 rounded-md bg-gray-800 py-1 shadow-lg"
										>
											<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
												2 Compound
											</a>
											<a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
												3 Compound
											</a>
											<a href="{{ route('chart.input-black-sidewall-4-compd') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
												4 Compound
											</a>
										</button>
										<button 
											class="relative flex w-full items-center justify-between px-4 py-2 text-sm text-gray-300 hover:bg-white/5"
											@click="whiteMenu = !whiteMenu; blackMenu = false"
											:class="whiteMenu ? 'bg-gray-700' : ''">
											White
											
											<span x-show="!whiteMenu"><i class="fas fa-caret-right"></i></span>
											<span x-show="whiteMenu"><i class="fas fa-caret-down"></i></span>
											<div
												x-show="whiteMenu"
												x-cloak
												x-transition
												class="absolute top-0 left-full ml-1 w-32 rounded-md bg-gray-800 py-1 shadow-lg"
											>
												<a class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
													2 Compound
												</a>
												<a class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
													3 Compound
												</a>
												<a class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
													4 Compound
												</a>
											</div>
										</button>
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
						{{-- Toggle Dark Mode --}}
						<div class="flex items-center text-white mr-4">
							<span id="light" class="mr-1 text-lg text-amber-300"><i class="fas fa-sun"></i></span>
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
							<span id="dark" class="ml-1 text-lg"><i class="fas fa-moon"></i></span>
						</div>

						<!-- Profile dropdown -->
						<div class="relative ml-3" x-data="{ openProfileMenu: false }">
							<button
								@click="openProfileMenu = !openProfileMenu"
								class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
							>
								<span class="absolute -inset-1.5"></span>
								<span class="sr-only">Open user menu</span>
								@auth
									<img
								src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('asset/img/avatar2.png') }}"
								class="size-8 rounded-full outline -outline-offset-1 outline-white/10  object-cover"
								alt="avatar"
								/>
								@endauth
							</button>
							<div
								x-show="openProfileMenu"
								x-cloak
								@click.outside="openProfileMenu = false"
								x-transition
								class="absolute right-0 z-50 mt-2 w-48 rounded-md bg-gray-800 py-1 shadow-lg"
							>
								<div class="flex justify-center">
									@auth
										<img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('asset/img/avatar2.png') }}" class="w-28 h-24 rounded rounded-s object-cover" alt="">
									@endauth
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
			const lightIcon = document.querySelector('#light');
			const darkIcon = document.querySelector('#dark');
			if (localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
				lightIcon.classList.remove('text-amber-300');
				darkIcon.classList.add('text-indigo-300');
			} else {
				darkIcon.classList.remove('text-indigo-300');
				lightIcon.classList.add('text-amber-300');
			}

			darkToggle.addEventListener("click", function () {
			if (darkToggle.checked) {
				html.classList.add("dark");
				localStorage.theme = "dark";
				lightIcon.classList.remove('text-amber-300');
				darkIcon.classList.add('text-indigo-300');
			} else {
				html.classList.remove("dark");
				localStorage.theme = "light";
				darkIcon.classList.remove('text-indigo-300');
				lightIcon.classList.add('text-amber-300');
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