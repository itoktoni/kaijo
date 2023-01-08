<x-layout>
    <x-card>
        <x-form :model="$model">
            <x-action form="form" />

            @bind($model)

            <x-form-input col="6" name="rc_nama" />
            <x-form-textarea col="6" name="rc_deskripsi" />

            @endbind

        </x-form>
    </x-card>
</x-layout>
