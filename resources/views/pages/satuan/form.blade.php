<x-layout>
    <x-card>
        <x-form :model="$model">
            <x-action form="form" />

            @bind($model)

            <x-form-input col="6" name="satuan_kode" />
            <x-form-input col="6" name="satuan_nama" />

            @endbind

        </x-form>
    </x-card>
</x-layout>
