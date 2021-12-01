<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete Esta informacion para crear un producto</h1>
    <div class="mb-4">
        <form wire:ignore method="post" action="{{ route('admin.products.files', $product) }}" class="dropzone"
            id="my-awesome-dropzone"></form>
    </div>
    @if ($product->images->count())
    <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
        <h1 class="text-2xl text-center font-semibold mb-2">
            Imagenes del producto
        </h1>
        <ul class="flex flex-wrap">
            @foreach ($product->images as $image)
                <li class="relative" wire:key="image-{{$image->id}}">
                    <img class="w-32 h-20" src="{{Storage::url($image->url)}}" alt="">
                    <x-jet-danger-button class="absolute right-2 top-2" wire:click="deleteImage({{$image->id}})" wire:loading.attr="disabled" wire:target="deleteImage({{ $image->id }})">
                        x
                    </x-jet-danger-button>
                </li>
            @endforeach
        </ul>
    </section>
    @endif

    <div class="bg-white shadow-xl rounded-lg p-4">
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
                <select name="" wire:model="product.subcategory_id" class="w-full form-control" id="">
                    <option value="" selected disabled>Seleccione una SubCategoria</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="product.subcategory_id" />
            </div>
        </div>
        {{-- Nombre --}}
        <div class="mb-4">
            <x-jet-label value="Nombre" />
            <x-jet-input type="text" wire:model="product.name" placeholder="Ingrese el nombre del productos"
                class="w-full" />
            <x-jet-input-error for="product.name" />
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
                <textarea wire:model="product.description" x-data x-init="ClassicEditor
            .create( $refs.miEditor )
            .then(function(editor){
                editor.model.document.on('change:data',() => {
                    @this.set('product.description',editor.getData())
                })
            })
            .catch( error => {
                console.error( error );
            } );" x-ref="miEditor" name="" class="w-full form-control" id="" rows="4"></textarea>
            </div>
            <x-jet-input-error for="product.description" />
        </div>
        {{-- marca --}}
        <div class="grid grid-cols-2 gap-2 mb-4">
            <div class="">
                <x-jet-label value="Marca" />
                <select name="" wire:model="product.brand_id" class="w-full form-control" id="">
                    <option value="" selected disabled>Seleccione una Marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="product.brand_id" />
            </div>

            {{-- precio --}}
            <div class="mb-4">
                <x-jet-label value="Precio" />
                <x-jet-input type="number" wire:model="product.price" step=".01" class="w-full" />
                <x-jet-input-error for="product.price" />
            </div>
        </div>

        @if ($this->subcategory)
            @if (!$this->subcategory->color && !$this->subcategory->size)
                <div class="mb-4">
                    <x-jet-label value="Cantidad" />
                    <x-jet-input type="number" wire:model="product.quantity" class="w-full" />
                    <x-jet-input-error for="product.quantity" />
                </div>
            @endif
        @endif

        <div class="flex mt-4 justify-end items-center">

            <x-jet-action-message class="mr-3" on="saved">
                Actualizado
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" class="" wire:click="save">
                Actualizar Producto
            </x-jet-button>
        </div>
    </div>

    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers:{
                    'X-CSRF-TOKEN' : "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete:function (file){
                    this.removeFile(file);
                },
                queuecomplete:function (){
                    Livewire.emit('refreshPost')
                },
                accept: function(file, done) {
                    if (file.name == "justinbieber.jpg") {
                        done("Naha, you don't.");
                    } else {
                        done();
                    }
                }
            };
        </script>
    @endpush

</div>
