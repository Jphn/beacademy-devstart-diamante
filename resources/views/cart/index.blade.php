@extends('template.default')

@section('title','Lista de Pedidos')

@section('content')

  <div class="container">
  @if ($orders->count() <= 0)
    <br>
    <div class="text-center">
      <h3>Você não possui nenhum item adicionado ao carrinho!</h3>
    </div>
  @else
        
    <hr>
      @foreach ($orders as $order)
        <ul class="list-group mb-3">
          <li class="list-group-item py-3">
            <div class="row g-3">
              <div class="col-4 col-md-3 col-lg-2">
                <a>
                  <img src="{{ asset($order->product->image_url) }}" width="100%">
                </a>
              </div>
              <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                  <h4>
                    <b>
                      <a href="#" class="text-decoration-none text-danger">
                        {{ $order->product->name }}
                      </a>
                    </b>
                  </h4>
                  <h4>
                    <small>
                      {{ $order->product->description }}
                    </small>
                  </h4>
              </div>
              <div class="col-6 offset-6 col-sm-6 offtset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-0 col-xl-2 align-self-center mt-3">
                
                <div class="input-group">
                  <form action="{{ route('cart.removeQuantity', $order->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-outline-dark btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="28" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </button>
                  </form>

                  <input type="text" class="form-control text-center border-dark" value="{{ $order->product_quantity }}" readonly>
                  
                  <form action="{{ route('cart.addQuantity', $order->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-outline-dark btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="28" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                      </svg>
                    </button>
                  </form>

                  <form action="{{ route('cart.destroy', $order->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger border-dark dbtn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                    </button>
                  </form>
                </div>

                <div class="text-right mt-2">
                  <small class="text-secondary">Bonus: R$ 3,40</small>
                  <p class="text-dark">Valor: R$ {{ number_format($order->product->sale_price, 2 , ",", ".") }}</p>
                </div>
              </div>
            </div>
          </li>
        @endforeach

      <li class="list-group-item py-3 ">
        <div class="text-right">
          <h4 class="text-dark mb-3">
            R$ {{  number_format($purchases, 2 , ",", ".") }}
          </h4>
          <a href="{{ route('product.store') }}" class="btn btn-outline-success btn-lg">Continuar Comprando</a>
          <button class="btn btn-danger btn-lg">Fechar Compra</button>
        </div>
      </li>
    </ul>
    </div>
  @endif

@endsection