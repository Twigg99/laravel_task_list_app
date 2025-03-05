<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class testController extends Controller
{
    //

    public function fetchActiveUsers()
    {
        $activeUsers = User::where('status', 'active')->get();

        if ($activeUsers->isEmpty()) {
            return response()->json(['message' => 'Not Found!'], 404);
        } else {
            return response()->json([
                'message' => 'Active users found!',
                'data' => $activeUsers
            ], 200);
        }
    }

    //You have a posts table with id, title, content, user_id, created_at.

    //Write a query to get the latest 10 posts, ordered by created_at in descending order.

    public function getLatestPosts(Request $request)
    {

        $offset = $request->query('offset', 0);
        $limit = $request->query('limit', 10);

        $latestPosts = Post::orderByDesc('created_at')
            ->offset($offset)
            ->limit($limit)
            ->get();

        if ($latestPosts->isEmpty()) {
            return response()->json([
                'message' => 'not found'
            ], 400);
        } else {
            return response()->json([
                'message' => 'latest posts found',
                'data' => $latestPosts,
            ], 200);
        }
    }

    // Challenge 3: Count Orders Per User
    //You have an orders table with id, user_id, total_amount, and created_at.

    //Write a query to get the number of orders placed by each user.

    public function countingOrdersPerUser($userId)
    {

        $count = Order::where('user_id', $userId)->count();

        if ($count === 0) { // Since count() returns an integer, we check for zero
            return response()->json([
                'message' => 'User not found or has no orders'
            ], 404);
        }

        return response()->json([
            'message' => 'User orders found',
            'order_count' => $count
        ], 200);
    }

    // Challenge 4: Get Users Without Orders
    //Using the users and orders tables, write a query to fetch all users who have never placed an order.

    public function getUsersWithoutOrders(Request $request)
    {

        // users table: id, name, email, status (active or inactive), and created_at.
        //orders table: id, user_id, total_amount, and created_at.

        $findUsers = DB::table('users')
            ->leftjoin('orders', 'users.id', '=', 'user_id')
            ->whereNull('orders.user_id')
            ->where('user.status', 'active')
            ->get();

        if ($findUsers->isEmpty()) {
            return response()->json([
                'message' => 'no users found'
            ], 404);
        } else {
            return response()->json([
                'message' => 'users without orders found',
                'data' => $findUsers
            ], 200);
        }
    }

    public function getTotalSalesThisMonth() {
        $totalSales = Order::whereMonth('created_at', now()->month) // Filter current month
            ->whereYear('created_at', now()->year) // Filter current year to avoid last year's data
            ->sum('total_amount'); // Sum total_amount column
    
        return response()->json([
            'message' => 'Total sales for this month retrieved',
            'total_sales' => $totalSales
        ], 200);
    }
}
