<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="fixed w-full z-30 flex bg-white dark:bg-[#0F172A] p-2 items-center justify-center h-16 px-10">
        <div class="logo ml-12 dark:text-white  transform ease-in-out duration-500 flex-none h-full flex items-center justify-center">
{{--            <a href="{{ route('dashboard') }}">--}}
                {{ config('app.name', 'Laravel') }}
{{--                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />--}}
{{--            </a>--}}
        </div>
        <!-- SPACER -->
        <div class="grow h-full flex items-center justify-center"></div>
        <div class="flex-none h-full text-center flex items-center justify-center">

            <div class="flex space-x-3 items-center px-3">
                <div class="flex-none flex justify-center">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="flex items-center mr-4 hover:text-blue-100 cursor-pointer"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           this.closest('form').submit();">
                            <div class="block text-sm md:text-md text-black dark:text-white">
                                <div class="w-8 h-8 flex ">
                                    <span class="inline-flex mr-1">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    </span>

                                    Logout
                                </div>
                            </div>
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</nav>
