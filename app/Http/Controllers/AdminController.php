<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        try {
            $today = Carbon::today();
            $startDate = $request->has('startDate') ? Carbon::parse($request->startDate) : $today;
            $endDate = $request->has('endDate') ? Carbon::parse($request->endDate) : $startDate->copy()->addDays(6);

            $this->validateDate($request, ['startDate', 'endDate']);

            $bookingList = DB::table('booking')
                ->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()])
                ->get();

            $formattedBookingList = $this->formatBookingList($bookingList, $today);

            return view('admin.index', [
                'bookingList' => $formattedBookingList,
                'startDate' => $startDate->format('d-m-Y'),
                'endDate' => $endDate->format('d-m-Y')
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function tambah_booking()
    {
        return view('admin.tambah_booking');
    }

    public function add_booking(Request $request)
    {
        try {
            $this->validateBookingRequest($request);

            $request->merge(['tanggal' => Carbon::parse($request->tanggal)->format('Y-m-d')]);

            $id = DB::table('booking')->insertGetId($request->only(['name', 'tanggal', 'jam_mulai', 'jam_selesai']));

            return response()->json([
                'status' => 200,
                'message' => 'Booking added successfully',
                'data' => ['id' => $id]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update_booking($id, Request $request)
    {
        $response = [
            'status' => 500,
            'message' => 'An unknown error occurred'
        ];
        
        try {
            $this->validateBookingRequest($request, 'sometimes');
    
            $updateValue = $request->only(['name', 'tanggal', 'jam_mulai', 'jam_selesai']);
            if (empty($updateValue)) {
                $response = [
                    'status' => 400,
                    'message' => 'No data to update'
                ];
            } else {
                $updateValue['tanggal'] = Carbon::parse($request->tanggal)->format('Y-m-d');
                $updated = DB::table('booking')->where('id', $id)->update($updateValue);
    
                if ($updated) {
                    $response = [
                        'status' => 200,
                        'message' => 'Booking updated successfully'
                    ];
                } else {
                    $response['message'] = 'Failed to update booking';
                }
            }
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
        }
    
        return response()->json($response, $response['status']);
    }
    

    public function delete_booking($id)
    {
        try {
            $deleted = DB::table('booking')->where('id', $id)->delete();
            if (!$deleted) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Failed to delete booking'
                ], 500);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Booking deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function validateDate(Request $request, array $fields)
    {
        foreach ($fields as $field) {
            if ($request->has($field)) {
                $request->validate([$field => 'date']);
            }
        }
    }

    private function validateBookingRequest(Request $request, $rule = 'required')
    {
        $request->validate([
            'name' => "$rule",
            'tanggal' => "$rule|date",
            'jam_mulai' => "$rule|date_format:H:i:s",
            'jam_selesai' => "$rule|date_format:H:i:s"
        ]);
    }

    private function formatBookingList($bookingList, $today)
    {
        return $bookingList->map(function ($booking) use ($today) {
            return [
                'start' => Carbon::parse($today->toDateString() . ' ' . $booking->jam_mulai)->format('Y-m-d\TH:i:s'),
                'end' => Carbon::parse($today->toDateString() . ' ' . $booking->jam_selesai)->format('Y-m-d\TH:i:s'),
                'id' => $booking->id,
                'text' => $booking->name,
                'resource' => Carbon::parse($booking->tanggal)->format('d-m-Y'),
            ];
        });
    }
}
