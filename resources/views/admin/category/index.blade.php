@extends('templates.dashboard')

@section('head_content')
<title>Dashboard</title>
@endsection

@section('content')
<div class="home_content">
    <div class="text">Home Content</div>
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
@endsection