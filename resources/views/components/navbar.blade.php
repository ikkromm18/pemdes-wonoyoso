<nav class="sticky top-0 z-20 w-full bg-white border-b border-gray-200">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="../images/Logo.png" class="h-8" alt="Logo" />
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">

            <div class="flex items-center gap-4">


                @auth

                    @if (Auth::user()->role === 'User')
                        <div class="p-2 bg-gray-200 rounded-full">


                            <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
                                class="relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white "
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 14 20">
                                    <path
                                        d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                                </svg>

                                {{-- <div
                                    class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 start-2.5 dark:border-gray-900">
                                </div> --}}

                                {{-- 🔹 Badge Notifikasi Unread --}}
                                @php
                                    $unreadCount = auth()->user()->unreadNotifications->count();
                                @endphp

                                @if ($unreadCount > 0)
                                    <span id="notif-badge"
                                        class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full">
                                        {{ $unreadCount }}
                                    </span>
                                @endif
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownNotification"
                                class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-800 dark:divide-gray-700"
                                aria-labelledby="dropdownNotificationButton">
                                <div
                                    class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                                    Pemberitahuan
                                </div>

                                <div class="divide-y divide-gray-100 ">

                                    @foreach (auth()->user()->notifications->sortByDesc('created_at')->take(10) as $notification)
                                        <div class="w-full ps-3 {{ $notification->read_at ? '' : 'bg-gray-200' }}">
                                            <div class="text-sm text-gray-500">
                                                <a href="#" class="mark-as-read" data-id="{{ $notification->id }}">
                                                    {{ $notification->data['message'] }}
                                                </a>
                                            </div>
                                            <div class="text-xs text-blue-600 mb-1.5">
                                                {{ \Carbon\Carbon::parse($notification->created_at)->translatedFormat('d F Y H:i') }}
                                            </div>
                                        </div>
                                    @endforeach



                                </div>
                                <a href="{{ route('pemberitahuan') }}"
                                    class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                                    <div class="inline-flex items-center ">
                                        <svg class="w-4 h-4 text-gray-500 me-2 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                            <path
                                                d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                        </svg>
                                        View all
                                    </div>
                                </a>
                            </div>

                        </div>
                    @endif




                    <button type="button"
                        class="flex p-2 text-sm bg-gray-200 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>

                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                            <span class="block text-sm text-gray-500 truncate ">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            @if (Auth::user()->role === 'Admin')
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                </li>
                            @endif


                            <li>
                                <a href="#" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none ">Login</a>
                @endauth
            </div>



            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}"
                        class="block px-3 py-2 text-gray-900 rounded-sm md:bg-transparent md:p-0 md:dark:text-blue-500 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#tatacara"
                        class="block px-3 py-2 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Services</a>
                </li>
                <li>
                    <a href="#sambutan"
                        class="block px-3 py-2 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">About</a>
                </li>
                <li>
                    <a href="{{ route('layanan') }}"
                        class="block px-3 py-2 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Layanan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="popup-modal" class="fixed inset-0 z-50 items-center justify-center hidden w-full h-full">
    <div class="relative w-full max-w-md p-4 bg-white rounded-lg shadow-sm">
        <button type="button" class="absolute text-gray-400 top-3 right-3 hover:text-gray-900"
            data-modal-hide="popup-modal">
            <svg class="w-4 h-4" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
        <div class="p-5 text-center">
            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah Anda Yakin Ingin Log Out?</h3>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="px-5 py-2.5 text-white bg-red-600 rounded-lg hover:bg-red-800">
                Log Out
            </a>
            <button data-modal-hide="popup-modal" type="button"
                class="py-2.5 px-5 ml-3 text-gray-900 bg-white border rounded-lg hover:bg-gray-100">
                Kembali
            </button>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".mark-as-read").forEach(function(element) {
            element.addEventListener("click", function(event) {
                event.preventDefault();
                let notificationId = this.dataset.id;

                fetch(`/notifications/mark-as-read/${notificationId}`, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]').content,
                        "Content-Type": "application/json"
                    }
                }).then(response => {
                    if (response.ok) {
                        location
                            .reload(); // Refresh halaman setelah notifikasi ditandai sebagai telah dibaca
                    }
                }).catch(error => console.error("Error:", error));
            });
        });
    });
</script>
