<div class="mb">
    {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
</div>
<div class="mb">
    {{ Form::label('description', 'Descripción', ['class' => 'form-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>
<div class="mb">
    {{ Form::label('city', 'Ciudad', ['class' => 'form-label']) }}
    {{ Form::text('city', null, ['class' => 'form-control', 'maxlength' => 30]) }}
</div>
<div class="mb">
    {{ Form::label('phone', 'Teléfono', ['class' => 'form-label']) }}
    {{ Form::text('phone', null, ['class' => 'form-control', 'maxlength' => 10]) }}
</div>
<div class="mb">
    {{ Form::label('delivery', '¿Tiene domicilio?', ['class' => 'form-label']) }}
    {{ Form::select('delivery', ['y' => 'Si', 'n' => 'No'], null, ['class' => 'form-control']); }}
</div>
<div class="mb">
    <h4>Horario de atención</h4>
    <h3>Digite primero la hora de inicio y luego de salida( Incluya los dos puntos). </h3>
</div>
 <div class="row">
    <div class="col-3">
        <p>
            <label for="schedule1">Horario de inicio</label>
            <input type="time" id="schedule1">
        </p>

        {{-- {{ Form::label('schedule1', 'Horario de inicio', ['class' => 'form-label']) }}
        {{ Form::text('schedule1', null, ['class' => 'form-control', 'maxlength' => 5]) }} --}}
    </div>
    <div class="col-3">
        <label for="schedule2">Horario de salida</label>
            <input type="time" id="schedule2">
        {{-- {{ Form::label('schedule2', 'Horario de salida', ['class' => 'form-label']) }}
        {{ Form::text('schedule2', null, ['class' => 'form-control', 'maxlength' => 5]) }} --}}
    </div>
</div>
<div class="mb mb-3">
    {{ Form::label('category_id', 'Categoría', ['class' => 'form-label']) }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']); }}
</div>
<div class="mb">
    <h4>Redes sociales( OPCIONAL).</h4>
    <h3>Digite el link de sus respectivas páginas.</h3>
</div>
<div class="mb">
    {{ Form::label('facebook', 'Facebook', ['class' => 'form-label']) }}
    {{ Form::text('facebook', null, ['class' => 'form-control', 'maxlength' => 256]) }}
</div>
<div class="mb">
    {{ Form::label('twitter', 'Twitter', ['class' => 'form-label']) }}
    {{ Form::text('twitter', null, ['class' => 'form-control', 'maxlength' =>256]) }}
</div>
<div class="mb">
    {{ Form::label('instagram', 'Instagram', ['class' => 'form-label']) }}
    {{ Form::text('instagram', null, ['class' => 'form-control', 'maxlength' =>256]) }}
</div>
<div class="mb">
    {{ Form::label('youtube', 'YouTube', ['class' => 'form-label']) }}
    {{ Form::text('youtube', null, ['class' => 'form-control', 'maxlength' =>256]) }}
</div>
<div class="mb">
    <h4>Imagen del Restaurante</h4>
    {{-- Imagen --}}
</div>
 {{-- <div class="row">
    <div class="col-3">
        {{ Form::label('nombreImagen', 'Ingrese el nombre del logo', ['class' => 'form-label']) }}
        {{ Form::text('nombreImagen', null, ['class' => 'form-control']) }}
    </div>

    <div class="col-sm">
        <br>
        <br>
        {{ Form::label('logo', '', ['class' => 'form-label']) }}
        {{ Form::file('logo', null, ['class' => 'form-data']) }}
    </div>

</div>



<div class="mb">
    <form method="POST" action="{{route('images')}}" accept-charset="UTF-8" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="logo"><b>Logo: </b></label><br>
        <input type="file" name="logo" required>
        <input class="btn btn-success" type="submit" value="Enviar" >
      </form>
</div> --}}



