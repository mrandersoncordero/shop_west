<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
          {{ __('Categories') }}
          <a href="{{ route('categories.create') }}" class="text-xs bg-gray-800 text-white rounded px-2 py-1">Crear</a>
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <table class="mb-4">
                @forelse ($categories as $category)
                    <tr class="border-b border-gray-200 text-sm">
                        <td class="px-6 py-4">{{ $category->name }}</td>
                        <td class="px-6 py-4">{{ $category->description }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input 
                                type="submit" 
                                value="Eliminar" 
                                class="bg-gray-800 text-white rounded px-4 py-2"
                                onclick="return confirm('Desea Eliminar?')"
                            >
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="p-6 text-gray-900">
                        {{ __("Sin datos") }}
                    </div>
                @endforelse
              </table>
          </div>
      </div>
  </div>
</x-app-layout>