<?php

namespace App\Controllers;

use App\Models\BookingModel;
use CodeIgniter\Controller;

class BookingController extends Controller
{
    public function bookHotel()
    {
        // Assuming you have a user authentication system in place
    $request = service('request');
    $hotelId = $request->getPost('hotel_id');
    $userId = user_id(); // Assuming you have a user authentication system in place

    if ($hotelId && $userId) {
        $bookingModel = new BookingModel();
        $bookingModel->insert([
            'hotel_id' => $hotelId,
            'user_id' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Redirect to a success page or show a success message
       return redirect()->to('user/index')->with('status', 'Hotel Berhasil Dibooking');;
    }else {
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }

   public function viewBookings()
    {
        $bookingModel = new BookingModel();
        $bookings = $bookingModel->findAll();

        $data = [
            'bookings' => $bookings,
        ];

        echo view('user/index', $data); // Replace 'booking_list' with the name of your view for displaying the list of bookings
    }
}
