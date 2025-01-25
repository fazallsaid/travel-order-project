<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:url" content="https://fastechnology.id/templates/demo/travel" />
    <meta property="og:title" content="Travel by Fastechnology" />
    <meta property="og:description" content="LP travel landing page" />

    <title>Andhika Travel</title>

            <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body class="bg-gray-200">
    <div class="fixed bottom-0 left-0 right-0 z-40 px-4 py-3 text-center text-white bg-gray-800">
        Copyright {{date('Y')}}. Andhika Travel. Allright Reserved.
    </div>
    <header class="pb-6 bg-slate-600">
  <div class="mx-auto border-b border-slate-500 mb-6">

  </div>
  <div class="mx-auto max-w-screen-xl flex items-center w-full justify-between">
    <a href="/" class="font-bold text-3xl text-white">Andhika Travel</a>
    <nav class="flex gap-12">
      <a href="{{url('about')}}" class="text-white uppercase relative pr-6">Tentang Kami
      </a>
      <a href="{{url('schedules')}}" class="text-white uppercase relative pr-6">Jadwal
      </a>
      <a href="{{url('contact')}}" class="text-white uppercase relative pr-6">Kontak Kami
      </a>
    </nav>
    <script>
        function blurBackground() {
            document.body.style.filter = "blur(10px)";
        }

        function blurBackgroundo() {
            document.body.style.filter = "blur(10px)";
        }

        function blurBackgroundos() {
            document.body.style.filter = "blur(10px)";
        }

        function unblurBackground() {
            document.body.style.filter = "none";
        }

        function unblurBackgroundo() {
            document.body.style.filter = "none";
        }

        function unblurBackgroundos() {
            document.body.style.filter = "none";
        }
    </script>
    <button class="uppercase text-white text-sm bg-orange-600 pt-2 pb-3 px-6" onclick="blurBackground(); document.getElementById('loginModal').showModal()">
      Pesan Sekarang
    </button>
  </div>
  @include('partials.auth.loginModal')
  @include('partials.auth.registerModal')
</header>
