<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresa los datos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  action="{{ route('interested-clients.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="first_name" class="form-label">Nombre</label>
                  <input type="text" name="first_name" class="form-control" id="first_name">
                </div>
                <div class="mb-3">
                  <label for="last_name" class="form-label">Apellido</label>
                  <input type="text" name="last_name" class="form-control" id="last_name">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Correo</label>
                  <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="accept" value="1">
                    <label class="form-check-label" name="accept" for="accept">Aceptas recibir promociones y descuentos?</label>
                </div>
                
                <input type="hidden" name="name_mail" value="sheet">
                <input type="hidden" name="product" value="{{ $product->id }}">
                <button type="submit" class="btn" style="background-color: var(--blue); color: #fff;">Enviar</button>
            </form>
        </div>
      </div>
    </div>
</div>