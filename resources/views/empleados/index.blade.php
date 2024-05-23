<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado Empleados') }}
        </h2>
    </x-slot>

        @session('session')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession


    
    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <a class="btn btn-primary" href="{{ route('empleados.create') }}"><i class="fa fa-plus"></i> Nuevo empleado</a>
            
            <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="{{ route('empleados.search') }}" method="POST">
                @csrf
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="query" value="{{ $query ?? '' }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            </nav>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th>#</th>
                        <th>Name</th>
                        <th>Salario</th>
                        <th>Cargo</th>
                        <th>Departamento</th>
                        <th class="text-end min-w-70px">Action</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @foreach ($data as $key => $empleado)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $empleado->name }}</td>
                            <td>{{ $empleado->salario }}</td>
                            <td>{{ $empleado->cargo }}</td>
                            <td>{{ $empleado->departamento->descripcion }}</td>
                            <td>

                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{ route('empleados.edit', $empleado->id) }}"><i class="fa fa-plus"></i> Editar</a>
                                    <br/>
                                    
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
