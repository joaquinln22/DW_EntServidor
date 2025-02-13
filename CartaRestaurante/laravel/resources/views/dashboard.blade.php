<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ol style="list-style: circle; color:#4f46e5;">
                        <li class="mb-4">
                            <a href="{{ route('productos.index') }}" style="color: white; text-decoration: none;"
                            onmouseover="this.style.color='#4f46e5'" onmouseout="this.style.color='white'">
                                Gestión de Productos
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('categorias.index') }}" style="color: white; text-decoration: none;"
                            onmouseover="this.style.color='#4f46e5'" onmouseout="this.style.color='white'">
                                Gestión de Categorías
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('anuncios.index') }}" style="color: white; text-decoration: none;"
                            onmouseover="this.style.color='#4f46e5'" onmouseout="this.style.color='white'">
                                Gestión de Anuncios
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>