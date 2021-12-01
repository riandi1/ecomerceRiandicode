<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete Esta informacion para crear un producto</h1>
    <div class="grid grid-cols-2 gap-6 mb-4">
        {{-- categoria --}}
        <div class="">
            <x-jet-label value="Categorias" />
            <select name="" wire:model="category_id" class="w-full form-control" id="">
                <option value="" selected disabled>Seleccione una Categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="category_id" />
        </div>
        {{-- subcategoria --}}
        <div class="">
            <x-jet-label value="SubCategorias" />
            <select name="" wire:model="subcategory_id" class="w-full form-control" id="">
                <option value="" selected disabled>Seleccione una SubCategoria</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="subcategory_id" />
        </div>
    </div>
    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" wire:model="name" placeholder="Ingrese el nombre del productos"
            class="w-full" />
            <x-jet-input-error for="name" />
    </div>
    {{-- slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input type="text" wire:model="slug" disabled placeholder="Ingrese el nombre del slug"
            class="w-full bg-gray-200" />
        <x-jet-input-error for="slug" />
    </div>   
    {{-- descripcion --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Descripcion" />
            <textarea wire:model="description" x-data x-init="ClassicEditor
        .create( $refs.miEditor )
        .then(function(editor){
            editor.model.document.on('change:data',() => {
                @this.set('description',editor.getData())
            })
        })
        .catch( error => {
            console.error( error );
        } );" x-ref="miEditor" name="" class="w-full form-control" id="" rows="4"></textarea>
        </div>
        <x-jet-input-error for="description" />
    </div>
    {{-- marca --}}
    <div class="grid grid-cols-2 gap-2 mb-4">
        <div class="">
            <x-jet-label value="Marca" />
            <select name="" wire:model="brand_id" class="w-full form-control" id="">
                <option value="" selected disabled>Seleccione una Marca</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="brand_id" />
        </div>
        
        {{-- precio --}}
        <div class="mb-4">
            <x-jet-label value="Precio" />
            <x-jet-input type="number" wire:model="price" step=".01" class="w-full" />
            <x-jet-input-error for="price" />
        </div>
    </div>

    @if ($subcategory_id)
        @if (!$this->subcategory->color && !$this->subcategory->size)
            <div class="mb-4">
                <x-jet-label value="Cantidad" />
                <x-jet-input type="number" wire:model="quantity" class="w-full" />
                <x-jet-input-error for="quantity" />
            </div>
        @endif
    @endif

    <div class="flex mt-4">
        <x-jet-button wire:loading.attr="disabled" wire:target="save" class="ml-auto" wire:click="save">
            Crear Producto
        </x-jet-button>
    </div>

</div>
