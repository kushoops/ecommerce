<div class="mt-14">
    @if (!empty($order[0]))
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <form wire:submit="processToPayment" action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <ol class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">
            <li class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Cart
                </span>
            </li>

            <li class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Checkout
                </span>
            </li>

            <li class="flex shrink-0 items-center">
                <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Order summary
            </li>
            </ol>

            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
            <div class="min-w-0 flex-1 space-y-8">
                <div class="space-y-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>

                <div>
                    <div class="mb-2">
                    <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Address </label>
                    <input wire:model="address" type="text" id="your_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" required />
                    </div>

                    <div class="mb-2">
                    <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Postal code </label>
                    <input wire:model="postalCode" type="number" id="your_email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" required />
                    </div>
                    
                    <div class="mb-2">
                    <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Telephone </label>
                    <input wire:model="telephone" type="number" id="your_email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" required />
                    </div>

                </div>
                </div>

                <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                            <input wire:model="payment" id="credit-card" aria-describedby="credit-card-text" type="radio" name="payment-method" value="credit card" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                            </div>

                            <div class="ms-4 text-sm">
                            <label for="credit-card" class="font-medium leading-none text-gray-900 dark:text-white"> Credit Card </label>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                            <input wire:model="payment" id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio" name="payment-method" value="cash on delivery" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                            </div>

                            <div class="ms-4 text-sm">
                            <label for="pay-on-delivery" class="font-medium leading-none text-gray-900 dark:text-white"> Cash on delivery</label>
                            </div>
                    </div>
                    </div>

                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                            <input wire:model="payment" id="paypal-2" aria-describedby="paypal-text" type="radio" name="payment-method" value="paypal" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                            </div>

                            <div class="ms-4 text-sm">
                            <label for="paypal-2" class="font-medium leading-none text-gray-900 dark:text-white">Paypal</label>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>

            <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                <div class="flow-root">
                <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                    @foreach ($orderItems as $orderItem)
                    <dl class="flex items-center justify-between gap-4 py-3">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $orderItem['quantity'] }} x Rp{{ $orderItem['price'] }}</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">Rp{{ $orderItem['quantity']*$orderItem['price'] }}</dd>
                    </dl>
                    @endforeach

                    <dl class="flex items-center justify-between gap-4 py-3">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-base font-bold text-gray-900 dark:text-white">Rp{{ $order[0]['total'] }}</dd>
                    </dl>
                </div>
                </div>

                <div class="space-y-3">
                <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Proceed to Payment</button>
                </div>
            </div>
            </div>
            </div>
        </form>
    </section>
    @endif
</div>
