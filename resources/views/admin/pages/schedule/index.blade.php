@include('admin.partials.head')
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <h1 class="mb-5">Jadwal</h1>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="blurBackground(); document.getElementById('scheduleAddModal').showModal()">Tambah Jadwal</button>
    <table id="sche" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Dari</th>
                <th>Ke</th>
                <th>Jam Berangkat</th>
                <th>Harga</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $index => $sched)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$sched->from}}</td>
                <td>{{$sched->to}}</td>
                <td>{{$sched->departure_time}}</td>
                <td>Rp. {{number_format($sched->ticket_price,0,',','.')}}</td>
                <td>
                <button onclick="blurBackground(); document.getElementById('scheduleEditModal{{$sched->schedule_id}}').showModal()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                @include('admin.pages.schedule.modal.scheduleEditModal')
                <button onclick="blurBackground(); document.getElementById('scheduleDeleteModal{{$sched->schedule_id}}').showModal()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                @include('admin.pages.schedule.modal.scheduleDeleteModal')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
@include('admin.pages.schedule.modal.scheduleAddModal')


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.tailwindcss.js"></script>
<script>
    new DataTable('#sche');
    $(document).ready(function(){
        $('#addScheduleButton').click(function(){
            $('#addScheduleModal').removeClass('hidden');
        });
        $('#closeModalButton').click(function(){
            $('#addScheduleModal').addClass('hidden');
        });
    });
</script>
@include('admin.partials.foot')
