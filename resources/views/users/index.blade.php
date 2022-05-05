<x-app-layout>
  <x-slot name="header">
      <h2 class="h4 font-weight-bold">
          {{ __('Usuarios') }}
      </h2>
  </x-slot>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <a href="{{ route('users.create') }}" class="btn btn-md btn-success mb-3">AÑADIR</a>
                <a href="{{ route('export-Excel') }}" class="btn btn-md btn-info mb-3">EXPORTAR EXCEL</a>
                <a href="{{ route('export-PDF') }}" class="btn btn-md btn-info mb-3">EXPORTAR PDF</a>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">PASSWORD</th>
                        <th scope="col">ROLE</th>
                        <th scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($users as $user)
                        <tr>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>{!! $user->password !!}</td>
                                    
                             <td>{!! $user->role->type !!}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('¿Está seguro?');" action="{{ route('users.destroy', $user) }}" method="POST">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">ELIMINAR</button>
                                </form>
                            </td>
                        </tr>
                      @empty
                          <div class="alert alert-danger">
                              Los datos de los usuarios aún no estan disponibles.
                          </div>
                      @endforelse
                    </tbody>
                  </table>  
                  {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
</x-app-layout>
