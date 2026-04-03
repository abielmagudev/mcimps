<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <div>
        <div class="d-flex flex-wrap gap-3 mb-3 mb-md-0">
            {{-- Fecha --}}
            <form action="{{ route('guias.index') }}" method="get">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Fecha</span>
                    <input type="date" class="form-control" name="fecha" value="{{ $request->get('fecha') }}" placeholder="Fecha" onchange="this.form.submit()" required>
                </div>
            </form>   

            {{-- Trasnportadora Americana --}}
            <form action="{{ route('guias.index') }}" method="get">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Transportadora Americana</span>
                    <select class="form-select" name="transportadora-americana" onchange="this.form.submit()" required>
                        <option label="Todas"></option>
                        @foreach ($transportadorasAmericanas as $transportadora)
                        <option value="{{ $transportadora->id }}" @selected($request->get('transportadora-americana') == $transportadora->id)>{{ $transportadora->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </form>   

            {{-- Trasnportadora Mexicana --}}
            <?php /*
            <form action="{{ route('guias.index') }}" method="get">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Transportadora Mexicana</span>
                    <select class="form-select" name="transportadora-mexicana" onchange="this.form.submit()" required>
                        <option label="Todas"></option>
                        @foreach ($transportadorasMexicanas as $transportadora)
                        <option value="{{ $transportadora->id }}" @selected($request->get('transportadora-mexicana') == $transportadora->id)>{{ $transportadora->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </form>   
            */ ?>
            
            {{-- Status --}}
            <form action="{{ route('guias.index') }}" method="get">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Status</span>
                    <select class="form-select text-capitalize" name="status" onchange="this.form.submit()" required>
                        @foreach ($statuses as $status)
                        <option value="{{ $status->value }}" @selected($request->get('status') == $status->value)>
                            {{ $status->value }}
                            ({{ $contadores[$status->value] }})
                        </option>
                        @endforeach
                    </select>
                </div>
            </form>   
        </div>
    </div>
    <div>
        <a href="{{ route('guias.create') }}" class="link-primary">Nueva guia</a>
    </div>
</div>
