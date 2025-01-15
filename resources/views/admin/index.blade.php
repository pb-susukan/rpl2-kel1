@extends('layouts.admin.master')

@section('content')
<div class="mt-3 mb-6 flex justify-between items-center">
    <form method="GET" onchange="filterByDate(this)" class="text-center">
        <input type="date" name="startDate" id="startDate"
               value="{{ \Carbon\Carbon::createFromFormat('d-m-Y', $startDate)->format('Y-m-d') }}"
               class="w-5/12 md:w-auto border border-gray-300 rounded px-3 py-1 mr-2">
        <input type="date" name="endDate" id="endDate"
               value="{{ \Carbon\Carbon::createFromFormat('d-m-Y', $endDate)->format('Y-m-d') }}"
               class="w-5/12 md:w-auto border border-gray-300 rounded px-3 py-1">
    </form>
</div>
<div class="h-full overflow-auto">
    <div id="dp"></div>
</div>
@endsection