<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-8">
                <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                    <div class="mx-auto max-w-3xl">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Invoice</h2>
                    <span>{{ $order[0]['updated_at'] }}</span>
            
                    <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Billing & Delivery information</h4>
            
                        <dl>
                        <dt class="text-base font-medium text-gray-900 dark:text-white">Individual</dt>
                        <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">{{ $order[0]['address'] }}</dd>
                        </dl>
            
                    </div>
            
                    <div class="mt-6 sm:mt-8">
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</h4>
                        <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                        <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                            @foreach ($orderItems as $orderItem)
                            <tr>
                                <td class="whitespace-nowrap py-4">{{ $orderItem['name'] }}</td>
            
                                <td class="p-4 text-base font-normal text-gray-900 dark:text-white">x{{ $orderItem['quantity'] }}</td>
            
                                <td class="p-4 text-right text-base font-bold text-gray-900 dark:text-white">Rp{{ $orderItem['price']*$orderItem['quantity'] }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
            
                        <div class="mt-4 space-y-6">
            
                        <div>
                            <dl class="flex items-center justify-between gap-4 border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">Rp{{ $order[0]['total'] }}</dd>
                            </dl>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
            </section>
        </div>
    </body>
</html>
