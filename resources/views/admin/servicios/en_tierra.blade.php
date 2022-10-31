<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <input type="hidden" name="id_nicho" id="id_nicho" value="#id_nicho">
            <label for="nicho_numero">{{ 'Numero de nicho ' }}</label>
            <input class="form-control" value="{{ old('numero') }}" type="text" placeholder="numero" id="nicho_numero" name="numero" disabled>
            <label for="nicho_precio">{{ 'Precio' }}</label>
            <input class="form-control" value="{{ old('precio') }}" type="decimal" placeholder="precio" id="nicho_precio" name="precio">
        </div>
    </div>
    <div class="col-md-8">    
        <div class="form-group">
            <label for="descripcion">{{ 'Descripcion' }}</label>
            <div class="@error('user.descripcion')border border-danger rounded-3 @enderror">
                <textarea class="form-control" id="descripcion" rows="3" placeholder="Descripcion de la tumba" name="descripcion"></textarea>
            </div>
        </div>
    </div>
</div>
