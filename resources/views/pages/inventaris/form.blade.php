<x-layout>
    <x-card>
        <x-form :model="$model">
            <x-action form="form" />

            @bind($model)

            <x-form-select col="6" class="search" name="inventaris_id_nama" :options="$name" />
            <x-form-input col="6" label="Serial Number" name="inventaris_sn" />
            <x-form-select col="6" class="search" label="Rumah sakit" name="inventaris_id_instansi" :options="$instansi" />
            <x-form-select col="6" class="search" name="inventaris_id_lokasi" :options="$location" />
            <x-form-select col="3" class="search" name="inventaris_id_tipe" :options="$type" />
            <x-form-select col="3" class="search" name="inventaris_id_brand" :options="$brand" />
            <x-form-textarea col="6" name="inventaris_deskripsi" />


            <x-form-select col="3" class="search" name="inventaris_is_kalibrator" :options="$boolean" />
            <x-form-select col="3" class="search" name="inventaris_is_asset" :options="$boolean" />

            @endbind

        </x-form>
    </x-card>
</x-layout>
