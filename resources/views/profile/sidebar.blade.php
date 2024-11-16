@php
    $auth_user = Auth::guard('web')->user();
@endphp

<div class="col-lg-3 ">
    <div class="dashboard-side-ber">
        <div class="dashboard-logo-item">
            <div class="logo">
                <img id="preview-user-avatar" src="{{ getImageOrPlaceholder($auth_user->image, '100x100') }}" alt="User Image">
            </div>
            <div class="text">
                <h3>{{ html_decode($auth_user->name) }}
                    @php
                        $kyc = Modules\Kyc\Entities\KycInformation::where('user_id',$auth_user->id)->where('status',1)->first();
                    @endphp
                    @if($kyc)
                        <span  class="varified-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10.007 2.10377C8.60544 1.65006 7.08181 2.28116 6.41156 3.59306L5.60578 5.17023C5.51004 5.35763 5.35763 5.51004 5.17023 5.60578L3.59306 6.41156C2.28116 7.08181 1.65006 8.60544 2.10377 10.007L2.64923 11.692C2.71404 11.8922 2.71404 12.1078 2.64923 12.308L2.10377 13.993C1.65006 15.3946 2.28116 16.9182 3.59306 17.5885L5.17023 18.3942C5.35763 18.49 5.51004 18.6424 5.60578 18.8298L6.41156 20.407C7.08181 21.7189 8.60544 22.35 10.007 21.8963L11.692 21.3508C11.8922 21.286 12.1078 21.286 12.308 21.3508L13.993 21.8963C15.3946 22.35 16.9182 21.7189 17.5885 20.407L18.3942 18.8298C18.49 18.6424 18.6424 18.49 18.8298 18.3942L20.407 17.5885C21.7189 16.9182 22.35 15.3946 21.8963 13.993L21.3508 12.308C21.286 12.1078 21.286 11.8922 21.3508 11.692L21.8963 10.007C22.35 8.60544 21.7189 7.08181 20.407 6.41156L18.8298 5.60578C18.6424 5.51004 18.49 5.35763 18.3942 5.17023L17.5885 3.59306C16.9182 2.28116 15.3946 1.65006 13.993 2.10377L12.308 2.64923C12.1078 2.71403 11.8922 2.71404 11.692 2.64923L10.007 2.10377ZM6.75977 11.7573L8.17399 10.343L11.0024 13.1715L16.6593 7.51465L18.0735 8.92886L11.0024 15.9999L6.75977 11.7573Z">

                            </path>
                            </svg>
                        </span>
                    @endif
                </h3>
                <p>{{ html_decode($auth_user->designation) }}</p>
            </div>
            <div class="icon-item">
                <div class="icon">
                    <span>
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.40472 9.75234C2.67157 9.01664 1.93067 8.2727 1.18848 7.5279C3.07155 5.63883 4.95721 3.74672 6.83899 1.85938C7.57385 2.59854 8.31389 3.34291 9.04833 4.08164C7.17172 5.96725 5.2865 7.86153 3.40472 9.75234Z" fill="white"></path>
                            <path d="M9.65444 3.49537C9.62298 3.45985 9.59496 3.42475 9.5635 3.39312C8.87733 2.70291 8.19074 2.01271 7.50414 1.3225C7.43044 1.24841 7.4313 1.24885 7.50587 1.17346C7.78344 0.89486 8.0623 0.617564 8.33728 0.335936C8.50538 0.163493 8.69933 0.0421759 8.94026 0.0105468C9.23981 -0.0288812 9.51436 0.0404428 9.73633 0.248848C9.9902 0.487149 10.2316 0.738881 10.4772 0.985848C10.5785 1.08767 10.6789 1.19035 10.7768 1.29521C11.075 1.6154 11.0772 2.0595 10.7725 2.37276C10.4134 2.74234 10.0462 3.10413 9.68246 3.46938C9.67729 3.47458 9.67168 3.47891 9.65444 3.49451V3.49537Z" fill="white"></path>
                            <path d="M2.80089 10.3859C2.68366 10.4145 2.58194 10.4396 2.48022 10.4643C1.75914 10.6398 1.0385 10.8157 0.317423 10.9903C0.126917 11.0362 -0.0282453 10.898 0.00451126 10.7035C0.0368368 10.5124 0.0846787 10.3239 0.126486 10.1346C0.266995 9.49983 0.407935 8.86509 0.548443 8.22991C0.553615 8.20738 0.556632 8.18485 0.569131 8.15625C1.31693 8.89022 2.05223 9.63458 2.80089 10.3859Z" fill="white"></path>
                        </svg>
                    </span>
                    <form id="upload_user_avatar_form" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input name="image" type="file" class="icon-img" onchange="previewThumnailImage(event)">
                    </form>
                </div>
            </div>

        </div>
        <ul class="dashboard-btn gap-perfection">
            <li>
                <a href="{{ route('user.dashboard') }}" class="{{ Route::is('user.dashboard') ? 'active' : '' }}">
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.1805 20H5.81977C3.51103 20 1.63942 18.214 1.63942 16.0108V11.133C1.63942 10.4248 1.3446 9.74559 0.81981 9.2448C-0.396073 8.0845 -0.238008 6.16205 1.15263 5.19692L7.54136 0.762995C9.0072 -0.254332 10.993 -0.254332 12.4589 0.762995L18.8476 5.19691C20.2383 6.16205 20.3963 8.0845 19.1804 9.2448C18.6556 9.74559 18.3608 10.4248 18.3608 11.133V16.0108C18.3608 18.214 16.4892 20 14.1805 20ZM8.00012 15.25C7.58591 15.25 7.25012 15.5858 7.25012 16C7.25012 16.4142 7.58591 16.75 8.00012 16.75H12.0001C12.4143 16.75 12.7501 16.4142 12.7501 16C12.7501 15.5858 12.4143 15.25 12.0001 15.25H8.00012Z" />
                        </svg>
                    </span>
                    {{ __('translate.Dashboard') }}
                </a>
            </li>

            <li>
                <a href="{{ route('user.select-home-purpose') }}" class="{{ Route::is('user.select-home-purpose') || Route::is('user.homes.create') ? 'active' : '' }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 128 128">
                            <path d="M 70 18.074219 C 69.225 18.074219 68.450391 18.350391 67.900391 18.900391 L 14.099609 72.599609 C 12.899609 73.799609 12.899609 75.700781 14.099609 76.800781 L 22.599609 85.300781 C 23.199609 85.900781 23.899219 86.199219 24.699219 86.199219 C 25.499219 86.199219 26.300781 85.900781 26.800781 85.300781 L 70 42.199219 L 102 74.199219 L 102 114.5 C 99.1 115.5 96.899219 118 96.199219 121 L 84 121 L 84 80 C 84 78.3 82.7 77 81 77 L 59 77 C 57.3 77 56 78.3 56 80 L 56 121 L 38 121 L 38 94 C 38 92.3 36.7 91 35 91 C 33.3 91 32 92.3 32 94 L 32 101.40039 C 27.1 102.60039 23.300781 106.40078 22.300781 111.30078 C 17.400781 112.30078 13.500391 116.2 12.400391 121 L 4 121 C 2.3 121 1 122.3 1 124 C 1 125.7 2.3 127 4 127 L 99 127 C 100.7 127 102 125.7 102 124 L 102 123 C 102 121.3 103.3 120 105 120 C 106.7 120 108 121.3 108 123 L 108 124 C 108 125.7 109.3 127 111 127 L 114 127 C 115.7 127 117 125.7 117 124 C 117 122.3 115.7 121 114 121 L 113.80078 121 C 113.10078 118 110.9 115.5 108 114.5 L 108 80.199219 L 113.09961 85.300781 C 113.69961 85.900781 114.39922 86.199219 115.19922 86.199219 C 115.99922 86.199219 116.80078 85.900781 117.30078 85.300781 L 125.80078 76.800781 C 127.00078 75.600781 127.00078 73.699609 125.80078 72.599609 L 72.099609 18.900391 C 71.549609 18.350391 70.775 18.074219 70 18.074219 z M 70 25.300781 L 119.5 74.800781 L 115.30078 79 L 72.099609 35.900391 C 71.499609 35.300391 70.8 35 70 35 C 69.2 35 68.500391 35.300391 67.900391 35.900391 L 24.699219 79 L 20.5 74.800781 L 70 25.300781 z M 64 101 C 65.7 101 67 102.3 67 104 C 67 105.7 65.7 107 64 107 C 62.3 107 61 105.7 61 104 C 61 102.3 62.3 101 64 101 z M 32 107.69922 L 32 121 L 18.699219 121 C 19.799219 118.6 22.2 117 25 117 C 26.7 117 28 115.7 28 114 C 28 111.2 29.6 108.79922 32 107.69922 z M 124 121 A 3 3 0 0 0 121 124 A 3 3 0 0 0 124 127 A 3 3 0 0 0 127 124 A 3 3 0 0 0 124 121 z"></path>
                        </svg>
                    </span>
                    {{ __('translate.Add Rent') }}
                </a>
            </li>

            <li>
                <a href="{{ route('user.homes.index') }}" class="{{ Route::is('user.homes.index') || Route::is('user.homes.edit') || Route::is('user.car-gallery') ? 'active' : '' }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22" viewBox="0 0 64 64">
                            <path d="M 30.996094 6.015625 C 30.933594 6.015625 30.875 6.019531 30.8125 6.03125 C 30.75 6.046875 30.6875 6.0625 30.625 6.085938 C 30.566406 6.113281 30.511719 6.144531 30.453125 6.179688 C 30.425781 6.199219 30.386719 6.207031 30.359375 6.230469 L 18 16.460938 L 18 13.058594 C 18 12.503906 17.554688 12.058594 17 12.058594 C 16.445313 12.058594 16 12.503906 16 13.058594 L 16 18.058594 C 16 18.074219 16.007813 18.089844 16.011719 18.109375 L 14 19.769531 L 14 9.054688 C 14 8.503906 13.554688 8.054688 13 8.054688 C 12.445313 8.054688 12 8.503906 12 9.054688 L 12 21.058594 C 12 21.167969 12.03125 21.273438 12.0625 21.375 L 1.359375 30.230469 C 0.933594 30.582031 0.878906 31.210938 1.226563 31.636719 C 1.425781 31.875 1.714844 32 2 32 C 2.226563 32 2.453125 31.925781 2.640625 31.769531 L 6 28.988281 L 6 54 L 3 54 C 2.445313 54 2 54.449219 2 55 C 2 55.550781 2.445313 56 3 56 L 59 56 C 59.554688 56 60 55.550781 60 55 C 60 54.449219 59.554688 54 59 54 L 56 54 L 56 28.988281 L 59.359375 31.769531 C 59.546875 31.925781 59.773438 32 60 32 C 60.285156 32 60.570313 31.875 60.769531 31.640625 C 61.121094 31.210938 61.0625 30.582031 60.636719 30.230469 L 31.636719 6.230469 C 31.609375 6.207031 31.574219 6.199219 31.542969 6.179688 C 31.484375 6.140625 31.429688 6.109375 31.363281 6.085938 C 31.304688 6.0625 31.25 6.046875 31.1875 6.03125 C 31.125 6.019531 31.0625 6.015625 30.996094 6.015625 Z M 31 8.296875 L 54 27.332031 L 54 44 L 38 44 L 38 36 C 38 34.898438 37.101563 34 36 34 L 26 34 C 24.898438 34 24 34.898438 24 36 L 24 44 L 8 44 L 8 27.332031 Z M 31 18 C 28.242188 18 26 20.242188 26 23 C 26 25.757813 28.242188 28 31 28 C 33.757813 28 36 25.757813 36 23 C 36 20.242188 33.757813 18 31 18 Z M 31 19.792969 C 32.769531 19.792969 34.207031 21.230469 34.207031 23 C 34.207031 24.769531 32.769531 26.207031 31 26.207031 C 29.230469 26.207031 27.792969 24.769531 27.792969 23 C 27.792969 21.230469 29.230469 19.792969 31 19.792969 Z M 26 36 L 36 36 L 36 53.949219 L 26 53.949219 Z M 33 43 C 32.445313 43 32 43.449219 32 44 L 32 46 C 32 46.550781 32.445313 47 33 47 C 33.554688 47 34 46.550781 34 46 L 34 44 C 34 43.449219 33.554688 43 33 43 Z M 8 46 L 24 46 L 24 54 L 8 54 Z M 38 46 L 54 46 L 54 54 L 38 54 Z M 11 48 C 10.445313 48 10 48.449219 10 49 L 10 51 C 10 51.550781 10.445313 52 11 52 C 11.554688 52 12 51.550781 12 51 L 12 49 C 12 48.449219 11.554688 48 11 48 Z M 16 48 C 15.445313 48 15 48.449219 15 49 L 15 51 C 15 51.550781 15.445313 52 16 52 C 16.554688 52 17 51.550781 17 51 L 17 49 C 17 48.449219 16.554688 48 16 48 Z M 21 48 C 20.445313 48 20 48.449219 20 49 L 20 51 C 20 51.550781 20.445313 52 21 52 C 21.554688 52 22 51.550781 22 51 L 22 49 C 22 48.449219 21.554688 48 21 48 Z M 41 48 C 40.445313 48 40 48.449219 40 49 L 40 51 C 40 51.550781 40.445313 52 41 52 C 41.554688 52 42 51.550781 42 51 L 42 49 C 42 48.449219 41.554688 48 41 48 Z M 46 48 C 45.445313 48 45 48.449219 45 49 L 45 51 C 45 51.550781 45.445313 52 46 52 C 46.554688 52 47 51.550781 47 51 L 47 49 C 47 48.449219 46.554688 48 46 48 Z M 51 48 C 50.445313 48 50 48.449219 50 49 L 50 51 C 50 51.550781 50.445313 52 51 52 C 51.554688 52 52 51.550781 52 51 L 52 49 C 52 48.449219 51.554688 48 51 48 Z"></path>
                            </svg>
                    </span>
                    {{ __('translate.Manage Listing') }}
                </a>
            </li>

            <li>
                <a href="{{ route('user.orders') }}" class="{{ Route::is('user.orders') || Route::is('user.order') ? 'active' : '' }}">
                    <span>
                        <svg width="21" height="18" viewBox="0 0 21 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.25128 17.9985H1.03062C0.46235 17.9985 0.00012207 17.4785 0.00012207 16.8396V2.04417C0.00012207 1.40481 0.46235 0.884766 1.03062 0.884766H5.7549C5.74236 0.974021 5.73547 1.0651 5.73547 1.158V15.9534C5.73547 16.8942 6.41506 17.6588 7.25128 17.6588H7.97943C7.79284 17.8688 7.53541 17.9985 7.25128 17.9985ZM2.94875 7.63492C2.26107 7.63492 1.7017 7.00558 1.7017 6.23234C1.7017 6.08115 1.81058 5.95911 1.94456 5.95911C2.07893 5.95911 2.18741 6.08115 2.18741 6.23234C2.18741 6.70457 2.52902 7.08846 2.94875 7.08846C3.36848 7.08846 3.71009 6.70457 3.71009 6.23234C3.71009 5.75965 3.36848 5.37576 2.94875 5.37576C2.26107 5.37576 1.7017 4.74642 1.7017 3.97272C1.7017 3.19948 2.26107 2.57014 2.94875 2.57014C3.63642 2.57014 4.19579 3.19948 4.19579 3.97272C4.19579 4.12391 4.08692 4.24595 3.95294 4.24595C3.81856 4.24595 3.71009 4.12391 3.71009 3.97272C3.71009 3.50049 3.36848 3.1166 2.94875 3.1166C2.52902 3.1166 2.18741 3.50049 2.18741 3.97272C2.18741 4.44496 2.52902 4.8293 2.94875 4.8293C3.63642 4.8293 4.19579 5.45864 4.19579 6.23234C4.19579 7.00558 3.63642 7.63492 2.94875 7.63492ZM4.66166 8.92593H1.23624C1.10186 8.92593 0.993386 8.80343 0.993386 8.6527C0.993386 8.50197 1.10186 8.37947 1.23624 8.37947H4.66166C4.79564 8.37947 4.90411 8.50197 4.90411 8.6527C4.90411 8.80343 4.79564 8.92593 4.66166 8.92593ZM4.66166 11.451H1.23624C1.10186 11.451 0.993386 11.3285 0.993386 11.1778C0.993386 11.0266 1.10186 10.9046 1.23624 10.9046H4.66166C4.79564 10.9046 4.90411 11.0266 4.90411 11.1778C4.90411 11.3285 4.79564 11.451 4.66166 11.451ZM4.66166 13.9757H1.23624C1.10186 13.9757 0.993386 13.8536 0.993386 13.7024C0.993386 13.5517 1.10186 13.4292 1.23624 13.4292H4.66166C4.79564 13.4292 4.90411 13.5517 4.90411 13.7024C4.90411 13.8536 4.79564 13.9757 4.66166 13.9757ZM4.81911 16.3136H1.07838C0.944411 16.3136 0.835533 16.1911 0.835533 16.0404V14.9994C0.835533 14.8482 0.944411 14.7261 1.07838 14.7261H4.81911C4.95309 14.7261 5.06197 14.8482 5.06197 14.9994V16.0404C5.06197 16.1911 4.95309 16.3136 4.81911 16.3136ZM1.32124 15.7672H4.57626V15.2726H1.32124V15.7672Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.4723 17.1133H7.25129C6.68342 17.1133 6.22119 16.5937 6.22119 15.9544V1.15895C6.22119 0.520048 6.68342 0 7.25129 0H13.4723C14.0402 0 14.5024 0.520048 14.5024 1.15895V15.9544C14.5024 16.5937 14.0402 17.1133 13.4723 17.1133ZM10.3618 6.5047C9.67414 6.5047 9.11477 5.87536 9.11477 5.10166C9.11477 4.95093 9.22365 4.82843 9.35762 4.82843C9.492 4.82843 9.60048 4.95093 9.60048 5.10166C9.60048 5.5739 9.94209 5.95824 10.3618 5.95824C10.7815 5.95824 11.1232 5.5739 11.1232 5.10166C11.1232 4.62943 10.7815 4.24509 10.3618 4.24509C9.67414 4.24509 9.11477 3.61575 9.11477 2.8425C9.11477 2.06881 9.67414 1.43947 10.3618 1.43947C11.0495 1.43947 11.6089 2.06881 11.6089 2.8425C11.6089 2.99324 11.5 3.11573 11.366 3.11573C11.2316 3.11573 11.1232 2.99324 11.1232 2.8425C11.1232 2.37027 10.7815 1.98593 10.3618 1.98593C9.94209 1.98593 9.60048 2.37027 9.60048 2.8425C9.60048 3.31474 9.94209 3.69863 10.3618 3.69863C11.0495 3.69863 11.6089 4.32842 11.6089 5.10166C11.6089 5.87536 11.0495 6.5047 10.3618 6.5047ZM12.0743 8.0439H8.64931C8.51493 8.0439 8.40645 7.9214 8.40645 7.77067C8.40645 7.61948 8.51493 7.49744 8.64931 7.49744H12.0743C12.2087 7.49744 12.3172 7.61948 12.3172 7.77067C12.3172 7.9214 12.2087 8.0439 12.0743 8.0439ZM12.0743 10.5685H8.64931C8.51493 10.5685 8.40645 10.4465 8.40645 10.2953C8.40645 10.1446 8.51493 10.0221 8.64931 10.0221H12.0743C12.2087 10.0221 12.3172 10.1446 12.3172 10.2953C12.3172 10.4465 12.2087 10.5685 12.0743 10.5685ZM12.0743 13.0936H8.64931C8.51493 13.0936 8.40645 12.9711 8.40645 12.8204C8.40645 12.6697 8.51493 12.5472 8.64931 12.5472H12.0743C12.2087 12.5472 12.3172 12.6697 12.3172 12.8204C12.3172 12.9711 12.2087 13.0936 12.0743 13.0936ZM12.2318 15.6738H8.49145C8.35748 15.6738 8.2486 15.5518 8.2486 15.4006V14.3596C8.2486 14.2089 8.35748 14.0864 8.49145 14.0864H12.2318C12.3662 14.0864 12.4746 14.2089 12.4746 14.3596V15.4006C12.4746 15.5518 12.3662 15.6738 12.2318 15.6738ZM8.7343 15.1274H11.9889V14.6328H8.7343V15.1274Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M19.693 17.9985H13.4723C13.1882 17.9985 12.9308 17.8688 12.7442 17.6588H13.4723C14.3081 17.6588 14.9881 16.8942 14.9881 15.9534V1.158C14.9881 1.0651 14.9812 0.974021 14.9687 0.884766H19.693C20.2612 0.884766 20.7235 1.40481 20.7235 2.04417V16.8396C20.7235 17.4785 20.2612 17.9985 19.693 17.9985ZM17.9772 7.63492C17.2895 7.63492 16.7302 7.00558 16.7302 6.23188C16.7302 6.08115 16.8391 5.95865 16.973 5.95865C17.107 5.95865 17.2159 6.08115 17.2159 6.23188C17.2159 6.70411 17.5575 7.08846 17.9772 7.08846C18.397 7.08846 18.7382 6.70411 18.7382 6.23188C18.7382 5.75965 18.397 5.37576 17.9772 5.37576C17.2895 5.37576 16.7302 4.74642 16.7302 3.97272C16.7302 3.19948 17.2895 2.57014 17.9772 2.57014C18.6645 2.57014 19.2239 3.19948 19.2239 3.97272C19.2239 4.12391 19.1154 4.24595 18.981 4.24595C18.847 4.24595 18.7382 4.12391 18.7382 3.97272C18.7382 3.50049 18.397 3.1166 17.9772 3.1166C17.5575 3.1166 17.2159 3.50049 17.2159 3.97272C17.2159 4.44496 17.5575 4.8293 17.9772 4.8293C18.6645 4.8293 19.2239 5.45864 19.2239 6.23188C19.2239 7.00558 18.6645 7.63492 17.9772 7.63492ZM19.6897 8.92866H16.2643C16.1303 8.92866 16.0215 8.80616 16.0215 8.65543C16.0215 8.5047 16.1303 8.3822 16.2643 8.3822H19.6897C19.8241 8.3822 19.9326 8.5047 19.9326 8.65543C19.9326 8.80616 19.8241 8.92866 19.6897 8.92866ZM19.6897 11.4538H16.2643C16.1303 11.4538 16.0215 11.3313 16.0215 11.1805C16.0215 11.0293 16.1303 10.9073 16.2643 10.9073H19.6897C19.8241 10.9073 19.9326 11.0293 19.9326 11.1805C19.9326 11.3313 19.8241 11.4538 19.6897 11.4538ZM19.6897 13.9784H16.2643C16.1303 13.9784 16.0215 13.8564 16.0215 13.7052C16.0215 13.5544 16.1303 13.432 16.2643 13.432H19.6897C19.8241 13.432 19.9326 13.5544 19.9326 13.7052C19.9326 13.8564 19.8241 13.9784 19.6897 13.9784ZM19.8472 16.3136H16.1069C15.9729 16.3136 15.864 16.1911 15.864 16.0404V14.9994C15.864 14.8482 15.9729 14.7261 16.1069 14.7261H19.8472C19.9816 14.7261 20.09 14.8482 20.09 14.9994V16.0404C20.09 16.1911 19.9816 16.3136 19.8472 16.3136ZM16.3497 15.7672H19.6043V15.2726H16.3497V15.7672Z" />
                        </svg>
                    </span>
                    {{ __('translate.Purchase History') }}
                </a>
            </li>

            <li>
                <a href="{{ route('user.reviews') }}" class="{{ Route::is('user.reviews') ? 'active' : '' }}">
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.03293 1.27141C8.83762 -0.423802 11.1626 -0.423805 11.9673 1.27141L13.358 4.20118C13.6776 4.87435 14.2952 5.34094 15.0097 5.44888L18.1195 5.91869C19.9188 6.19053 20.6373 8.48954 19.3352 9.80908L17.085 12.0896C16.568 12.6136 16.3321 13.3685 16.4541 14.1084L16.9853 17.3285C17.2927 19.1918 15.4117 20.6126 13.8024 19.7329L11.0209 18.2126C10.3819 17.8633 9.61838 17.8633 8.97929 18.2126L6.19789 19.7329C4.58851 20.6126 2.70755 19.1918 3.01491 17.3285L3.54611 14.1084C3.66816 13.3685 3.43223 12.6136 2.9152 12.0896L0.664997 9.80908C-0.637012 8.48954 0.0814502 6.19053 1.88078 5.91869L4.9905 5.44888C5.70501 5.34094 6.32269 4.87435 6.64223 4.20118L8.03293 1.27141Z" />
                        </svg>
                    </span>
                    {{ __('translate.Reviews') }}
                </a>
            </li>


            <li>
                <a href="{{ route('user.wishlists') }}" class="{{ Route::is('user.wishlists') ? 'active' : '' }}">
                    <span>
                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.266 2.70229L10.501 3.52422L9.73593 2.70229C7.62331 0.432572 4.19807 0.43257 2.08544 2.70229C-0.0271785 4.972 -0.0271796 8.65194 2.08544 10.9217L8.97088 18.3191C9.81593 19.227 11.186 19.227 12.0311 18.3191L18.9165 10.9217C21.0291 8.65194 21.0291 4.972 18.9165 2.70229C16.8039 0.432571 13.3786 0.432571 11.266 2.70229Z"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                    </span>
                    {{ __('translate.Wishlist') }}
                </a>
            </li>


            <li>
                <a href="{{ route('user.edit-profile') }}" class="{{ Route::is('user.edit-profile') ? 'active' : '' }}">
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.0001 0H4.00012C1.79098 0 0.00012207 1.79086 0.00012207 4V16C0.00012207 17.8642 1.27544 19.4306 3.00123 19.8743C3.32052 19.9563 3.65522 20 4.00012 20H16.0001C16.345 20 16.6797 19.9563 16.999 19.8743C18.7248 19.4306 20.0001 17.8642 20.0001 16V4C20.0001 1.79086 18.2093 0 16.0001 0ZM13.0001 7C13.0001 5.34315 11.657 4 10.0001 4C8.34327 4 7.00012 5.34315 7.00012 7C7.00012 8.65685 8.34327 10 10.0001 10C11.657 10 13.0001 8.65685 13.0001 7ZM5.15269 15.0155C5.70097 13.2824 7.66335 12 10.0001 12C12.3369 12 14.2993 13.2824 14.8475 15.0155C15.0141 15.5421 14.5524 16 14.0001 16H6.00012C5.44784 16 4.98611 15.5421 5.15269 15.0155Z" />
                        </svg>
                    </span>
                    {{ __('translate.Edit Profile') }}
                </a>
            </li>

            @if (Module::isEnabled('Kyc'))
                <li>
                    <a href="{{ route('user.kyc') }}" class="{{ Route::is('user.kyc') ? 'active' : '' }}">
                        <span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.0001 0H4.00012C1.79098 0 0.00012207 1.79086 0.00012207 4V16C0.00012207 17.8642 1.27544 19.4306 3.00123 19.8743C3.32052 19.9563 3.65522 20 4.00012 20H16.0001C16.345 20 16.6797 19.9563 16.999 19.8743C18.7248 19.4306 20.0001 17.8642 20.0001 16V4C20.0001 1.79086 18.2093 0 16.0001 0ZM13.0001 7C13.0001 5.34315 11.657 4 10.0001 4C8.34327 4 7.00012 5.34315 7.00012 7C7.00012 8.65685 8.34327 10 10.0001 10C11.657 10 13.0001 8.65685 13.0001 7ZM5.15269 15.0155C5.70097 13.2824 7.66335 12 10.0001 12C12.3369 12 14.2993 13.2824 14.8475 15.0155C15.0141 15.5421 14.5524 16 14.0001 16H6.00012C5.44784 16 4.98611 15.5421 5.15269 15.0155Z" />
                            </svg>
                        </span>
                        {{ __('translate.KYC Verifaction') }}
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('user.change-password') }}" class="{{ Route::is('user.change-password') ? 'active' : '' }}">
                    <span>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.00012 0.25C5.37677 0.25 3.25012 2.49007 3.25012 5.25333V5.32204C1.39948 5.6731 0.00012207 7.29905 0.00012207 9.25184V15.9985C0.00012207 18.2077 1.79098 19.9985 4.00012 19.9985H12.0001C14.2093 19.9985 16.0001 18.2077 16.0001 15.9985V9.25185C16.0001 7.29905 14.6008 5.6731 12.7501 5.32204V5.25333C12.7501 2.49007 10.6235 0.25 8.00012 0.25ZM11.2501 5.25185C11.2494 3.36187 9.79458 1.83 8.00012 1.83C6.20567 1.83 4.75089 3.36187 4.75012 5.25185H11.2501ZM10.0001 12.626C10.0001 13.7895 9.10469 14.7327 8.00012 14.7327C6.89555 14.7327 6.00012 13.7895 6.00012 12.626C6.00012 11.4626 6.89555 10.5194 8.00012 10.5194C9.10469 10.5194 10.0001 11.4626 10.0001 12.626Z" />
                        </svg>
                    </span>
                    {{ __('translate.Change Password') }}
                </a>
            </li>

            <button type="button" class="log-out-btn" data-bs-toggle="modal"
                data-bs-target="#exampleModal4">
                <span>
                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.01938 1.65551C5.16191 1.70905 5.30365 1.76412 5.44695 1.81613C6.19054 2.08842 6.89541 2.44025 7.56929 2.85174C7.98833 3.10721 8.39111 3.38714 8.71721 3.75963C9.47242 4.62315 9.98983 5.61211 10.2803 6.71121C10.3895 7.12347 10.4484 7.55179 10.491 7.97705C10.5599 8.67536 10.6087 9.37597 10.6443 10.0766C10.7071 11.2958 10.7234 12.5157 10.6567 13.7349C10.632 14.1946 10.6033 14.6542 10.577 15.1139C10.5739 15.1736 10.577 15.234 10.577 15.3036C10.7907 15.2837 10.9952 15.2401 11.1819 15.1529C12.2431 14.6558 12.9596 13.881 13.1416 12.7016C13.219 12.2029 13.2632 11.6996 13.3166 11.1979C13.3538 10.8468 13.573 10.5852 13.903 10.5156C14.346 10.4215 14.7783 10.7749 14.7682 11.2292C14.7643 11.4067 14.748 11.5849 14.7248 11.7608C14.6559 12.2763 14.604 12.7964 14.5025 13.3058C14.3685 13.9789 14.0347 14.5655 13.5994 15.0956C13.051 15.764 12.3763 16.2689 11.5467 16.5419C11.1989 16.6566 10.8287 16.7086 10.4685 16.7836C10.405 16.7966 10.3771 16.8203 10.3616 16.8823C10.24 17.3572 10.0619 17.807 9.74197 18.1902C9.41045 18.5864 9.0007 18.8632 8.48483 18.9696C8.17578 19.033 7.87137 18.9856 7.56541 18.9328C6.24709 18.7049 5.01784 18.2353 3.85675 17.5882C3.4408 17.3565 3.03105 17.1048 2.65383 16.8173C2.1279 16.4165 1.7561 15.8765 1.42536 15.3135C0.986171 14.5663 0.673243 13.7708 0.529172 12.9165C0.470304 12.5692 0.436223 12.2182 0.404466 11.8671C0.354893 11.3202 0.313066 10.7718 0.276661 10.2234C0.252649 9.86548 0.233284 9.50676 0.227862 9.14804C0.214695 8.28987 0.224764 7.43247 0.285956 6.57583C0.35102 5.67024 0.428477 4.76542 0.590364 3.87053C0.713521 3.18828 1.01715 2.58481 1.4393 2.03564C2.0365 1.25931 2.79248 0.695615 3.74521 0.426386C4.19059 0.300185 4.65533 0.232877 5.11543 0.16557C5.8474 0.059255 6.58558 0.00724475 7.32607 0.0011259C8.03093 -0.00499295 8.7358 0.0118339 9.43524 0.101322C10.0115 0.174748 10.5894 0.250469 11.1587 0.364433C11.9665 0.525817 12.6389 0.951077 13.2214 1.51478C13.872 2.14425 14.3422 2.8854 14.5172 3.77569C14.6233 4.31339 14.6752 4.86179 14.7442 5.40636C14.7635 5.55934 14.7759 5.7169 14.7643 5.87063C14.7388 6.22094 14.4158 6.51158 14.0602 6.52305C13.7264 6.53376 13.3918 6.27295 13.3391 5.93641C13.2918 5.63276 13.2756 5.32376 13.2376 5.01858C13.1788 4.54973 13.1594 4.07093 12.9634 3.6319C12.5645 2.74084 11.9162 2.09607 10.965 1.80007C10.6095 1.68916 10.23 1.6448 9.85816 1.59662C8.9062 1.47347 7.94883 1.43294 6.98913 1.45894C6.32997 1.47653 5.6739 1.52854 5.01938 1.65627V1.65551Z" />
                        <path
                            d="M17.4784 7.76288C17.4304 7.71316 17.3839 7.66191 17.3351 7.61373C16.9541 7.23512 16.5691 6.86034 16.1926 6.47715C16.1005 6.38384 16.0199 6.27064 15.9634 6.15362C15.8054 5.82855 15.9905 5.47366 16.2407 5.3161C16.5404 5.12718 16.8991 5.1486 17.1454 5.38723C17.5257 5.75742 17.9014 6.13297 18.2786 6.50622C18.7627 6.98578 19.2468 7.46458 19.7278 7.94644C19.8014 8.01987 19.8719 8.104 19.9184 8.19578C20.057 8.47113 20.016 8.73424 19.82 8.96829C19.7115 9.09755 19.5899 9.21687 19.4691 9.33618C18.7302 10.0666 17.9897 10.7963 17.2499 11.5267C17.1113 11.6636 16.9618 11.7814 16.7604 11.8105C16.4568 11.8549 16.1733 11.7241 16.0191 11.4717C15.8627 11.217 15.8735 10.9126 16.0633 10.6686C16.157 10.5485 16.2709 10.4429 16.3793 10.3351C16.731 9.98555 17.0842 9.6383 17.4366 9.29029C17.4467 9.28035 17.4544 9.26735 17.4738 9.24287C17.4258 9.23981 17.3925 9.23675 17.3584 9.23675C15.7333 9.23599 14.1083 9.23446 12.4832 9.23522C12.1889 9.23522 11.9534 9.13044 11.8062 8.87498C11.5235 8.38394 11.8984 7.77741 12.4669 7.782C13.9696 7.7927 15.4723 7.78659 16.975 7.78735C17.1384 7.78735 17.3026 7.78735 17.466 7.78735C17.4707 7.77894 17.4746 7.77129 17.4792 7.76288H17.4784Z" />
                    </svg>
                </span>
                {{ __('translate.Logout') }}
            </button>
        </ul>
    </div>
</div>



@push('js_section')
<script>
    (function($) {
        "use strict";
        $(document).ready(function () {
            $("#upload_user_avatar_form").on("submit", function(e){
                e.preventDefault();

                var isDemo = "{{ env('APP_MODE') }}"
                if(isDemo == 'DEMO'){
                    toastr.error('This Is Demo Version. You Can Not Change Anything');
                    return;
                }

                $.ajax({
                    type: 'POST',
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    url: "{{ route('user.upload-user-avatar') }}",
                    success: function (response) {
                        toastr.success(response.message)
                    },
                    error: function(response) {

                    }
                });
            })
        });
    })(jQuery);


    function previewThumnailImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview-user-avatar');
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
        $("#upload_user_avatar_form").submit();
    };
</script>

@endpush