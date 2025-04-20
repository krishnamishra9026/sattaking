<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->all();
        $event = $payload['event'] ?? null;

        Log::info('Razorpay Webhook:', $payload);

        if (!$event) return response()->json(['message' => 'Invalid event'], 400);

        switch ($event) {
            case 'payment.captured':
                $subscriptionId = $payload['payload']['payment']['entity']['subscription_id'] ?? null;

                if ($subscriptionId) {
                    Subscription::where('razorpay_subscription_id', $subscriptionId)
                        ->update([
                            'status' => 'active',
                            'start_at' => now(),
                            'end_at' => now()->addMonth() // or parse from Razorpay if provided
                        ]);
                }
                break;

            case 'subscription.completed':
                $subscriptionId = $payload['payload']['subscription']['entity']['id'];
                Subscription::where('razorpay_subscription_id', $subscriptionId)
                    ->update(['status' => 'completed']);
                break;

            case 'subscription.cancelled':
                $subscriptionId = $payload['payload']['subscription']['entity']['id'];
                Subscription::where('razorpay_subscription_id', $subscriptionId)
                    ->update(['status' => 'cancelled']);
                break;

            case 'subscription.activated':
                $subscriptionId = $payload['payload']['subscription']['entity']['id'];
                Subscription::where('razorpay_subscription_id', $subscriptionId)
                    ->update(['status' => 'active']);
                break;
        }

        return response()->json(['status' => 'success']);
    }
}
