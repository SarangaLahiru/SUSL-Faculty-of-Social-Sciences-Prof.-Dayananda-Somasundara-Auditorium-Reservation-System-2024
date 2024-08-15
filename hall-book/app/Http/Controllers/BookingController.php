<?php
namespace App\Http\Controllers;
use App\Mail\BookingAccepted;
use App\Mail\BookingRejected;
use App\Mail\ApplicantSubmit;
use App\Mail\AdminRequest;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    // public function showCalendar()
    // {
    //     $bookings = Booking::all()->map(function ($booking) {
    //         return [
    //             'title' => '-'.$booking->end_time,
    //             'start' => $booking->booking_date . 'T' . $booking->start_time,
    //             'end' => $booking->booking_date . 'T' . $booking->end_time,
    //             'color' => 'red'
    //         ];
    //     });

    //     return view('check_availability', ['bookings' => $bookings]);
    // }
    // public function showCalendar()
    // {
    //     // Retrieve booking data from the database
    //     $bookings = Booking::all();

    //     // Format the booking data for FullCalendar
    //     $events = [];
    //     foreach ($bookings as $booking) {
    //         foreach ($booking->booking_dates as $bookingDate) {
    //             // $events[] = [
    //             //     // 'title' => $booking->event_type . ' - ' . $booking->event_description,
    //             //     'title'=>  $bookingDate['end_time'],
    //             //     'start' => $bookingDate['date'] . 'T' . $bookingDate['start_time'],
    //             //     'end' => $bookingDate['date'] . 'T' . $bookingDate['end_time'],
    //             //     'color' => 'green', // Customize the color if needed
    //             // ];

    //             $startTime = date('g:i A', strtotime($bookingDate['start_time']));
    //             $endTime = date('g:i A', strtotime($bookingDate['end_time']));
    //             $events[] = [
    //                 'title' =>'- '.$endTime .' - '.$booking->event_type,
    //                 'start' => $bookingDate['date'] . 'T' . $bookingDate['start_time'],
    //                 'end' => $bookingDate['date'] . 'T' . $bookingDate['end_time'],
    //                 'color' => 'green', // Customize the color if needed
    //             ];
    //         }
    //     }

    //     // Pass the formatted data to the view
    //     return view('check_availability', compact('events'));
    // }


    public function showCalendar()
{
    // Retrieve booking data from the database
    // $bookings = Booking::all();
    $bookings = Booking::whereIn('status', ['accepted', 'pending'])->orderBy('created_at', 'desc')->get();



    // Format the booking data for FullCalendar
    $events = [];
    foreach ($bookings as $booking) {
        foreach ($booking->booking_dates as $bookingDate) {
            $startTime = date('g:i A', strtotime($bookingDate['start_time']));
            $endTime = date('g:i A', strtotime($bookingDate['end_time']));

            // Determine color based on the status
            $color = ($booking->status == 'accepted') ? 'green' : '#EEE600';

            $events[] = [
                'status' =>  $booking->status,
                'title1' =>  $booking->event_type,
                'title' => '- ' . $endTime . ' - ' . $booking->event_type,
                'start' => $bookingDate['date'] . 'T' . $bookingDate['start_time'],
                'end' => $bookingDate['date'] . 'T' . $bookingDate['end_time'],
                'color' => $color, // Customize the color based on status
            ];
        }
    }

    // Assuming you are returning a view with the events
    return view('check_availability', ['events' => $events]);
}
public function showCalendar2(){
    // Retrieve booking data from the database
    // $bookings = Booking::all();
    // $bookings = Booking::whereIn('status', ['accepted', 'pending'])->get();
    $bookings = Booking::whereIn('status', ['accepted', 'pending'])->orderBy('created_at', 'desc')->get();


    // Format the booking data for FullCalendar
    $events = [];
    foreach ($bookings as $booking) {
        foreach ($booking->booking_dates as $bookingDate) {
            $startTime = date('g:i A', strtotime($bookingDate['start_time']));
            $endTime = date('g:i A', strtotime($bookingDate['end_time']));

            // Determine color based on the status
            $color = ($booking->status == 'accepted') ? 'green' : '#EEE600';

            $events[] = [
                'title' =>  $booking->event_type,
                'start' => $bookingDate['date'] . 'T' . $bookingDate['start_time'],
                'end' => $bookingDate['date'] . 'T' . $bookingDate['end_time'],
                'color' => $color, // Customize the color based on status
            ];
        }
    }

    // Assuming you are returning a view with the events
    return view('calendar1', ['events' => $events]);
}









    public function create(Request $request)
    {
        $availabilityData = Session::get('availabilityData',[]);
        // $availabilityData = session('availabilityData', []);
        return view('createBooking', compact('availabilityData'));
    }

    // public function store(Request $request)
    // {
    //     // Handle file uploads
    //     if ($request->has('documents')) {
    //         $uploadedDocuments = [];
    //         foreach ($request->file('documents') as $file) {
    //             $path = $file->store('documents');
    //             $uploadedDocuments[] = $path;
    //         }
    //         $request->merge(['documents' => json_encode($uploadedDocuments)]);
    //     }

    //     // Encode booking_dates and facilities as JSON
    //     $bookingDates = $request->input('booking_dates');
    //     $request->merge(['booking_dates' => json_encode($bookingDates)]);

    //     if ($request->has('facilities')) {
    //         $facilities = $request->input('facilities');
    //         $request->merge(['facilities' => json_encode($facilities)]);
    //     }

    //     // Create a new Booking instance with the request data
    //     $booking = new Booking($request->all());

    //     // Save the booking to the database
    //     $booking->save();

    //     // Return a success response
    //     return redirect()->route('successPage')->with('success', 'Booking created successfully.');
    // }
    public function store(Request $request)
    {
        // Decode the JSON data for booking dates
        $bookingDates = [];
        foreach ($request->input('booking_date') as $index => $date) {
            $bookingDates[] = [
                'date' => $date,
                'start_time' => $request->input('start_time')[$index],
                'end_time' => $request->input('end_time')[$index],
            ];
        }
        $document = null;
        if ($request->hasFile('fileInput')) {
            $file = $request->file('fileInput');

            // Define the directory where you want to store the files
            $destinationPath = 'public/documents';

            // Store the file and get its path
            $path = $file->store($destinationPath);

            // Save the relative path to the database (remove 'public/' part)
            $document = str_replace('public/','', $path);
        }
        $division=null;
        if ($request->input('division')) {
            $division=$request->input('division');


        }
        $department=null;
        if ($request->input('department')) {
            $department=$request->input('department');


        }

        // Prepare facilities data
        $facilities = $request->input('facilities', []);

        // Prepare additional fields based on category
        $category = $request->input('category');

        $additionalFields = [];
        switch ($category) {
            case 'student':
                $additionalFields = [
                    'userID' => $request->input('userID'), // Add this line
                    'student_no' => $request->input('studentNo'),
                    'faculty' => $request->input('faculty'),
                    'category' => $request->input('category'),
                    'eventType' => $request->input('eventType'),
                    'society' => $request->input('society'),
                    'event_type'=>$request->input('eventType'),
                    'event_description'=>$request->input('eventDescription'),
                    'department'=>$request->input('department'),
                    'documents'=>$document,
                ];
                break;
            case 'external':
                $additionalFields = [
                    'userID'=>$request->input('userID'),
                    'nic_no' => $request->input('idNo'),
                    'institution' => $request->input('institution'),
                    'post' => $request->input('post'),
                    'category' => $request->input('category'),
                    'event_type'=>$request->input('eventType'),
                    'event_description'=>$request->input('eventDescription'),
                    'address'=>$request->input('address'),
                    'documents'=>$document,
                ];
                break;
            case 'academic':
                $additionalFields = [
                    'userID'=>$request->input('userID'),
                    'nic_no' => $request->input('idNo'),
                    // 'institution' => $request->input('institution'),
                    'post' => $request->input('post'),
                    'category' => $request->input('category'),
                    'society' => $request->input('society'),
                    'event_type'=>$request->input('eventType'),
                    'event_description'=>$request->input('eventDescription'),
                    'faculty' => $request->input('faculty'),
                    'department'=>$department,
                    'documents'=>$document,
                    'division'=>$division,
                ];
                break;
            case 'non-academic':
                $additionalFields = [
                    'userID'=>$request->input('userID'),
                    'nic_no' => $request->input('idNo'),
                    // 'institution' => $request->input('institution'),
                    'post' => $request->input('post'),
                    'category' => $request->input('category'),
                    'society' => $request->input('society'),
                    'event_type'=>$request->input('eventType'),
                    'event_description'=>$request->input('eventDescription'),
                    'faculty' => $request->input('faculty'),
                    'division'=>$request->input('division'),
                    'documents'=>$document,
                ];
                break;
            case 'administrative':
                $additionalFields = [
                    'userID'=>$request->input('userID'),
                    'nic_no' => $request->input('idNo'),
                    // 'institution' => $request->input('institution'),
                    'post' => $request->input('post'),
                    'category' => $request->input('category'),
                    'society' => $request->input('society'),
                    'event_type'=>$request->input('eventType'),
                    'event_description'=>$request->input('eventDescription'),
                    'faculty' => $request->input('faculty'),
                    'division'=>$request->input('division'),
                    'documents'=>$document,
                ];
                break;
            // Add more cases as needed for other categories
            default:
                // Handle default case or other categories
                break;
        }

        // Merge all data into one array
        $bookingData = array_merge(
            $request->only(['name', 'phone', 'email']),
            ['booking_dates' => $bookingDates], // Without json_encode here
            ['facilities' => $facilities],
            $additionalFields
        );

        $availabilityData = Session::get('availabilityData', []);

        $check=$this->checkMultipleDaysAvailability($availabilityData);

        // Handle file upload


        // Create a new Booking instance with the booking data

        if($check){
            $booking = new Booking($bookingData);

            // Save the booking to the database
            $booking->save();
            Mail::to($booking->email)->send(new ApplicantSubmit($booking));
            Mail::to('lahirusashika@gmail.com')->send(new AdminRequest($booking));

            // Redirect the user to a success page
            // return redirect()->route('successPage')->with('success', 'Booking created successfully.');
            return view('successpage')->with('success', 'Booking created successfully.');
        }
        else{
            return view('errorpage')->with('error', 'Booking error.');

        }
    }

    public function accept($id)
{
    $booking = Booking::find($id);
    $booking->status = 'accepted';
    $booking->save();
    Mail::to($booking->email)->send(new BookingAccepted($booking));

    return redirect()->route('admin.dashboard')->with('success', 'Booking accepted successfully.');
}

