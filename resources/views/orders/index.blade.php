<x-app-layout>
    <div class="container py-12">
        <section class="grid grid-cols-5 gap-6 text-white">
            <a href="{{route('orders.index')."?status=1"}}" class="bg-red-500  rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $pendiente }}
                </p>
                <p class="uppercase text-center">Pendiente</p>
                <p class="text-2xl text-center mt-2">
                    <i class="fas fa-business-time"></i>
                </p>
            </a>

            <a href="{{route('orders.index')."?status=2"}}" class="bg-gray-500  rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $pagado }}
                </p>
                <p class="uppercase text-center">PAGADO</p>
                <p class="text-2xl text-center mt-2">
                    <i class="fas fa-credit-card"></i>
                </p>
            </a>

            <a href="{{route('orders.index')."?status=3"}}" class="bg-yellow-500  rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $enviado }}
                </p>
                <p class="uppercase text-center">ENVIADO</p>
                <p class="text-2xl text-center mt-2">
                    <i class="fas fa-truck"></i>
                </p>
            </a>

            <a href="{{route('orders.index')."?status=4"}}" class="bg-pink-500  rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $entregado }}
                </p>
                <p class="uppercase text-center">ENTREGADO</p>
                <p class="text-2xl text-center mt-2">
                    <i class="fas fa-check-circle"></i>
                </p>
            </a>

            <a href="{{route('orders.index')."?status=5"}}" class="bg-green-500  rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $anulado }}
                </p>
                <p class="uppercase text-center">ANULADO</p>
                <p class="text-2xl text-center mt-2">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>
        </section>

        <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12">
            <h1 class="text-2xl mb-4">
                Pedidos Recientes
            </h1>

            <ul>
                @foreach ($orders as $order)
                    <li class="">
                        <a href="{{route('orders.show',$order)}}" class="flex items-center py-2 px-4 hover:bg-gray-100">
                            <span class="w-12 text-center">
                                @switch($order->status)
                                    @case(1)
                                        <i class="fas fa-business-time text-red-500"></i>
                                    @break
                                    @case(2)
                                        <i class="fas fa-credit-card text-gray-500"></i>
                                    @break
                                    @case(3)
                                        <i class="fas fa-truck text-yellow-500"></i>
                                    @break
                                    @case(4)
                                        <i class="fas fa-check-circle text-pink-500"></i>
                                    @break
                                    @case(5)
                                        <i class="fas fa-times-circle text-green-500"></i>
                                    @break
                                    @default

                                @endswitch
                            </span>

                            <span>
                                Orden : {{ $order->id }}
                                <br>
                                {{ $order->created_at->format('d/m/a') }}
                            </span>

                            <div class="ml-auto">
                                <span class="font-bold">
                                    @switch($order->status)
                                        @case(1)
                                        Pendiente
                                        @break
                                        @case(2)
                                            Pagado
                                        @break
                                        @case(3)
                                            Enviado
                                        @break
                                        @case(4)
                                            Entregado
                                        @break
                                        @case(5)
                                            Anulado
                                        @break

                                    @endswitch
                                </span>

                                <br>

                                <span class="text-sm">
                                    {{$order->total}} COP
                                </span>
                            </div>

                            <span>
                                <i class="fas fa-angle-right ml-6"></i>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</x-app-layout>
