<x-layout>
    <x-card label="Rumah Sakit {{ $model->field_code ?? '' }}">
        <x-form :model="$model">
            <x-action form="form" />

            @bind($model)

            <x-form-input col="6" name="rs_nama" />
            <x-form-input col="6" name="rs_telp" />
            <x-form-input col="6" name="rs_email" />
            <x-form-input col="6" name="rs_kontak" />
            <x-form-select col="6" name="rs_aktif" :options="$status" />
            <x-form-select col="6" class="tag" :default="$selected ?? []" name="ruangan[]" multiple :options="$ruangan" />
            <x-form-textarea col="6" name="rs_deskripsi" />
            <x-form-textarea col="6" name="rs_alamat" />

            @endbind

        </x-form>
    </x-card>
</x-layout>
