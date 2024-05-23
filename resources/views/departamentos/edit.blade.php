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
            <h5 class="card-title mb-0">Edit departamento</h5>
            <span class="card-toolbar">
                <a class="btn btn-primary" href="{{ route('departamentos.index') }}">Users</a>
            </span>
        </div>

        <div class="card-body">
            <form action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="fs-6 fw-bold form-label mt-3">Name:</label>
                    <input id="name"
                        type="text"
                        name="descripcion"
                        value="{{ $departamento->descripcion }}"
                        class="@error('descripcion') is-invalid @enderror" />
                </div>
                

                
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
        </div>
    </div>
</div>
</x-app-layout>