<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private $plan;

    public function __construct()
    {
        $this->plan = env('min_subscription_type');
    }

    public function index(Request $request)
    {
        // This method can be used to display available subscription plans
        // For now, we will just return a view with the plan information
        $plans = [
        [
            'id' => env("first_subscription"),
            'name' => 'Basic Plan',
            'amount' => "ALl Courses",
            'interval' => 'Monthly',
            'price' => 15,
        ], [
            'id' => env("second_subscription"),
            'name' => 'Standard Plan',
            'amount' => "ALl Courses",
            'interval' => 'Months 3',
            'price' => 25,

        ], [
            'id' => env("third_subscription"),
            'name' => 'Premium Plan',
            'amount' => "ALl Courses",
            'interval' => 'Months 6',
            'price' => 50,
        ]
        ];
        return view('subscription.index', compact('plans'));
    }

    public function subscript(Request $request, $type)
    {
            return $request->user()
                ->newSubscription($this->plan, $type)
                ->trialDays(5)
                ->allowPromotionCodes()
                ->checkout([
                    'success_url' => route('payment.subscription.success'),
                    'cancel_url' => route('payment.subscription.index'),
                ]);
    }
    public function success(Request $request)
    {
        return redirect()->route('home')->with('success', __('You have successfully subscribed'));
    }
    public function cancel(Request $request)
    {
        return redirect()->route('home')->with('cancel', __('Subscription Failed'));
    }
}
