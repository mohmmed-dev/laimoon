<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Livewire\Courses;
use App\Models\Course;
use App\Models\courseUser;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class BuyingController extends Controller
{

    public function checkout(Request $request, Course $course)
    {

        $request->user()->courses()->attach($course->id, [
            'bought' => 0,
            'price' => $course->price,
        ]);

        if ($course->free) {
            $request->user()->courses()->updateExistingPivot($course->id, [
                'bought' => 1,
                'price' => 0,
            ]);
            return redirect()->route('home')->with('success', 'Course added to your account successfully.');
        }
        $price =  ((float) $course->price);
        $line_items = [
            [
                'price_data' => [
                    'currency' => 'USD',
                    'unit_amount' => $price * 100,
                    'product_data' => [
                        'name' => $course->title,
                    ],
                ],
                'quantity' => 1,
            ],
        ];

        return $request->user()->checkout( $line_items, [
            'success_url' => route('payment.buying.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('payment.buying.cancel'),
            'metadata' => ['course_id' => $course->id],
        ]);
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');
        if ($sessionId === null) {
            return;
        }
        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
        if ($session->payment_status !== 'paid') {
            return;
        }
        $courseId = $session['metadata']['course_id'] ?? null;

        $order = Course::findOrFail($courseId);

        auth()->user()->courses()->updateExistingPivot($courseId, [
            'bought' => 1,
            'price' => $order->price,
        ]);

        return redirect()->route('course', $courseId)->with('success', __('Purchase Successful'));
    }


    public function cancel(Request $request)
    {
        return redirect()->route('home')->with('cancel', __('Purchase Failed'));
    }
}
