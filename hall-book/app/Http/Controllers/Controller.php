<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Admin;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use League\Csv\Writer;
use League\Csv\CannotInsertRecord;


class Controller extends BaseController
{

    public function index()
    {

        // return view('admin.dashboard');
        $adminData = Auth::guard('admin')->user();
        // $bookings = Booking::all();
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        // return view('admin.dashboard', compact('bookings','adminData'));
        $pendingCount = $bookings->where('status', 'pending')->count();
        $acceptedCount = $bookings->where('status', 'accepted')->count();
        $rejectedCount = $bookings->where('status', 'rejected')->count();

        // Get current date
    $currentDate = Carbon::now();

    // Initialize array to hold monthly accepted counts
  // Initialize array to hold monthly counts
  $startOfYear = $currentDate->copy()->startOfYear();
  $todayMessages = [];

  // Initialize monthlyCounts array with all 12 months of the current year
  $monthlyCounts = [];
  for ($i = 0; $i < 12; $i++) {
      $monthStartDate = $startOfYear->copy()->addMonths($i)->startOfMonth();
      $monthlyCounts[$monthStartDate->format('M Y')] = 0;
  }

  for ($i = 0; $i < 12; $i++) {
    $monthStartDate = $startOfYear->copy()->addMonths($i)->startOfMonth();
    $monthlyCounts[$monthStartDate->format('M Y')] = 0;
}

// Loop through each month of the current year
for ($i = 0; $i < 12; $i++) {
    $monthStartDate = $startOfYear->copy()->addMonths($i)->startOfMonth();
    $monthEndDate = $startOfYear->copy()->addMonths($i)->endOfMonth();

    // Retrieve bookings with 'accepted' status
    $bookings1 = Booking::where('status', 'accepted')->get();

    // Count bookings based on booking_dates
    foreach ($bookings1 as $booking) {
        $bookingDates = is_string($booking->booking_dates) ? json_decode($booking->booking_dates, true) : $booking->booking_dates;

        foreach ($bookingDates as $bookingDateObj) {
            $bookingDate = Carbon::parse($bookingDateObj['date']);

            if ($bookingDate->isToday()) {
                $todayMessages[] = [
                    'name' => $booking->name,
                    'phone' => $booking->phone,
                    'email' => $booking->email,
                    'booking_date' => $bookingDateObj['date'],
                    'start_time' => $bookingDateObj['start_time'],
                    'end_time' => $bookingDateObj['end_time'],
                ];
            }

            // Check if the booking date falls within the current month
            if ($bookingDate->between($monthStartDate, $monthEndDate)) {
                $monthlyCounts[$monthStartDate->format('M Y')]++;
            }
        }
    }
}

$months = array_keys($monthlyCounts);
$bookingCounts = array_values($monthlyCounts);
    $todayAndYesterdayCount = 0;
     // Calculate today and yesterday's count
     $todayAndYesterdayCount = Booking::whereDate('created_at', Carbon::today())
     ->orWhereDate('created_at', Carbon::yesterday())
     ->count();


     // Fetch messages created today

    $todayMessagesCount = count($todayMessages);


    // Calculate the total bookings
    $totalCount = $acceptedCount + $rejectedCount + $pendingCount;

    // Calculate the percentage of accepted bookings
    $acceptedPercentage = $totalCount > 0 ? ($acceptedCount / $totalCount) * 100 : 0;


    $currentHour = Carbon::now()->hour;

    if ($currentHour < 12) {
        $greeting = "Good Morning";
    } elseif ($currentHour < 18) {
        $greeting = "Good Afternoon";
    } else {
        $greeting = "Good Evening";
    }




         if($adminData->role==='admin'){
            return view('admin.dashboard', compact('greeting','adminData', 'bookings', 'pendingCount', 'acceptedCount', 'rejectedCount','months', 'bookingCounts','todayAndYesterdayCount','todayMessages','todayMessagesCount','acceptedPercentage'));

         }
         else{
            return view('users.admin_user', compact('greeting','adminData', 'bookings', 'pendingCount', 'acceptedCount', 'rejectedCount','months', 'bookingCounts','todayAndYesterdayCount','todayMessages','todayMessagesCount','acceptedPercentage'));


        }


    }
    // public function index_user()
    // {

    //     // return view('admin.dashboard');
    //     $adminData = Auth::guard('admin')->user();
    //     $bookings = Booking::all();
    //     // return view('admin.dashboard', compact('bookings','adminData'));
    //     $pendingCount = $bookings->where('status', 'pending')->count();
    //     $acceptedCount = $bookings->where('status', 'accepted')->count();
    //     $rejectedCount = $bookings->where('status', 'rejected')->count();

    //     return view('admin.admin_user', compact('adminData', 'bookings', 'pendingCount', 'acceptedCount', 'rejectedCount'));

