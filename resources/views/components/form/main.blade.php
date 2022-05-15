@props(['errorMessages' => null,])
<div {{ $attributes->merge(['class' => 'mt-8 md:mx-auto items-center'])}}>
    <div class='mt-2 md:mt-0 md:col-span-2'>
        <div class="pt-2 space-y-6 sm:pt-2 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{$formTitle ?? ""}}</h3>
                </div>
            @if($errorMessages)
                <div class="rounded-md bg-red-50 p-4">
                    <div class="flex">
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: solid/x-circle -->
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">There were {{count($errors)}} errors with your submission</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul role="list" class="list-disc pl-5 space-y-1">
                                {{$errorMessages}}
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            @endif

                <div class="grid grid-cols-6 gap-6  sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    {{$body}}
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        {{$formFooter ?? ""}}
                    </div>
                </div>
            </div>
    </div>
</div>
