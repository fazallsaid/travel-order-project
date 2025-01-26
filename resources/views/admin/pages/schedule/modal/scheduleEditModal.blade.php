<dialog id="scheduleEditModal{{$sched->schedule_id}}" class="h-[50%] w-[65%] bg-white p-[5rem] rounded-xl" onkeydown="if (event.key === 'Escape') { unblurBackground(); this.close(); }">
    <div class="w-full p-[2rem] sm:p-[2rem] flex flex-col justify-center relative">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">
            Edit Jadwal {{$sched->from}} - {{$sched->to}}
        </h2>
        <i class="fa fa-close fa-2x absolute top-0 right-0 m-4 cursor-pointer" onclick="unblurBackground(); document.getElementById('scheduleAddModal').close()"></i>
        <form id="addScheduleForm" action="{{ url('admin/schedule/edit/process') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="text-gray-700">Dari</label>
                <select name="from" class="w-full p-3 border text-gray-700 bg-white border-orange-400 rounded-lg focus:outline-none focus:border-orange-700">
                    <option value=""> == Pilih salah satu == </option>
                    <option value="PCT">Pacitan</option>
                    <option value="JOG">Jogja</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="text-gray-700">Ke</label>
                <select name="to" class="w-full p-3 border text-gray-700 bg-white border-orange-400 rounded-lg focus:outline-none focus:border-orange-700">
                    <option value=""> == Pilih salah satu == </option>
                    <option value="PCT">Pacitan</option>
                    <option value="JOG">Jogja</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="text-gray-700">Jam Keberangkatan</label>
                <input name="departure_time" type="time" class="w-full p-3 border text-gray-700 bg-white border-orange-400 rounded-lg focus:outline-none focus:border-orange-700" />
            </div>
            <div class="mb-4">
                <label class="text-gray-700">Harga Tiket</label>
                <input name="ticket_price" type="number" class="w-full p-3 border text-gray-700 bg-white border-orange-400 rounded-lg focus:outline-none focus:border-orange-700" />
            </div>
            <button type="submit" class="w-full text-white p-3 mb-4 rounded-lg bg-orange-600 hover:bg-orange-700 transition-colors">
                Simpan
            </button>
        </form>
    </div>
</dialog>
