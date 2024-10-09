<div class="mt-14">
    @if (!empty($order[0]))
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>
        <div class="gap-4 lg:flex lg:justify-between">
            <div class="flex-1 lg:max-w-2xl xl:max-w-4xl">
                <div class="space-y-2">
                    @foreach ($orderItems as $orderItem)
                    <livewire:components.cart :productName="$orderItem['name']" :productPhoto="$orderItem['photo']" :productPrice="$orderItem['price']" :orderItemQuantity="$orderItem['quantity']" :orderItemId="$orderItem['id']" />
                    @endforeach
                </div>
            </div>
            <div class="mt-6 max-w-4xl flex-1 space-y-2 lg:mt-0 lg:w-full">
                <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>
                <div class="space-y-4">
                    <div class="space-y-2">
                    @foreach ($orderItems as $orderItem)
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $orderItem['quantity'] }} x Rp{{ $orderItem['price'] }}</dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">Rp{{ $orderItem['quantity']*$orderItem['price'] }}</dd>
                    </div>
                    @endforeach
                    <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-base font-bold text-gray-900 dark:text-white">Rp{{ $order[0]['total'] }}</dd>
                    </dl>
                </div>
                <a href="{{ env('APP_URL').'/checkout' }}" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Proceed to Checkout</a>
                </div>
                {{-- <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                <form class="space-y-4">
                    <div>
                    <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Do you have a voucher or gift card? </label>
                    <input type="text" id="voucher" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="" required />
                    </div>
                    <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Apply Code</button>
                </form>
                </div> --}}
            </div>
        </div>
    </div>
    @endif
</div>
