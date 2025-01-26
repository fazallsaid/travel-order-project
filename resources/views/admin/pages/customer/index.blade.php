@include('admin.partials.head')
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <h1 class="mb-5">Customer</h1>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="blurBackground(); document.getElementById('customerAddModal').showModal()">Tambah Customer</button>
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
                <button onclick="blurBackground(); document.getElementById('customerEditModal{{$cust->user_id}}').showModal()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                @include('admin.pages.customer.modal.customerEditModal')
                <button onclick="blurBackground(); document.getElementById('customerDeleteModal{{$cust->user_id}}').showModal()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                @include('admin.pages.customer.modal.customerDeleteModal')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
@include('admin.pages.customer.modal.customerAddModal')


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
