<x-app-layout>
<div class="justify-content-center">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Create user</h5>
            <span class="card-toolbar">
                <a class="btn btn-primary" href="{{ route('empleados.index') }}">Users</a>
            </span>
        </div>

        <div class="card-body">
            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="fs-6 fw-bold form-label mt-3">Name:</label>
                    <input id="name"
                        type="text"
                        name="name"
                        class="@error('name') is-invalid @enderror" />
                </div>
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="fs-6 fw-bold form-label mt-3">Salario:</label>
                    <input id="salario"
                        type="text"
                        name="salario"
                        class="@error('salario') is-invalid @enderror" />
                </div>
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="fs-6 fw-bold form-label mt-3">Cargo:</label>
                    <input id="cargo"
                        type="text"
                        name="cargo"
                        class="@error('cargo') is-invalid @enderror" />
                </div>
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="fs-6 fw-bold form-label mt-3">Departamento:</label>
                    <select name="departamento_id">
                        <option value="">Seleccione ...</option>
                        @foreach ($departamentos as $key => $departamento)
                            <option value="{{$departamento->id}}">{{$departamento->descripcion}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>
</div>
</x-app-layout>