<?php

namespace App\Http\Controllers;

use App\Helpers\APIResponse;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\MenuItem;
use App\Models\Order;

class OrderController extends Controller
{

    public function store(StoreOrderRequest $request)
    {
        try {
            $input = $request->validated();
            $order = Order::create($input);
            
            foreach ($input['items'] as $item) {
                $menu_item = MenuItem::find($item['menu_item_id']);
                $item['price'] = $menu_item->price ?? 0;
                $item['total'] = $item['price'] * $item['quantity'];
                $order->order_items()->create($item);
            }
            $order->update([
                'total' => $order->order_items->sum('total') + $order->fees
            ]);
        
            return (new APIResponse(201))
                        ->set_message('Order created successfully')
                        ->set_data(new OrderResource($order))
                        ->build();
        } catch (\Throwable $th) {

            return (new APIResponse(500))
                        ->set_message('something went wrong')
                        ->build();
        }
    }
}
