<div>
    @if ($temporadasList)
        <select wire:model="temporadaId" wire:change="getTemporadaData($event.target.value)">
            <option value="">Elige una Temporada</option>
            @foreach ($temporadasList as $temporada)
                <option value="{{ $temporada }}">{{ $temporada }}</option>
            @endforeach
        </select>
    @else
        <p>No hay temporadas disponibles.</p>
    @endif

    @if ($selectedTemporadaData)
        @foreach ($selectedTemporadaData as $item)
            <div>{{ $item['titulo'] }}</div>
        @endforeach
    @endif
</div>
