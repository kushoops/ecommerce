<div class="mt-14">
    @if (!empty($orders[0]))
    <section class="bg-white py-4 antialiased dark:bg-gray-900">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mx-auto max-w-5xl">
        <div class="gap-4 sm:flex sm:items-center sm:justify-between">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Order History</h2>
        </div>

        <div class="mt-6 flow-root sm:mt-8">
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($orders as $order)
            <div class="grid md:grid-cols-12 gap-4 md:gap-6 pb-4 md:py-6">
                <dl class="md:col-span-3 order-3 md:order-1">
                    <a href="{{ env('APP_URL').'/order-summary/'.$order['id'] }}" class="hover:underline">{{ $order['updated_at'] }}</a>
                </dl>
            </div>
            @endforeach
            </div>
        </div>
        </div>
    </div>
    </section>
    @endif
</div>
