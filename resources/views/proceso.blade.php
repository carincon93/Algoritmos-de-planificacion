<x-guest-layout>
    <div class="py-12 max-w-7xl m-auto px-6 lg:px-8">
        <div class="bg-white shadow-lg mb-4 overflow-hidden sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('quantum.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="flex justify-between items-center mb-5">
                        <label for="quantum">Por favor indique el quantum</label>
                        <input id="quantum" type="number" name="quantum" value="{{ $quantum ? $quantum->q : 0 }}">
                    </div>

                    <div class="flex items-center justify-end">
                        <button class="bg-green-500 hover:bg-green-700 py-2 px-5 text-white rounded" type="submit">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @foreach ($procesos as $proceso)
            <div class="bg-white shadow-lg mb-4 overflow-hidden sm:rounded-lg">
                <h1 class="font-black m-10">Proceso #{{ $proceso->id }}</h1>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('procesos.store') }}" method="POST">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $proceso->id }}">
                        <div class="flex justify-between items-center mb-5">
                            <label for="nombre">Por favor indique el nombre del proceso</label>
                            <input id="nombre" type="text" name="nombre" value="{{ $proceso->nombre }}">
                        </div>

                        <div class="flex justify-between items-center mb-5">
                            <label for="duracion">Por favor indique la duración</label>
                            <input id="duracion" type="number" name="duracion" value="{{ $proceso->duracion }}">
                        </div>

                        <div class="flex justify-between items-center mb-5">
                            <label for="prioridad">Por favor indique la prioridad</label>
                            <input id="prioridad" type="number" name="prioridad" value="{{ $proceso->prioridad }}">
                        </div>

                        <div class="flex items-center justify-end">
                            <button class="bg-green-500 hover:bg-green-700 py-2 px-5 text-white rounded" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="bg-white shadow-lg mb-4 overflow-hidden sm:rounded-lg">
            <h1 class="font-black m-10">Agregue un nuevo proceso</h1>
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('procesos.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="flex justify-between items-center mb-5">
                        <label for="nombre">Por favor indique el nombre del proceso</label>
                        <input id="nombre" type="text" name="nombre">
                    </div>

                    <div class="flex justify-between items-center mb-5">
                        <label for="duracion">Por favor indique la duración</label>
                        <input id="duracion" type="number" name="duracion">
                    </div>

                    <div class="flex justify-between items-center mb-5">
                        <label for="prioridad">Por favor indique la prioridad</label>
                        <input id="prioridad" type="number" name="prioridad">
                    </div>

                    <div class="flex items-center justify-end">
                        <button class="bg-green-500 hover:bg-green-700 py-2 px-5 text-white rounded" type="submit">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <a href="/sjf" class="underline">SJF</a>
            <a href="/fcfs" class="underline">FCFS</a>
            <a href="/prioridad" class="underline">Prioridad</a>
            <a href="/rr" class="underline">Round Robin</a>
        </div>
    </div>
</x-guest-layout>
