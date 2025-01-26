<dialog id="scheduleDeleteModal{{$sched->schedule_id}}" class="h-[50%] w-[65%] bg-white p-[5rem] rounded-xl" onkeydown="if (event.key === 'Escape') { unblurBackground(); this.close(); }">
    <div class="w-full p-[2rem] sm:p-[2rem] flex flex-col justify-center relative">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">
            Ingin menghapus jadwal {{$sched->from}} - {{$sched->to}}?
        </h2>
        <i class="fa fa-close fa-2x absolute top-0 right-0 m-4 cursor-pointer" onclick="unblurBackground(); document.getElementById('scheduleAddModal').close()"></i>
        <form action="{{ url('admin/schedule/delete/' . $sched->schedule_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full text-white p-3 mb-4 rounded-lg bg-red-600 hover:bg-red-700 transition-colors">
                Hapus
            </button>
        </form>
    </div>
</dialog>
