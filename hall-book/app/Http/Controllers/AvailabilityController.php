<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
//     public function checkMultipleDaysAvailability(Request $request)
// {
//     $availabilityData = $request->input('availability_data');
//     $unavailableSlots = [];

//     foreach ($availabilityData as $data) {
//         $bookingDate = $data['date'];
//         $startTime = $data['start_time'];
//         $endTime = $data['end_time'];

//          // Check if the time slot spans two days
//          if (strtotime($startTime) > strtotime($endTime)) {
//             $invalidSlots[] = $data;
//             continue; // Skip further checks for this slot
//         }

//         // Get all bookings
//         // $bookings = Booking::all();
//         $bookings = Booking::whereIn('status', ['accepted', 'pending'])->orderBy('created_at', 'desc')->get();


//         foreach ($bookings as $booking) {
//             $bookingDates = is_string($booking->booking_dates) ? json_decode($booking->booking_dates, true) : $booking->booking_dates;

//             foreach ($bookingDates as $bookingDateObj) {
//                 if ($bookingDateObj['date'] == $bookingDate) {
//                     // Check for time conflicts
//                     if (($startTime < $bookingDateObj['end_time']) && ($endTime > $bookingDateObj['start_time'])) {
//                         $unavailableSlots[] = $data;
//                         break 2; // Break out of both loops if a conflict is found
//                     }
//                 }
//             }
//         }
//     }



//     if (!empty($invalidSlots)) {
//         return redirect()->back()->with('error2', ['message' => 'Time slots cannot span multiple days.', 'invalid_slots' => $invalidSlots]);
//     }
//     if (empty($unavailableSlots)) {

//         Session::put('availabilityData',$availabilityData);
//         return redirect()->back()->with('confirm_model', [
//             'message' => 'All requested time slots are available',
//             'availabilityData' => $availabilityData, // Pass the availability data
//         ]);


//         // return redirect()->route('createBookingForm')->with('success', 'All requested time slots are available.');

//     } else {
//         // Some of the requested time slots are unavailable
//         return redirect()->back()->with('error', ['message' => 'Your selected time slot(s) are not available.', 'unavailable_slots' => $unavailableSlots]);
//     }
// }



public function checkMultipleDaysAvailability(Request $request)
{
    $availabilityData = $request->input('availability_data');
    $unavailableSlots = [];
    $invalidSlots = [];
    $pastSlots = []; // New array to hold any past slots

    foreach ($availabilityData as $data) {
        $bookingDate = $data['date'];
        $startTime = $data['start_time'];
        $endTime = $data['end_time'];

        // Convert the booking date to a Carbon instance for comparison
        $bookingDateTime = Carbon::parse($bookingDate);

        // Check if the booking date is in the past
        if ($bookingDateTime->isPast()) {
            $pastSlots[] = $data; // Store the slot if it's in the past
            continue; // Skip further checks for this slot
        }

        // Check if the time slot spans two days
        if (strtotime($startTime) > strtotime($endTime)) {
            $invalidSlots[] = $data;
            continue; // Skip further checks for this slot
        }

        // Get all bookings
        $bookings = Booking::whereIn('status', ['accepted', 'pending'])->orderBy('created_at', 'desc')->get();

        foreach ($bookings as $booking) {
            $bookingDates = is_string($booking->booking_dates) ? json_decode($booking->booking_dates, true) : $booking->booking_dates;

            foreach ($bookingDates as $bookingDateObj) {
                if ($bookingDateObj['date'] == $bookingDate) {
                    // Check for time conflicts
                    if (($startTime < $bookingDateObj['end_time']) && ($endTime > $bookingDateObj['start_time'])) {
                        $unavailableSlots[] = $data;
                        break 2; // Break out of both loops if a conflict is found
                    }
                }
            }
        }
    }

    // Handle invalid time slots that span two days
    if (!empty($invalidSlots)) {
        return redirect()->back()->with('error2', ['message' => 'Time slots cannot span multiple days.', 'invalid_slots' => $invalidSlots]);
    }

    // Handle past time slots
    if (!empty($pastSlots)) {
        return redirect()->back()->with('error3', ['message' => 'You cannot book time slots for past dates.', 'past_slots' => $pastSlots]);
    }

    // If no unavailable or past slots, proceed with booking confirmation
    if (empty($unavailableSlots)) {
        Session::put('availabilityData', $availabilityData);
        return redirect()->back()->with('confirm_model', [
            'message' => 'All requested time slots are available',
            'availabilityData' => $availabilityData, // Pass the availability data
        ]);
    } else {
        // Some of the requested time slots are unavailable
        return redirect()->back()->with('error', ['message' => 'Your selected time slot(s) are not available.', 'unavailable_slots' => $unavailableSlots]);
    }
}









}