// public function reject($id)
// {
//     $booking = Booking::find($id);
//     $booking->status = 'rejected';
//     $booking->save();


//     return redirect()->route('admin.dashboard')->with('success', 'Booking rejected successfully.');
// }
// public function reject(Request $request, $id)
//     {
//         $request->validate([
//             'reason' => 'required|string',
//         ]);

//         $booking = Booking::findOrFail($id);
//         $booking->status = 'rejected';
//         $booking->save();

//         // Send rejection email with reason
//         $reason = $request->input('reason');
//         Mail::to($booking->email)->send(new BookingRejected($booking, $reason));

//         return redirect()->route('admin.dashboard')->with('success', 'Booking rejected successfully.');
//     }

public function reject(Request $request, $id)
{
    $request->validate([
        'reason' => 'required|string',
    ]);

    $booking = Booking::findOrFail($id);

    $booking->status = 'rejected';
    $booking->save();

    // Reject and delete the booking
    $reason = $request->input('reason');
    if ($reason === 'other') {
        $reason = $request->input('other_reason');
    }
    // $other=$request->input('other_reason');
    Mail::to($booking->email)->send(new BookingRejected($booking, $reason));

    // $booking->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Booking rejected and deleted successfully.');
}



public function checkMultipleDaysAvailability($request)
{
    $availabilityData = $request;
    $unavailableSlots = [];

    foreach ($availabilityData as $data) {
        $bookingDate = $data['date'];
        $startTime = $data['start_time'];
        $endTime = $data['end_time'];

         // Check if the time slot spans two days
         if (strtotime($startTime) > strtotime($endTime)) {
            $invalidSlots[] = $data;
            continue; // Skip further checks for this slot
        }

        // Get all bookings
        // $bookings = Booking::all();
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



    if (empty($unavailableSlots)) {

        return  true;
     } else {
        return  false;

    }
}













}
