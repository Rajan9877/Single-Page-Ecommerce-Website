<div>
   <div class="admin-order-item-container">
        <p class="admin-order-item-msg" wire:poll.5s="updatemsg">
            {{ $msg }}
        </p>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Confirm</th>
                <th>Cancel</th>
            </tr>
            @foreach ($orderitems as $orderitem)
            <tr>
                <td>{{ $orderitem->product->name }}</td>
                <td>{{ (int)$orderitem->price }}</td>
                <td>{{ $orderitem->quantity }}</td>
                <td>{{ (int)$orderitem->subtotal }}</td>
                <td> @if($orderitem->status == 1)
                    <p id="approved">Approved</p>
                @elseif($orderitem->status == 2)
                    <p id="completed">Completed</p>
                @elseif($orderitem->status == -1)
                    <p id="cancelled">Cancelled</p>
                @else
                    <p id="pending">Pending</p>
                @endif</td>
                <td>
                    @if($orderitem->status == 0)
                        <button wire:click="confirmorder({{ $orderitem->id }})" class="adminorderitembtn" wire:confirm="You are going to confirm this order.">Confirm Order</button>
                    @elseif($orderitem->status == 1)
                        <button wire:click="completeorder({{ $orderitem->id }})" class="adminorderitembtn" wire:confirm="You are going to mark this order as completed.">Complete Order</button>
                    @else
                        <button class="adminorderitembtn" wire:click="deleteorder({{ $orderitem->id }})" wire:confirm="You are going to delete this order.">Delete Order</button>
                    @endif
                </td>
                <td>
                    @if($orderitem->status == -1)
                    Cancelled Already
                    @elseif($orderitem->status == 2)
                    Can't Cancel
                    @else
                        <button wire:click="cancelorder({{ $orderitem->id }})" class="adminorderitembtn" wire:confirm="You are going to cancel this order.">Cancel Order</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
   </div>
</div>
