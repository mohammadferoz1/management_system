

  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
      <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="csrf-token" content="{{ csrf_token() }}">

          <title>{{ config('app.name', 'Laravel') }}</title>

          <!-- Fonts -->
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

          <!-- Styles -->
          <link rel="stylesheet" href="{{ mix('css/app.css') }}">

          @livewireStyles

          <!-- Scripts -->
          <script src="{{ mix('js/app.js') }}" defer></script>
      </head>
      <body class="font-sans antialiased">
          <div>
              <div class="relative z-40 md:hidden" role="dialog" aria-modal="true">
                  <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
                  <div class="fixed inset-0 flex z-40">
                  <div class="relative flex-1 flex flex-col max-w-xs w-full bg-indigo-700">
                      <div class="absolute top-0 right-0 -mr-12 pt-2">
                      <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                          <span class="sr-only">Close sidebar</span>
                          <!-- Heroicon name: outline/x -->
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                      </button>
                      </div>

                      <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                      <div class="flex-shrink-0 flex items-center px-4">
                          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg" alt="Workflow">
                      </div>
                      <nav class="mt-5 px-2 space-y-1">
                          <!-- Current: "bg-indigo-800 text-white", Default: "text-white hover:bg-indigo-600 hover:bg-opacity-75" -->
                          <a href="#" class="bg-indigo-800 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                          <!-- Heroicon name: outline/home -->
                          <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                          </svg>
                          Dashboard
                          </a>
                          <a href="{{route('site.index')}}" class="text-white hover:bg-indigo-600 hover:bg-opacity-75 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                          <!-- Heroicon name: outline/inbox -->
                          <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                          </svg>
                          Sites
                          </a>
                      </nav>
                      </div>
                      <div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
                      <a href="#" class="flex-shrink-0 group block">
                          <div class="flex items-center">
                          <div>
                              <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                          </div>
                          <div class="ml-3">
                              <p class="text-base font-medium text-white">Tom Cook</p>
                              <p class="text-sm font-medium text-indigo-200 group-hover:text-white">View profile</p>
                          </div>
                          </div>
                      </a>
                      </div>
                  </div>

                  <div class="flex-shrink-0 w-14" aria-hidden="true">
                      <!-- Force sidebar to shrink to fit close icon -->
                  </div>
                  </div>
              </div>

              <!-- Static sidebar for desktop -->
              <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
                  <!-- Sidebar component, swap this element with another sidebar if you like -->
                  <div class="flex-1 flex flex-col min-h-0 bg-indigo-700">
                  <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                      <div class="flex items-center flex-shrink-0 px-4">
                      <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg" alt="Workflow">
                      </div>
                      <nav class="mt-5 flex-1 px-2 space-y-1">
                      <!-- Current: "bg-indigo-800 text-white", Default: "text-white hover:bg-indigo-600 hover:bg-opacity-75" -->

                      @if(Auth::user()->group == 'admin')
                        <a href="{{route("dashboard")}}" class="{{ (request()->is('dashboard')) ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/home -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>
                        <a href="{{route("site.index")}}" class="{{ (request()->is('admin/site/index')) || (request()->is('admin/site/create'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Site
                        </a>
                        <a href="{{route("contracted_site.index")}}" class="{{ (request()->is('admin/contracted_site/*'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Contracted Sites
                        </a>
                        <a href="{{route("employee.index")}}" class="{{ (request()->is('admin/employee/index')) || (request()->is('admin/employee/create'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Employees
                        </a>
                        <a href="{{route("task.index")}}" class="{{ (request()->is('admin/task/index')) || (request()->is('admin/task/create'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Tasks
                        </a>
                        <a href="{{route("product.index")}}" class="{{ (request()->is('admin/product/index')) || (request()->is('admin/product/create'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Products
                        </a>
                        <a href="{{route("home-expense.index")}}" class="{{ (request()->is('admin/home-expense/index')) || (request()->is('admin/home-expense/create'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Home Expense
                        </a>
                        <a href="{{route("bill.index")}}" class="{{ (request()->is('admin/bill/index')) || (request()->is('admin/bill/create'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Bills
                        </a>
                        <a href="{{route("bill.BillById")}}" class="{{ (request()->is('admin/bill/billByid'))? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Bill By Id
                        </a>
                        <a href="{{route("employees-expense.index")}}" class="{{ (request()->is('admin/employee-expense/*'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Employee Expense
                        </a>
                      @else
                        <a href="{{route("employee-task-unaccepted.index")}}" class="{{ (request()->is('employee/employee-task-unaccepted/index')) ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Task TODO
                        </a>
                        <a href="{{route("employee-task-accepted.index")}}" class="{{ (request()->is('employee/employee-task-accepted/index')) ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Accpeted Tasks
                        </a>
                        <a href="{{route("employeebill.create")}}" class="{{ (request()->is('employee/bill/create'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Request Bill
                        </a>
                        <a href="{{route("chat.index", Auth::id())}}" class="{{ (request()->is('chat/*'))  ? 'bg-indigo-800' : 'hover:bg-indigo-600' }} text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Chat
                        </a>
                      @endif

                      <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="{{ route('logout') }}"
                            @click.prevent="$root.submit();" class=" hover:bg-indigo-600 text-white hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </a>
                      </form>
                  </div>
                  <div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
                      <a href="#" class="flex-shrink-0 w-full group block">
                      <div class="flex items-center">
                          <div>
                          <img class="inline-block h-9 w-9 rounded-full" src="data:image/png;base64,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" alt="">
                          </div>
                          <div class="ml-3">
                          <p class="text-sm font-medium text-white">{{Auth::user()->name}}</p>
                          <p class="text-xs font-medium text-indigo-200 group-hover:text-white">Logged In</p>
                          </div>
                      </div>
                      </a>
                  </div>
                  </div>
              </div>
              <div class="md:pl-64 flex flex-col flex-1">
                  <div class="sticky top-0 z-10 md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-gray-100">
                  <button type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                      <span class="sr-only">Open sidebar</span>
                      <!-- Heroicon name: outline/menu -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                  </button>
                  </div>
                  <main class="flex-1">
                  <div class="py-6">
                      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        {{ $slot }}
                      <!-- /End replace -->
                      </div>
                  </div>
                  </main>
              </div>
          </div>
          @stack('modals')

          @livewireScripts
      </body>
  </html>
