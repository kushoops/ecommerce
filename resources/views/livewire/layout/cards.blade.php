<div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($products as $product)
        <livewire:components.card :productId="$product['id']" :productPhoto="$product['photo']" :productName="$product['name']" :productPrice="$product['price']"/>
    @endforeach
</div>
