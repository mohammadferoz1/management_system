<style>
    tr, th,td{
        text-align: center !important;
    }
</style>
<div>
    <x-page-title title="Bill Ledger">
    </x-page-title>
    <x-table>
        <x-slot name="head">
            <x-table.row>
                <x-table.headings>
                    Debit
                </x-table.headings>
                <x-table.headings>
                    Created At
                </x-table.headings>
            </x-table.row>
        </x-slot>
        <x-slot name="body">
            @foreach($this->ledger as $item)
                <x-table.row>
                    <x-table.cell>
                        {{$item->payment}}
                    </x-table.cell>
                    <x-table.cell>
                        {{$item->created_at}}
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
</div>
