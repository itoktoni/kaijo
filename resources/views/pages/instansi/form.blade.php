<x-layout>
    <x-card label="Rumah Sakit {{ $model->field_code ?? '' }}">
        <x-form :model="$model">
            <x-action form="form" />

            @bind($model)

            <x-form-input col="6" name="instansi_nama" />
            <x-form-input col="6" name="instansi_telp" />
            <x-form-input col="6" name="instansi_email" />
            <x-form-input col="6" name="instansi_kontak" />
            <x-form-select col="6" name="instansi_aktif" :options="$status" />
            <x-form-select col="6" class="tag" :default="$selected ?? []" name="lokasi[]" multiple :options="$lokasi" />
            <x-form-textarea col="6" name="instansi_deskripsi" />
            <x-form-textarea col="6" name="instansi_alamat" />

            @endbind

        </x-form>
    </x-card>
</x-layout>
