<div>
    <x-page-title title="Dashboard" class="text-center"></x-page-tile>
        <div>
            <h3 class="text-lg leading-6 font-bold text-white text-center bg-black pt-2 pb-2">Over All</h3>
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
            <h3 class="text-lg leading-6 font-bold text-white text-center bg-black pt-2 pb-2">This Month</h3>
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
        <x-page-title title="Tasks"></x-page-tile>
            <x-table>
                <x-slot name="head">
                    <x-table.row>
                        <x-table.headings>
                            Name
                        </x-table.headings>
                        <x-table.headings>
                            Site Name
                        </x-table.headings>
                        <x-table.headings>
                            Start at
                        </x-table.headings>
                        <x-table.headings>
                            End at
                        </x-table.headings>
                        <x-table.headings>
                            Number Of Workers
                        </x-table.headings>
                        <x-table.headings>
                            Status
                        </x-table.headings>
                    </x-table.row>
                </x-slot>
                <x-slot name="body">
                    @foreach($tasksMonthly as $task)
                        <x-table.row>
                            <x-table.cell>
                                {{$task->name}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->site->name}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->start_at}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->end_at}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->num_of_workers}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->status}}
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
        <x-page-title title="Bills"></x-page-tile>
            <x-table>
                <x-slot name="head">
                    <x-table.row>
                        <x-table.headings>
                            Made By
                        </x-table.headings>
                        <x-table.headings>
                            Site Name
                        </x-table.headings>
                        <x-table.headings>
                            Total Price
                        </x-table.headings>
                        <x-table.headings>
                            Debit
                        </x-table.headings>
                        <x-table.headings>
                            Credit
                        </x-table.headings>
                        <x-table.headings>
                            Status
                        </x-table.headings>
                    </x-table.row>
                    <x-slot name="body">
                        @foreach($monthlyBills as $bill)
                            <x-table.row>
                                <x-table.cell>
                                    {{$bill->user->name}}
                                </x-table.cell>
                                <x-table.cell>
                                    @if($bill->site_type == 'non_contracted')
                                        {{$bill->site->name}}
                                    @else
                                        {{$bill->contractedsite->name}}
                                    @endif
                                </x-table.cell>
                                <x-table.cell>
                                    {{$bill->total_price}}
                                </x-table.cell>
                                <x-table.cell>
                                    {{$bill->debit}}
                                </x-table.cell>
                                <x-table.cell>
                                    {{$bill->credit}}
                                </x-table.cell>
                                <x-table.cell>
                                    {{$bill->status}}
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-slot>
                </x-slot>
            </x-table>
        <h3 class="text-lg leading-6 font-bold text-white text-center bg-black pt-2 pb-2 mb-3">Today</h3>
        <x-page-title title="Tasks"></x-page-tile>
            <x-table>
                <x-slot name="head">
                    <x-table.row>
                        <x-table.headings>
                            Name
                        </x-table.headings>
                        <x-table.headings>
                            Site Name
                        </x-table.headings>
                        <x-table.headings>
                            Start at
                        </x-table.headings>
                        <x-table.headings>
                            End at
                        </x-table.headings>
                        <x-table.headings>
                            Number Of Workers
                        </x-table.headings>
                        <x-table.headings>
                            Status
                        </x-table.headings>
                    </x-table.row>
                </x-slot>
                <x-slot name="body">
                    @foreach($tasksToday as $task)
                        <x-table.row>
                            <x-table.cell>
                                {{$task->name}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->site->name}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->start_at}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->end_at}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->num_of_workers}}
                            </x-table.cell>
                            <x-table.cell>
                                {{$task->status}}
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
        <x-page-title title="Bills"></x-page-tile>
            <x-table>
                <x-slot name="head">
                    <x-table.row>
                        <x-table.headings>
                            Made By
                        </x-table.headings>
                        <x-table.headings>
                            Site Name
                        </x-table.headings>
                        <x-table.headings>
                            Total Price
                        </x-table.headings>
                        <x-table.headings>
                            Debit
                        </x-table.headings>
                        <x-table.headings>
                            Credit
                        </x-table.headings>
                        <x-table.headings>
                            Status
                        </x-table.headings>
                    </x-table.row>
                    <x-slot name="body">
                        @foreach($todayBills as $bill)
                            <x-table.row>
                                <x-table.cell>
                                    {{$bill->user->name}}
                                </x-table.cell>
                                <x-table.cell>
                                    @if($bill->site_type == 'non_contracted')
                                        {{$bill->site->name}}
                                    @else
                                        {{$bill->contractedsite->name}}
                                    @endif
                                </x-table.cell>
                                <x-table.cell>
                                    {{$bill->total_price}}
                                </x-table.cell>
                                <x-table.cell>
                                    {{$bill->debit}}
                                </x-table.cell>
                                <x-table.cell>
                                    {{$bill->credit}}
                                </x-table.cell>
                                <x-table.cell>
                                    {{$bill->status}}
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-slot>
                </x-slot>
            </x-table>

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
                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-black rounded-full">BlackList</span>
                            </x-table.cell>
                            <x-table.cell>
                                <button wire:click="edit({{$site->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            </x-table.cell>
                        </x-table.row>
                @endforeach
            </x-slot>
        </x-table>
</div>

