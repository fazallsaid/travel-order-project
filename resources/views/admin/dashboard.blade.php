@include('admin.partials.head')
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    <div class="mt-1 grid grid-cols-1 gap-6 xl:grid-cols-1 mb-5">
        <!-- update section -->
    <div class="card bg-orange-500 border-teal-400 shadow-md text-white">
        <div class="card-body flex flex-row">

            <!-- info -->
            <div class="py-2 ml-10">
                <h1 class="h6">Halo, {{$adm->first_name}}!</h1>
                <p class="text-white text-xs">Gunakan halaman ini dengan sebaik baiknya.</p>
            </div>
            <!-- end info -->

        </div>
    </div>
    <!-- end update section -->
    </div>
    <div class="grid grid-cols-2 gap-6 xl:grid-cols-1">
        <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">

                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-indigo-700 fad fa-shopping-cart"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5">0</h1>
                    <p>Penjualan Tiket</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->

    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">

                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-green-700 fad fa-users"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5">0</h1>
                    <p>Customer</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->
    </div>
  </div>
@include('admin.partials.foot')
