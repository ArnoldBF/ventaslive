@include('common.modalHead')


<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="">
            @error('name') <span class="text-danger er">{{$message}}</span>@enderror
        </div>

    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Codigo</label>
            <input type="text" wire:model.lazy="barcode" class="form-control" placeholder="">
            @error('barcode') <span class="text-danger er">{{$message}}</span>@enderror
        </div>

    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Costo</label>
            <input type="text" wire:model.lazy="cost" class="form-control" placeholder="">
            @error('cost') <span class="text-danger er">{{$message}}</span>@enderror
        </div>

    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Precio</label>
            <input type="text" wire:model.lazy="price" class="form-control" placeholder="">
            @error('price') <span class="text-danger er">{{$message}}</span>@enderror
        </div>

    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Stock</label>
            <input type="number"  wire:model.lazy="stock" class="form-control" placeholder="">
            @error('stock') <span class="text-danger er">{{$message}}</span>@enderror
        </div>

    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Alertas</label>
            <input type="number"  wire:model.lazy="alerts" class="form-control" placeholder="">
            @error('alerts') <span class="text-danger er">{{$message}}</span>@enderror
        </div>

    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Categoria</label>
            <select wire:model='categoryid' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
             @error('categoryid') <span class="text-danger er">{{$message}}</span>@enderror
        </div>
    </div>
<div class="col-sm-12 col-md-6">
    <div class="form-group custom-file">
        <input type="file" class="custom-file-input form-control" wire:model="image"
        accept="image/x-png, image/git, image/jpeg"
        >
        <label class="custom-file-label">Imagen {{$image}}</label>
        @error('image') <span class="text-danger er">{{$message}}</span>@enderror

    </div>
</div>
</div>

@include('common.ModalFooter')