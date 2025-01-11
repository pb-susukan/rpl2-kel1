<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    private const DATETIME_FORMAT = 'Y-m-d\TH:i:s';

    public function index()
    {
        $today = Carbon::today();
        $endDate = $today->copy()->addDays(7);

        $formattedBookingList = Cache::remember('bookingList', 10, function () use ($today, $endDate) {
            try {
                $bookingList = DB::table('booking')
                    ->whereBetween('tanggal', [$today->toDateString(), $endDate->toDateString()])
                    ->get();

                return $bookingList->map(function ($booking) use ($today) {
                    return [
                        'start' => Carbon::parse($today->toDateString() . ' ' . $booking->jam_mulai)->format(self::DATETIME_FORMAT),
                        'real_start' => Carbon::parse($booking->tanggal . ' ' . $booking->jam_mulai)->format(self::DATETIME_FORMAT),
                        'end' => Carbon::parse($today->toDateString() . ' ' . $booking->jam_selesai)->format(self::DATETIME_FORMAT),
                        'real_end' => Carbon::parse($booking->tanggal . ' ' . $booking->jam_selesai)->format(self::DATETIME_FORMAT),
                        'id' => $booking->id,
                        'text' => $booking->name,
                        'resource' => Carbon::parse($booking->tanggal)->format('d-m-Y'),
                    ];
                });
            } catch (\Illuminate\Database\QueryException $ex) {
                return collect();
            }
        });

        return view('welcome', [
            'bookingList' => $formattedBookingList,
            'startDate' => $today->toDateString(),
            'endDate' => $endDate->toDateString()
        ]);
    }

    public function booking()
    {
        return view('booking');
    }

    public function booking_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required|numeric|min:6|max:23',
            'duration' => 'required|numeric|max:18',
            'jenis_lapangan' => 'required|string'
        ]);

        $name = $request->name;
        $tanggal = $request->tanggal;
        $jam = $request->jam . ":00";
        $duration = $request->duration;
        $jenisLapangan = $request->jenis_lapangan;

        $hargaPerJam = $this->getHargaPerJam($jenisLapangan);
        if ($hargaPerJam === null) {
            return redirect()->back()->with('error', 'Jenis lapangan tidak valid');
        }

        $end_time = Carbon::parse($jam)->addHours($duration)->format('H:i');
        $harga = $hargaPerJam * $duration;

        return redirect()->away("https://wa.me/6285780360004?text=Booking%20Name:%20$name%0ABooking%20Date:%20$tanggal%0ABooking%20Time:%20$jam%20-$end_time%0AField%20Type:%20$jenisLapangan%0APrice:%20Rp$harga");
    }

    private function getHargaPerJam(string $jenisLapangan): ?int
    {
        $harga = [
            'plester' => 80000,
            'sintetis' => 100000,
        ];

        return $harga[$jenisLapangan] ?? null;
    }
}
