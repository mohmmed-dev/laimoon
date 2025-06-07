<x-app-layout>
    <!-- start Plans -->
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl font-bold mb-4 text-center">{{__("Subscription Plans")}}</h2>
        <div class=" gap-2 mt-5 flex justify-center items-center flex-wrap my-2">
            @foreach ($plans as $plan)
                <div class="card w-96 bg-base-100 shadow-sm">
                    <div class="card-body">
                    <div class="flex justify-between">
                        <h2 class="text-3xl font-bold">{{__($plan['name'])}}</h2>
                    </div>
                    <span class="text-xl">{{$plan['price'] . '$/' . __($plan['interval'])}}</span>
                    <ul class="mt-6 flex flex-col gap-2 text-xs">
                        <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 me-2 inline-block text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        <span>{{__($plan['amount'])}}</span>
                        </li>
                    </ul>
                    <div class="mt-6">
                        <a href="{{route('payment.subscription.checkout', $plan['id'])}}" class="btn btn-primary btn-block">{{__("Subscribe")}}</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- end Plans -->
 </x-app-layout>
