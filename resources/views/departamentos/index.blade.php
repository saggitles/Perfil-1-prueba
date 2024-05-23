<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado Departamentos') }}
        </h2>
    </x-slot>

    @session('session')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession


   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a class="btn btn-primary" href="{{ route('departamentos.create') }}"><i class="fa fa-plus"></i> Nuevo Departamento</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-end min-w-70px">Action</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @foreach ($data as $key => $departamento)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $departamento->descripcion }}</td>
                            <td>
                                <form action="{{ route('departamentos.destroy',$departamento->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <a class="btn btn-primary" href="{{ route('departamentos.edit', $departamento->id) }}"><i class="fa fa-plus"></i> Editar</a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>                            
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->render() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
