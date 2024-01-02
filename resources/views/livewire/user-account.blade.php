<div>
    @if (!session('rand'))
    @php
        $this->redirect('/login', navigate: true);
    @endphp
    @else
    <div class="user-account-container">
        <div class="user-account-left">
            <div class="user-account-left-box">
                <p id="yourordersbtn">Your Orders</p>
            </div>
        </div>
        <div class="user-account-right">
            <div class="yourorders">
                <p class="ordermessege"  wire:poll.5s="updatemsg">{{ $msg }}</p>
                <table wire:poll.keep-alive>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Delete Order</th>
                        <th>Cancel Order</th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ (int)$order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ (int)$order->subtotal }}</td>
                        <td>
                            @if($order->status == -1)
                                <p id="cancelled">Cancelled</p>
                            @elseif($order->status == 1)
                                <p id="approved">Approved</p>
                            @elseif($order->status == 2)
                                <p id="completed">Completed</p>
                            @else
                                <p id="pending">Pending</p>
                            @endif
                        </td>
                        <td>
                            <button class="deleteorderbtn" wire:click="deleteorder({{ $order->id }})" wire:confirm="You are going to delete this order.">Delete Order</button>
                        </td>
                        <td>
                            @if($order->status == 2)
                                <p>No Need To Cancel</p>
                            @elseif($order->status == -1)
                                Can't Cancel
                            @else
                            <button wire:click="cancelorder({{ $order->id }})" class="cancelorderbtn" wire:confirm="You are going to cancel this order.">Cancel Order</button>
                           </td>
                            @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
