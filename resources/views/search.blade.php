<x-app-layout>
    <div class="container py-8">
        <ul>
            @forelse ($products as $product)
                <li>
                    <x-products-list :product="$product"/>
                </li>
                @empty
                <li class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <p class="text-lg text-gray-700">Ningun producto coincide con los parametros</p>
                    </div>
                </li>
            @endforelse
        </ul>
        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>
