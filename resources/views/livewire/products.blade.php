<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <div>
                        {{-- Botón crear producto --}}
                        <button type="button" wire:click="createProductButton"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center m-6 ">
                            Crear Producto
                        </button>
                    </div>

                    {{-- Tabla de productos --}}
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cantidad
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-right">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{ $product->id }}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $product->description }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $product->quantity }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800 flex justify-end space-x-4">
                                        <svg wire:click="editProductButton({{ $product->id }})" 
                                            class="w-5 hover:cursor-pointer text-blue-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                            <path d="M80 0v-160h800V0H80Zm80-240v-150l362-362 150 150-362 362H160Zm557-406L567-796l72-72q11-12 28-11.5t28 11.5l94 94q11 11 11 27.5T789-718l-72 72Z"/>
                                        </svg>
                                        <svg wire:click="setDeleteData({{ $product->id }})"
                                            class="w-5 hover:cursor-pointer text-red-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z"/>
                                        </svg>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($modal)
                        @include('livewire._partials.create-modal')
                    @endif

                    @if (session()->has('message'))
                        @include('livewire._partials.toast')
                    @endif
                    
                    @if ($deleteModal)
                        @include('livewire._partials.delete-modal')
                    @endif
  
                </div>
            </div>
        </div>
    </div>
</div>
