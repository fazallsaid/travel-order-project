@include('admin.partials.head')
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <h1 class="mb-5">Jadwal</h1>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="blurBackground(); document.getElementById('scheduleAddModal').showModal()">Tambah Jadwal</button>
    <table id="cust" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor WhatsApp</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($customer as $index => $cust)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$cust->first_name . " " . $cust->last_name}}</td>
                <td>{{$cust->email}}</td>
                <td>{{$cust->whatsapp}}</td>
                <td>
                <a href="{{url('admin/customer/'.$cust->user_id.'/edit')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{url('admin/customer/'.$cust->user_id)}}" method="post" class="inline">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                </form>
                <a href="{{url('admin/customer/'.$cust->user_id.'/show')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
@include('admin.partials.modal.scheduleAddModal')


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.tailwindcss.js"></script>
<script>
    new DataTable('#cust');
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
