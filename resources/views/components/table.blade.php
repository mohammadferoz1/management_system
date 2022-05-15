<div class="py-2 align-middle inline-block min-w-full">
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-500">
            <tr>
                {{ $head }}
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <!-- Odd row -->
            <tr class="bg-white">
                {{ $body }}
            </tr>

            </tbody>
        </table>
    </div>
</div>

