<div>
    <div class="admin-order-container">
        <h1>Orders</h1>
        <table>
            <tr>
                <th>User Id</th>
                <th>User Name</th>
                <th>Total Order Amount</th>
                <th>View Order</th>
            </tr>
            @foreach ($orderitems as $orderitem)
            <tr>
                <td>{{ $orderitem->order->user->id }}</td>
                <td>{{ $orderitem->order->user->name }}</td>
                <td>{{ (int)$orderitem->order->total_amount }}</td>
                <td><a href="/adminorderitems?orderid={{ $orderitem->order->id }}" wire:navigate.hover><button class="vieworderbtn">View</button></a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
