<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function createTransaction(Request $request)
    {

        try {
            $client = new \GuzzleHttp\Client([
                'verify' => false  // Disable SSL verification
            ]);

            $response = $client->request('POST', 'https://app.sandbox.midtrans.com/snap/v1/transactions', [
                'body' => json_encode([
                    "transaction_details" => [
                        "order_id" => "ORDER" . rand(1000, 9999),
                        "gross_amount" => (int) $request->totalPrice,
                    ],

                    "credit_card" => ["secure" => true]
                ]),
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Basic ' . env('API_MIDTRANS_KEY'),
                    'content-type' => 'application/json',
                ],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Transaction created',
                'redirect_url' => json_decode($response->getBody())->redirect_url,
                'token' => json_decode($response->getBody())->token
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
