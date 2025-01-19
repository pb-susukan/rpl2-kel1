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

@push('bottom-script')
<script>
    // Initialize DayPilot Calendar
    const dp = new DayPilot.Calendar("dp", {
        viewType: "Resources",
        cellDuration: 60,
        businessBeginsHour: 6,
        businessEndsHour: 24,
        heightSpec: "BusinessHoursNoScroll",
        allowEventOverlap: false,
        onEventResized: updateEvent,
        onTimeRangeSelected: createEvent,
        onEventMoved: updateEvent,
        onEventClicked: eventClicked,
        onEventEdit: updateEventName,
        onEventDeleted: deleteEvent
    });

    // Context Menu
    dp.contextMenu = new DayPilot.Menu({
        items: [{ text: "Ganti nama", onClick: args => dp.events.edit(args.source) }]
    });

    // Configure Columns and Events
    dp.columns.list = generateDayList("{{ $startDate }}", "{{ $endDate }}");
    dp.events.list = @json($bookingList);
    dp.init();

    // Event Listeners
    document.getElementById('startDate').addEventListener('change', updateEndDateConstraints);
    document.addEventListener('DOMContentLoaded', updateEndDateConstraints);

    // Helper Functions
    function generateDayList(startDate, endDate) {
        const dayList = [];
        const start = new Date(startDate.split('-').reverse().join('-'));
        const end = new Date(endDate.split('-').reverse().join('-'));

        for (let currentDate = new Date(start); currentDate <= end; currentDate.setDate(currentDate.getDate() + 1)) {
            const formattedDate = new Intl.DateTimeFormat('id-ID', {
                weekday: 'long', day: 'numeric', month: 'short', year: 'numeric'
            }).format(currentDate);

            dayList.push({
                name: formattedDate,
                id: `${currentDate.getDate().toString().padStart(2, '0')}-${(currentDate.getMonth() + 1).toString().padStart(2, '0')}-${currentDate.getFullYear()}`
            });
        }
        return dayList;
    }

    function formatTime(date) {
        return `${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}:${date.getSeconds().toString().padStart(2, '0')}`;
    }

    async function apiRequest(url, method, data = {}) {
        const response = await fetch(url, {
            method,
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify(data)
        });
        return response;
    }

    async function updateEvent(args) {
        const data = {
            name: args.e.text(),
            jam_mulai: formatTime(args.newStart),
            jam_selesai: formatTime(args.newEnd),
            tanggal: args.newResource
        };
        const url = `{{ route('api.booking.update', ['id' => ':id']) }}`.replace(':id', args.e.id());
        const response = await apiRequest(url, "PUT", data);
        handleResponse(response, "Data berhasil diubah", "Data gagal diubah");
        dp.events.update(args.e);
    }

    async function createEvent(args) {
        const modal = await DayPilot.Modal.prompt("Tambahkan nama pembooking:", "Event 1");
        if (modal.canceled) return;

        const data = {
            jam_mulai: formatTime(args.start),
            jam_selesai: formatTime(args.end),
            name: modal.result,
            tanggal: args.resource
        };
        const response = await apiRequest("{{ route('api.booking.add') }}", "POST", data);
        const result = await response.json();

        if (result.status === 200) {
            dp.events.add({
                start: args.start,
                end: args.end,
                id: result.data.id,
                text: modal.result,
                resource: args.resource
            });
            toastr.success("Data berhasil ditambahkan");
        } else {
            toastr.error("Data gagal ditambahkan");
        }
    }

    async function updateEventName(args) {
        const data = { name: args.newText };
        const url = `{{ route('api.booking.update', ['id' => ':id']) }}`.replace(':id', args.e.id());
        const response = await apiRequest(url, "PUT", data);
        handleResponse(response, "Data berhasil diubah", "Data gagal diubah");
        dp.events.update(args.e);
    }

    async function deleteEvent(args) {
        const url = `{{ route('api.booking.delete', ['id' => ':id']) }}`.replace(':id', args.e.id());
        const response = await apiRequest(url, "DELETE");
        handleResponse(response, "Data berhasil dihapus", "Data gagal dihapus");
    }

    function handleResponse(response, successMessage, errorMessage) {
        response.status === 200 ? toastr.success(successMessage) : toastr.error(errorMessage);
    }

    function filterByDate(form) {
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');

        const startDate = new Date(startDateInput.value);
        let endDate = new Date(endDateInput.value);

        const maxEndDate = new Date(startDate);
        maxEndDate.setDate(maxEndDate.getDate() + 6);

        if (endDate > maxEndDate) {
            endDate = maxEndDate;
            endDateInput.value = endDate.toISOString().slice(0, 10);
        }

        form.submit();
    }

    function updateEndDateConstraints() {
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');

        const startDate = new Date(startDateInput.value);
        const minEndDate = new Date(startDate);
        const maxEndDate = new Date(startDate);
        maxEndDate.setDate(maxEndDate.getDate() + 6);

        endDateInput.setAttribute('min', minEndDate.toISOString().slice(0, 10));
        endDateInput.setAttribute('max', maxEndDate.toISOString().slice(0, 10));

        const currentEndDate = new Date(endDateInput.value);
        if (currentEndDate > maxEndDate || currentEndDate < minEndDate) {
            endDateInput.value = maxEndDate.toISOString().slice(0, 10);
        }
    }

    function eventClicked(args) {
        console.log("Event clicked: " + args.e.text());
    }
</script>

<style>
    #dp {
        border-radius: 7px;
        overflow: hidden;
    }
</style>
@endpush
