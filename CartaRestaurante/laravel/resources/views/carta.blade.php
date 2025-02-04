<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            { __('Carta del Restaurante') }
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (!isset($categorias) || $categorias->isEmpty())
                        <p class="text-center text-danger">No hay categorías disponibles.</p>
                    @endif

                    @foreach ($categorias as $categoria)
                        <h2 class="mt-5 text-lg font-semibold">{ $categoria->nombre }</h2>

                        @if(isset($categoria->productos) && $categoria->productos->isNotEmpty())
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                @foreach ($categoria->productos as $producto)
                                    <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg overflow-hidden">
                                        <img src="{ $producto->imagen ? asset($producto->imagen) : asset('images/default.jpg') }" 
                                             class="w-full h-48 object-cover" alt="{ $producto->nombre }">
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold">{ $producto->nombre }</h3>
                                            <p class="text-gray-600 dark:text-gray-300">{ $producto->descripcion }</p>
                                            <p class="text-primary font-bold mt-2">{ number_format($producto->precio, 2) } €</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">No hay productos en esta categoría.</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>