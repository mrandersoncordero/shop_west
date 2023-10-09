@csrf

<div class="form-floating mb-3">
  <input type="text" class="form-control" name="name" value="{{ $category->name }}">
  <label for="floatingInput">Name</label>
</div>
<div class="form-floating">
  <textarea class="form-control" name="description" rows="5">{{ $category->description }}</textarea>
  <label for="floatingTextarea">Description</label>
</div>

<div style="display: flex; align-items: center; margin-top: 10px;">
  <input type="submit" value="Enviar" class="btn btn-primary">
</div>