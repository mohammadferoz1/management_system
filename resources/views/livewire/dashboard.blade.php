<div>
    <x-page-title title="Dashboard"></x-page-tile>
        <div>
            <h3 class="text-lg leading-6 font-bold text-gray-900 text-center bg-indigo-300 pt-2 pb-2">Over All</h3>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
              <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Home Expense</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$homeExpense}}</dd>
              </div>

              <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Employee Expense</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$employeeExpense}}</dd>
              </div>

              <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total Expense</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$totalExpense}}</dd>
              </div>
            </dl>
        </div>
        <div class="mb-4">
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                  <dt class="text-sm font-medium text-gray-500 truncate">Paid Amount</dt>
                  <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$paid_amount}}</dd>
                </div>

                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                  <dt class="text-sm font-medium text-gray-500 truncate">Unpaid Amount</dt>
                  <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$unpaid_amount}}</dd>
                </div>

                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                  <dt class="text-sm font-medium text-gray-500 truncate">Zakat</dt>
                  <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$zakat}}</dd>
                </div>
              </dl>
        </div>
        <div>
            <h3 class="text-lg leading-6 font-bold text-gray-900 text-center bg-indigo-300 pt-2 pb-2">This Month</h3>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
              <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Home Expense</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$mHomeExpense}}</dd>
              </div>

              <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Employee Expense</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$mEmployeeExpense}}</dd>
              </div>

              <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total Expense</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$mTotalExpense}}</dd>
              </div>
            </dl>
        </div>
        <div class="mb-4">
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                  <dt class="text-sm font-medium text-gray-500 truncate">Paid Amount</dt>
                  <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$mPaid_amount}}</dd>
                </div>

                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                  <dt class="text-sm font-medium text-gray-500 truncate">Unpaid Amount</dt>
                  <dd class="mt-1 text-3xl font-semibold text-gray-900">Rs. {{$mUnpaid_amount}}</dd>
                </div>
              </dl>
        </div>
        <x-page-title title="Black List Sites"></x-page-tile>
        <x-table>
            <x-slot name="head">
                <x-table.row>
                    <x-table.headings>
                        Name
                    </x-table.headings>
                    <x-table.headings>
                        Debit
                    </x-table.headings>
                    <x-table.headings>
                        Credit
                    </x-table.headings>
                    <x-table.headings>
                        Contact
                    </x-table.headings>
                    <x-table.headings>
                        Address
                    </x-table.headings>
                    <x-table.headings>
                        Status
                    </x-table.headings>
                    <x-table.headings>
                        Actions
                    </x-table.headings>
                </x-table.row>
            </x-slot>
            <x-slot name="body">
                @foreach($this->blackListSites as $site)
                    @if($site->checkIfBlackList()[0] > 0 || $site->checkIfBlackList()[1] > 1)
                        <x-table.row>
                            <x-table.cell>
                                {{$site->name}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$site->debit}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$site->credit}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$site->phone}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$site->address}}
                            </x-table.cell>
                            <x-table.cell>
                                @if($site->checkIfBlackList()[0] > 0 || $site->checkIfBlackList()[1] > 1)
                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-black rounded-full">BlackList</span>
                                @else
                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-lime-500 rounded-full">Good</span>
                                @endif
                            </x-table.cell>
                            <x-table.cell>
                                <button wire:click="edit({{$site->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            </x-table.cell>
                        </x-table.row>
                    @endif
                @endforeach
            </x-slot>
        </x-table>
</div>

