<dialog id="scheduleOrderModal{{$sched->schedule_id}}" class="h-[50%] w-[65%] bg-white p-[5rem] rounded-xl" onkeydown="if (event.key === 'Escape') { unblurBackground(); this.close(); }">
    <div class="w-full p-[2rem] sm:p-[2rem] flex flex-col justify-center relative">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">
            Pesan Jadwal {{$sched->from}} - {{$sched->to}}
        </h2>
        <i class="fa fa-close fa-2x absolute top-0 right-0 m-4 cursor-pointer" onclick="unblurBackground(); document.getElementById('scheduleOrderModal{{$sched->schedule_id}}').close()"></i>
        <form id="orderScheduleForm" action="{{ url('customer/order/process') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ session('customerid') }}">
            <input type="hidden" name="schedule_id" value="{{ $sched->schedule_id }}">
            <div class="mb-4">
                <label class="text-gray-700">Tanggal Pesan</label>
                <input type="date" name="order_date" class="w-full p-3 border text-gray-700 bg-white border-orange-400 rounded-lg focus:outline-none focus:border-orange-700" required>
            </div>
            <div class="mb-4">
                <label class="text-gray-700">Jam Pesan</label>
                <input type="time" name="order_time" class="w-full p-3 border text-gray-700 bg-white border-orange-400 rounded-lg focus:outline-none focus:border-orange-700" required>
            </div>
            <input type="hidden" name="status" value="Waiting">
            <button type="submit" class="w-full text-white p-3 mb-4 rounded-lg bg-orange-600 hover:bg-orange-700 transition-colors">
                Pesan
            </button>
        </form>
    </div>
</dialog>
