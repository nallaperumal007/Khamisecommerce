@extends('layout.app')

@section('content')
<div class="container text-center mt-5">
  <h2>🎉 Thank you for your order!</h2>
  <p>Your order has been placed successfully.</p>
  <a href="/" class="btn btn-primary mt-3">Continue Shopping</a>
</div>

<script>

document.addEventListener('DOMContentLoaded', () => {
    localStorage.removeItem('cart');
    window.cart = []; // clear in-memory cart
    console.log('🧹 Cart cleared after successful order.');
});
</script>
@endsection
