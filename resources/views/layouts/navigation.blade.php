<div class="min-h-full">
  <nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
              <a href="{{ route('dashboard') }}" aria-current="page" class="{{ (Route::is('dashboard.*') || Route::is('dashboard')) ? 'bg-gray-950/50 text-white' : 'hover:bg-white/5' }} rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Dashboard</a>
              <a href="{{ route('input-chart') }}" class="{{ Route::is('input-chart') ? 'bg-gray-950/50 text-white' : 'hover:bg-white/5' }} rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Chart Sidewall</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Projects</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Calendar</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Reports</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>

			<!-- Profile dropdown -->
			<div class="relative ml-3" x-data="{ open: false }">
			<button
				@click="open = !open"
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
				x-show="open"
				@click.outside="open = false"
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