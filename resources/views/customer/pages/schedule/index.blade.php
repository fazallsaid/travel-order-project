@include('customer.partials.head')
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <h1 class="mb-5">Jadwal</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($schedules as $index => $sched)
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-lg font-medium">Jadwal {{ $index + 1 }}</h2>
                    <div>
                        <button onclick="blurBackground(); document.getElementById('orderModal{{$sched->schedule_id}}').showModal()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">Pesan Sekarang</button>
                    </div>
                </div>
                <p><strong>Dari:</strong> {{ $sched->from }}</p>
                <p><strong>Ke:</strong> {{ $sched->to }}</p>
                <p><strong>Jam Berangkat:</strong> {{ $sched->departure_time }}</p>
                <p><strong>Harga:</strong> Rp. {{ number_format($sched->ticket_price, 0, ',', '.') }}</p>
                @include('customer.pages.schedule.modal.scheduleOrderModal')
            </div>
        @endforeach
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.tailwindcss.js"></script>
<script>
    // new DataTable('#sche'); // Removed DataTable initialization as it's no longer needed with card layout.
    $(document).ready(function(){
        $('#addScheduleButton').click(function(){
            $('#addScheduleModal').removeClass('hidden');
        });
        $('#closeModalButton').click(function(){
            $('#addScheduleModal').addClass('hidden');
        });
    });
</script>
@include('customer.partials.foot')
