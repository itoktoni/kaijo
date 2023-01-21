<x-layout>
    <x-card>
        <x-form :model="$model">
            <x-action form="form" />

            @bind($model)

            <x-form-input col="6" name="lokasi_nama" />
            <x-form-select col="6" name="lokasi_id_custom" :options="$custom" />
            <x-form-textarea col="6" name="lokasi_deskripsi" />

            @endbind

        </x-form>
    </x-card>
</x-layout>
