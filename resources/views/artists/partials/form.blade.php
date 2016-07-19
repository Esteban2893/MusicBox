<!-- Form Input -->
<div class="form-group">
  <label for="name">Nombre:</label>
  <input
    type="text" name="name" class="form-control"
    value="{{ isset($artist->name) ? $artist->name : '' }}">
</div>

<!-- Buttons -->
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
    <a class="btn btn-default" href="{{ URL::to('artists/') }}">Cancelar</a>
</div>
