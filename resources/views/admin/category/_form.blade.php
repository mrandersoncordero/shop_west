@csrf

<label for="" class="uppercase text-gray-700 text-xs">Name</label>
<input type="text" name="name" class="rounded border-gray-200 w-full mb-4" value="{{ $category->name }}">

<label for="" class="uppercase text-gray-700 text-xs">Description</label>
<textarea name="description" rows="5" class="rounded border-gray-200 w-full mb-4 text-black">{{ $category->description }}</textarea>

<div class="flex justify-between items-center">
  <a href="{{ route('categories.index') }}" class="text-indigo-600">Volver</a>
  <input type="submit" value="Enviar" class="text-xs bg-gray-800 text-white rounded px-4 py-2">
</div>