    // }
    public function showBooking($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking', compact('booking'));
    }
    public function showviewBooking($id)
    {
        $booking = Booking::findOrFail($id);
        return view('users.bookingview', compact('booking'));
    }
    public function showResetForm()
    {
        return view('admin.resetpassword');
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $admin = Admin::where('email', $request->email)->first();
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('admin.login')->with('status', 'Password reset successfully.');
    }

    public function indexC()
    {

        // return view('admin.dashboard');
        $adminData = Auth::guard('admin')->user();
        // $bookings = Booking::all();
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        // return view('admin.dashboard', compact('bookings','adminData'));
        $pendingCount = $bookings->where('status', 'pending')->count();
        $acceptedCount = $bookings->where('status', 'accepted')->count();
        $rejectedCount = $bookings->where('status', 'rejected')->count();

        // Get current date
    $currentDate = Carbon::now();

    // Initialize array to hold monthly accepted counts
  // Initialize array to hold monthly counts
  $startOfYear = $currentDate->copy()->startOfYear();
  $todayMessages = [];

  // Initialize monthlyCounts array with all 12 months of the current year
  $monthlyCounts = [];
  for ($i = 0; $i < 12; $i++) {
      $monthStartDate = $startOfYear->copy()->addMonths($i)->startOfMonth();
      $monthlyCounts[$monthStartDate->format('M Y')] = 0;
  }

  for ($i = 0; $i < 12; $i++) {
    $monthStartDate = $startOfYear->copy()->addMonths($i)->startOfMonth();
    $monthlyCounts[$monthStartDate->format('M Y')] = 0;
}

// Loop through each month of the current year
for ($i = 0; $i < 12; $i++) {
    $monthStartDate = $startOfYear->copy()->addMonths($i)->startOfMonth();
    $monthEndDate = $startOfYear->copy()->addMonths($i)->endOfMonth();

    // Retrieve bookings with 'accepted' status
    $bookings1 = Booking::where('status', 'accepted')->get();

    // Count bookings based on booking_dates
    foreach ($bookings1 as $booking) {
        $bookingDates = is_string($booking->booking_dates) ? json_decode($booking->booking_dates, true) : $booking->booking_dates;

        foreach ($bookingDates as $bookingDateObj) {
            $bookingDate = Carbon::parse($bookingDateObj['date']);

            if ($bookingDate->isToday()) {
                $todayMessages[] = [
                    'name' => $booking->name,
                    'phone' => $booking->phone,
                    'email' => $booking->email,
                    'booking_date' => $bookingDateObj['date'],
                    'start_time' => $bookingDateObj['start_time'],
                    'end_time' => $bookingDateObj['end_time'],
                ];
            }

            // Check if the booking date falls within the current month
            if ($bookingDate->between($monthStartDate, $monthEndDate)) {
                $monthlyCounts[$monthStartDate->format('M Y')]++;
            }
        }
    }
}

$months = array_keys($monthlyCounts);
$bookingCounts = array_values($monthlyCounts);
    $todayAndYesterdayCount = 0;
     // Calculate today and yesterday's count
     $todayAndYesterdayCount = Booking::whereDate('created_at', Carbon::today())
     ->orWhereDate('created_at', Carbon::yesterday())
     ->count();


     // Fetch messages created today

    $todayMessagesCount = count($todayMessages);


    // Calculate the total bookings
    $totalCount = $acceptedCount + $rejectedCount + $pendingCount;

    // Calculate the percentage of accepted bookings
    $acceptedPercentage = $totalCount > 0 ? ($acceptedCount / $totalCount) * 100 : 0;




    $categories = ['academic', 'student', 'administrative', 'external', 'non-academic'];
    $acceptedCountsCategory = [];

    foreach ($categories as $category) {
        $acceptedCountsCategory[] = Booking::where('status', 'accepted')->where('category', $category)->count();
    }





            return view('admin.analytics', compact('adminData', 'bookings', 'pendingCount', 'acceptedCount', 'rejectedCount','months', 'bookingCounts','todayAndYesterdayCount','todayMessages','todayMessagesCount','acceptedPercentage','acceptedCountsCategory','categories'));




    }
    public function seeAccounts(){
        $adminData = Auth::guard('admin')->user();
        return view('admin.accounts',compact('adminData'));
    }

    public function generateAnalyticsReport()
    {
        $analyticsData = Booking::select('category', DB::raw('count(*) as total'))
                                ->where('status', 'accepted')
                                ->groupBy('category')
                                ->get();

        $pdf = pdf::loadView('report.analytics', compact('analyticsData'));

        return $pdf->download('analytics_report.pdf');
    }

    public function generateFullReport()
    {

        $fullReportData = Booking::select('id', 'name', 'email', 'booking_dates', 'created_at', 'status', 'category', 'event_type')->get();

        $pdf = PDF::loadView('report.full', compact('fullReportData'));

        return $pdf->download('full_report.pdf');

    }

}