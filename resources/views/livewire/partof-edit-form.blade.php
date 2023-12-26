<div>
    <form wire:submit.prevent="savePartof" method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @foreach ($partofs as $partof)
            <div class="mb-3 partof-relative">
                <x-form-label id="name{{ $partof['id'] }}"
                    label="Nama Bagian {{ $loop->iteration }} (ID: {{ $partof['id'] }})" />
                <div class="d-flex align-items-center">
                    <x-form-input id="name{{ $partof['id'] }}" name="name{{ $partof['id'] }}"
                        wire:model.defer="partofs.{{ $loop->index }}.name" value="{{ $partof['name'] }}" />
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-between align-items-center">
            <button class="btn btn-primary">
                Simpan
                <div wire:loading>
                    ...
                </div>
            </button>
        </div>
    </form>
</div>
