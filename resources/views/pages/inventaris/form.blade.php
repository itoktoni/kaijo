<x-layout>
    <x-card>
        <x-form :model="$model">
            <x-action form="form" />

            @bind($model)

            <x-form-select col="6" class="search" name="inventaris_id_list_nama" :options="$name" />
            <x-form-input col="6" label="Serial Number" name="inventaris_sn" />
            <x-form-select col="6" class="search" name="inventaris_id_location" :options="$location" />
            <x-form-textarea col="6" name="inventaris_deskripsi" />

            @endbind

        </x-form>
    </x-card>
</x-layout>
