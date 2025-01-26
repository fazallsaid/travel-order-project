<dialog id="loginModal" class="h-[75%] w-[65%] bg-white p-[5rem] rounded-xl" onkeydown="if (event.key === 'Escape') { unblurBackground(); this.close(); }">
    <div class="w-full p-[2rem] sm:p-[2rem] flex flex-col justify-center relative">
        <i class="fa fa-close fa-2x text-gray-700 absolute top-0 right-0 m-4" onclick="document.getElementById('loginModal').close(); unblurBackground();"></i>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">
         Masuk ke akun Anda.
        </h2>
        <form id="formLogin" action="{{url('login/process')}}" method="POST">
            @csrf
         <div class="mb-4">
          <label class="text-gray-700">Email</label>
          <input name="email" type="email" class="w-full p-3 border text-gray-700 bg-white border-orange-400 rounded-lg focus:outline-none focus:border-orange-700" placeholder="Email"/>
         </div>
         <div class="mb-4 relative">
          <label class="text-gray-700">Password</label>
          <div class="relative">
            <input name="password" class="w-full p-3 border border-orange-400 text-gray-700 bg-white rounded-lg focus:outline-none focus:border-orange-700 pr-10" placeholder="Password" type="password" id="passwordInput"/>
            <i class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer" onclick="togglePasswordVisibility()"></i>
          </div>
         </div>
         <button id="loginButton" class="w-full text-white p-3 mb-4 rounded-lg bg-orange-600 hover:bg-orange-700 transition-colors" type="submit">
          Masuk
         </button>
        </form>
        <button class="text-orange-600 border-orange-600 border-[1px] p-[9px] rounded-lg bg-transparent hover:bg-orange-700 hover:text-white w-full transition-colors" onclick="blurBackgroundo(); document.getElementById('loginModal').close(); document.getElementById('registerModal').showModal();">Buat Akun</button>
       </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function togglePasswordVisibility() {
          var x = document.getElementById("passwordInput");
          if (x.type === "password") {
              x.type = "text";
          } else
              x.type = "password";
      }
    </script>
   </dialog>
