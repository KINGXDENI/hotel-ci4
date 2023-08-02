<?php

namespace App\Controllers;

use App\Models\HotelModel;
use App\Models\BookingModel; // Add this line to include the BookingModel

class User extends BaseController
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (!logged_in()) {
            // Jika pengguna belum login, redirect ke halaman login atau halaman lain yang sesuai
            return redirect()->to('login');
        }

        // Cek apakah pengguna memiliki role 'user'
        $isUser = service('authorization')->inGroup('user', user_id());

        if (!$isUser) {
            // Jika tidak memiliki role 'user', redirect ke halaman admin/listhotel atau halaman lain yang sesuai
            return redirect()->to('admin/listhotel');
        }

        $data['title'] = 'User List';
        $hotelsModel = new HotelModel();
        $bookingsModel = new BookingModel();

        // Fetch the hotels and bookings data
        $data['hotels'] = $hotelsModel->findAll();
        $data['bookings'] = $bookingsModel->findAll();

        return view('user/index', $data);
    }
    public function deleteBooking($bookingId)
{
    // Check if the user is logged in
    if (!logged_in()) {
        return redirect()->to('login');
    }

    // Check if the booking belongs to the logged-in user (optional)
    // You may implement additional checks here if required

    // Load the booking model
    $bookingModel = new BookingModel();

    // Delete the booking from the database
    $deleted = $bookingModel->delete($bookingId);

    if ($deleted) {
        // Success
        session()->setFlashdata('status', 'Booking deleted successfully.');
    } else {
        // Error
        session()->setFlashdata('error', 'Failed to delete booking.');
    }

    // Redirect back to the index page or any other page as needed
    return redirect()->to('user/index');
}
}
