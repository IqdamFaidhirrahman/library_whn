<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Koleksi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="min-h-screen bg-white" x-data="{ showModal: false }">
    <div class="flex h-screen overflow-hidden">
        <x-sidebar>

        </x-sidebar>

        <div class="flex-1 p-4 md:p-8 flex flex-col gap-6">
            <div class="flex flex-wrap justify-start items-center gap-4">
                <div
                    class="flex items-center h-[44px] w-full sm:w-[300px] pl-4 pr-2 rounded-[30px] border border-black bg-white">
                    <div class="flex items-center gap-2 md:gap-3">
                        <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="9" cy="9" r="8" stroke="black" stroke-width="2" />
                            <line x1="15.5" y1="15" x2="19" y2="19" stroke="black" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                        <svg width="2" height="30" viewBox="0 0 2 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 md:h-[30px] flex-shrink-0" preserveAspectRatio="none"> {{-- Sesuaikan tinggi
                            --}}
                            <line x1="0.550049" x2="0.550049" y2="30" stroke="black" stroke-opacity="0.7">
                            </line>
                        </svg>
                    </div>
                    <input type="text" placeholder="Pencarian"
                        class="w-full h-full pl-2 outline-none bg-transparent text-base placeholder:text-gray-500" />
                </div>
                <div x-data="{ open: false, selected: 'Kategori:' }" class="relative w-full sm:w-[180px]">
                    <div @click="open = !open"
                        class="flex items-center h-[44px] px-4 rounded-[30px] border border-black bg-white cursor-pointer">
                        <span class="text-base text-black" x-text="selected"></span>
                        <svg width="18" height="10" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="ml-auto transition-transform" :class="{ 'rotate-180': open }">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.00016 9.6024L0 1.92021L1.99969 0L9 6.72209L16.0003 0L18 1.92021L9.99984 9.6024C9.73464 9.85698 9.375 10 9 10C8.625 10 8.26536 9.85698 8.00016 9.6024Z"
                                fill="black" />
                        </svg>
                    </div>
                    <div x-show="open" x-transition @click.away="open = false"
                        class="absolute left-0 right-0 mt-2 bg-white rounded-[15px] shadow-lg border border-black overflow-hidden z-50">
                        <template x-for="option in ['Jurnal', 'Buku', 'Skripsi']" :key="option">
                            <div @click="selected = option; open = false"
                                class="px-4 py-2 text-sm text-black cursor-pointer hover:bg-gray-100 border-b last:border-none"
                                x-text="option"></div>
                        </template>
                    </div>
                </div>
                <div
                    class="flex items-center h-[44px] w-full sm:w-[180px] px-4 rounded-[30px] border border-black bg-white relative">
                    <span class="text-base text-black">Tahun Terbit:</span>
                    <svg width="10" height="19" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-auto">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9.6024 10.4998L1.92021 18.5L0 16.5003L6.72209 9.5L0 2.49969L1.92021 0.5L9.6024 8.50016C9.85698 8.76536 10 9.125 10 9.5C10 9.875 9.85698 10.2346 9.6024 10.4998Z"
                            fill="black" />
                    </svg>
                </div>
                <div x-data="{ open: false, selected: 'Status:' }" class="relative w-full sm:w-[180px]">
                    <div @click="open = !open"
                        class="flex items-center h-[44px] px-4 rounded-[30px] border border-black bg-white cursor-pointer">
                        <span class="text-base text-black" x-text="selected"></span>
                        <svg width="18" height="10" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="ml-auto transition-transform" :class="{ 'rotate-180': open }">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.00016 9.6024L0 1.92021L1.99969 0L9 6.72209L16.0003 0L18 1.92021L9.99984 9.6024C9.73464 9.85698 9.375 10 9 10C8.625 10 8.26536 9.85698 8.00016 9.6024Z"
                                fill="black" />
                        </svg>
                    </div>
                    <div x-show="open" x-transition @click.away="open = false"
                        class="absolute left-0 right-0 mt-2 bg-white rounded-[15px] shadow-lg border border-black overflow-hidden z-50">
                        <template x-for="option in ['Dipinjam', 'Tersedia']" :key="option">
                            <div @click="selected = option; open = false"
                                class="px-4 py-2 text-sm text-black cursor-pointer hover:bg-gray-100 border-b last:border-none"
                                x-text="option"></div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full overflow-x-auto h-auto p-4 md:p-6 rounded-[30px] bg-white shadow-lg"
                style="box-shadow: 0px -4px 16px 0 rgba(0,0,0,0.1);">
                <div class="flex justify-between items-center mb-6">
                    <p class="text-xl font-bold text-black">
                        Kelola Koleksi
                    </p>
                </div>

                <div x-data="{
                        checkedRows: [],
                        toggleRow(id) {
                            const index = this.checkedRows.indexOf(id);
                            if (index === -1) this.checkedRows.push(id);
                            else this.checkedRows.splice(index, 1);
                        },
                        clearAll() { this.checkedRows = [] },
                        deleteSelected() {
                            // Tambahkan logika delete (misal AJAX ke Laravel route)
                            alert('Hapus: ' + this.checkedRows.join(', '));
                            this.checkedRows = [];
                        }
                    }">

                    <div x-data="tableHandler" class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 text-left text-s font-large text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox"
                                            @click="selected.length === data.length ? selected = [] : selected = data.map(d => d.id)">
                                    </th>
                                    <th
                                        class="px-5 py-3 text-left text-s font-large text-gray-500 uppercase tracking-wider">
                                        Kategori
                                    </th>
                                    <th
                                        class="px-5 py-3 text-left text-s font-large text-gray-500 uppercase tracking-wider">
                                        Kode
                                    </th>
                                    <th
                                        class="px-5 py-3 text-left text-s font-large text-gray-500 uppercase tracking-wider">
                                        Tahun
                                    </th>
                                    <th
                                        class="min-w-[150px] px-5 py-3 text-left text-s font-large text-gray-500 uppercase tracking-wider">
                                        Lokasi Rak
                                    </th>
                                    <th
                                        class="px-5 py-3 text-left text-s font-large text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <div class="flex gap-2 justify-end items-center">
                                        <template x-if="checkedRows.length">
                                            <button @click="deleteSelected"
                                                class="w-8 h-8 flex items-center justify-center rounded-full border border-red-500 text-red-500 hover:bg-red-100">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </template>
                                        <th
                                            class="px-5 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <button
                                                @click="window.dispatchEvent(new CustomEvent('show-tambah-koleksi'))"
                                                class="w-8 h-8 flex items-center justify-center rounded-full border border-black hover:bg-gray-200">
                                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 cursor-pointer"
                                                    preserveAspectRatio="xMidYMid meet">
                                                    <path
                                                        d="M18.75 16.25H25V18.75H18.75V25H16.25V18.75H10V16.25H16.25V10H18.75V16.25ZM17.5 0C19.1146 0 20.6641 0.208333 22.1484 0.625C23.6328 1.04167 25.026 1.6276 26.3281 2.38281C27.6302 3.13802 28.8086 4.04948 29.8633 5.11719C30.918 6.1849 31.8294 7.36328 32.5977 8.65234C33.3659 9.94141 33.9583 11.3346 34.375 12.832C34.7917 14.3294 35 15.8854 35 17.5C35 19.1146 34.7917 20.6641 34.375 22.1484C33.9583 23.6328 33.3724 25.026 32.6172 26.3281C31.862 27.6302 30.9505 28.8086 29.8828 29.8633C28.8151 30.918 27.6367 31.8294 26.3477 32.5977C25.0586 33.3659 23.6654 33.9583 22.168 34.375C20.6706 34.7917 19.1146 35 17.5 35C15.8854 35 14.3359 34.7917 12.8516 34.375C11.3672 33.9583 9.97396 33.3724 8.67188 32.6172C7.36979 31.862 6.19141 30.9505 5.13672 29.8828C4.08203 28.8151 3.17057 27.6367 2.40234 26.3477C1.63411 25.0586 1.04167 23.6654 0.625 22.168C0.208333 20.6706 0 19.1146 0 17.5C0 15.8854 0.208333 14.3359 0.625 12.8516C1.04167 11.3672 1.6276 9.97396 2.38281 8.67188C3.13802 7.36979 4.04948 6.19141 5.11719 5.13672C6.1849 4.08203 7.36328 3.17057 8.65234 2.40234C9.94141 1.63411 11.3346 1.04167 12.832 0.625C14.3294 0.208333 15.8854 0 17.5 0ZM17.5 32.5C18.8802 32.5 20.2083 32.3242 21.4844 31.9727C22.7604 31.6211 23.9518 31.1133 25.0586 30.4492C26.1654 29.7852 27.181 29.0039 28.1055 28.1055C29.0299 27.207 29.8112 26.1979 30.4492 25.0781C31.0872 23.9583 31.5885 22.7604 31.9531 21.4844C32.3177 20.2083 32.5 18.8802 32.5 17.5C32.5 16.1198 32.3242 14.7917 31.9727 13.5156C31.6211 12.2396 31.1133 11.0482 30.4492 9.94141C29.7852 8.83464 29.0039 7.81901 28.1055 6.89453C27.207 5.97005 26.1979 5.1888 25.0781 4.55078C23.9583 3.91276 22.7604 3.41146 21.4844 3.04688C20.2083 2.68229 18.8802 2.5 17.5 2.5C16.1198 2.5 14.7917 2.67578 13.5156 3.02734C12.2396 3.37891 11.0482 3.88672 9.94141 4.55078C8.83464 5.21484 7.81901 5.99609 6.89453 6.89453C5.97005 7.79297 5.1888 8.80208 4.55078 9.92188C3.91276 11.0417 3.41146 12.2396 3.04688 13.5156C2.68229 14.7917 2.5 16.1198 2.5 17.5C2.5 18.8802 2.67578 20.2083 3.02734 21.4844C3.37891 22.7604 3.88672 23.9518 4.55078 25.0586C5.21484 26.1654 5.99609 27.181 6.89453 28.1055C7.79297 29.0299 8.80208 29.8112 9.92188 30.4492C11.0417 31.0872 12.2396 31.5885 13.5156 31.9531C14.7917 32.3177 16.1198 32.5 17.5 32.5Z"
                                                        fill="black"></path>
                                                </svg>
                                            </button>
                                        </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-5 h-5 rounded-[5px] border border-black"></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace text-base font-medium text-black">Jurnal</td>
                                    <td class="px-6 py-4 whitespace text-base font-medium text-black">JRNL01</td>
                                    <td class="px-6 py-4 whitespace text-base font-medium text-black">2025</td>
                                    <td class="px-6 py-4 whitespace text-base font-medium text-black">C102</td>
                                    <td class="px-6 py-4 whitespace">
                                        <div
                                            class="inline-flex justify-center items-center px-4 py-1 rounded-[30px] bg-[#ded000]/70 text-base font-medium text-black">
                                            Dipinjam</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex gap-2 justify-end">
                                            <button
                                                @click="window.dispatchEvent(new CustomEvent('show-detail-koleksi'))"
                                                class="w-8 h-8 flex items-center justify-center hover:bg-gray-200 rounded-md">
                                                <svg width="30" height="37" viewBox="0 0 30 37" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-7 h-[35px]"
                                                    preserveAspectRatio="xMidYMid meet">
                                                    <path
                                                        d="M18.5 23.75L21.125 26.375M8.875 19.375C8.875 20.7674 9.42812 22.1027 10.4127 23.0873C11.3973 24.0719 12.7326 24.625 14.125 24.625C15.5174 24.625 16.8527 24.0719 17.8373 23.0873C18.8219 22.1027 19.375 20.7674 19.375 19.375C19.375 17.9826 18.8219 16.6473 17.8373 15.6627C16.8527 14.6781 15.5174 14.125 14.125 14.125C12.7326 14.125 11.3973 14.6781 10.4127 15.6627C9.42812 16.6473 8.875 17.9826 8.875 19.375Z"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M1 34.95V2.05C1 1.77152 1.11062 1.50445 1.30754 1.30754C1.50445 1.11062 1.77152 1 2.05 1H22.441C22.7194 1.00025 22.9863 1.11103 23.183 1.308L28.692 6.817C28.79 6.91482 28.8676 7.03105 28.9204 7.15899C28.9733 7.28694 29.0003 7.42407 29 7.5625V34.95C29 35.0879 28.9729 35.2244 28.9201 35.3518C28.8673 35.4792 28.79 35.595 28.6925 35.6925C28.595 35.79 28.4792 35.8673 28.3518 35.9201C28.2244 35.9728 28.0879 36 27.95 36H2.05C1.91211 36 1.77557 35.9728 1.64818 35.9201C1.52079 35.8673 1.40504 35.79 1.30754 35.6925C1.21004 35.595 1.13269 35.4792 1.07993 35.3518C1.02716 35.2244 1 35.0879 1 34.95Z"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M22 1V6.95C22 7.22848 22.1106 7.49555 22.3075 7.69246C22.5045 7.88937 22.7715 8 23.05 8H29"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                            <button @click="window.dispatchEvent(new CustomEvent('show-edit-koleksi'))"
                                                class="w-8 h-8 flex items-center justify-center hover:bg-gray-200 rounded-md">
                                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 cursor-pointer"
                                                    preserveAspectRatio="xMidYMid meet">
                                                    <path
                                                        d="M26.684 5.95734L31.0426 10.3159M29.4861 2.1176L17.6951 13.9086C17.0841 14.5156 16.6683 15.2913 16.501 16.1363L15.4119 21.5881L20.8637 20.4969C21.7078 20.3281 22.4819 19.9142 23.0914 19.3048L34.8824 7.51383C35.2367 7.15951 35.5177 6.73887 35.7095 6.27592C35.9013 5.81298 36 5.3168 36 4.81571C36 4.31463 35.9013 3.81845 35.7095 3.3555C35.5177 2.89256 35.2367 2.47192 34.8824 2.1176C34.528 1.76327 34.1074 1.48221 33.6445 1.29045C33.1815 1.0987 32.6853 1 32.1842 1C31.6832 1 31.187 1.0987 30.724 1.29045C30.2611 1.48221 29.8404 1.76327 29.4861 2.1176Z"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M31.8827 25.7058V31.8823C31.8827 32.9744 31.4488 34.0217 30.6766 34.7939C29.9044 35.5662 28.8571 36 27.765 36H5.11769C4.02561 36 2.97826 35.5662 2.20604 34.7939C1.43383 34.0217 1 32.9744 1 31.8823V9.235C1 8.14292 1.43383 7.09557 2.20604 6.32335C2.97826 5.55114 4.02561 5.11731 5.11769 5.11731H11.2942"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-5 h-5 rounded-[5px] border border-black"></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-black">Skripsi
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-black">SKR01</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-black">2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-black">S004</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="inline-flex justify-center items-center px-4 py-1 rounded-[30px] bg-[#00d836]/70 text-base font-medium text-black">
                                            Tersedia</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex gap-2 justify-end">
                                            <button
                                                class="w-8 h-8 flex items-center justify-center hover:bg-gray-200 rounded-md">
                                                <svg width="30" height="37" viewBox="0 0 30 37" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-7 h-[35px]"
                                                    preserveAspectRatio="xMidYMid meet">
                                                    <path
                                                        d="M18.5 23.75L21.125 26.375M8.875 19.375C8.875 20.7674 9.42812 22.1027 10.4127 23.0873C11.3973 24.0719 12.7326 24.625 14.125 24.625C15.5174 24.625 16.8527 24.0719 17.8373 23.0873C18.8219 22.1027 19.375 20.7674 19.375 19.375C19.375 17.9826 18.8219 16.6473 17.8373 15.6627C16.8527 14.6781 15.5174 14.125 14.125 14.125C12.7326 14.125 11.3973 14.6781 10.4127 15.6627C9.42812 16.6473 8.875 17.9826 8.875 19.375Z"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M1 34.95V2.05C1 1.77152 1.11062 1.50445 1.30754 1.30754C1.50445 1.11062 1.77152 1 2.05 1H22.441C22.7194 1.00025 22.9863 1.11103 23.183 1.308L28.692 6.817C28.79 6.91482 28.8676 7.03105 28.9204 7.15899C28.9733 7.28694 29.0003 7.42407 29 7.5625V34.95C29 35.0879 28.9729 35.2244 28.9201 35.3518C28.8673 35.4792 28.79 35.595 28.6925 35.6925C28.595 35.79 28.4792 35.8673 28.3518 35.9201C28.2244 35.9728 28.0879 36 27.95 36H2.05C1.91211 36 1.77557 35.9728 1.64818 35.9201C1.52079 35.8673 1.40504 35.79 1.30754 35.6925C1.21004 35.595 1.13269 35.4792 1.07993 35.3518C1.02716 35.2244 1 35.0879 1 34.95Z"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M22 1V6.95C22 7.22848 22.1106 7.49555 22.3075 7.69246C22.5045 7.88937 22.7715 8 23.05 8H29"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                            <button
                                                class="w-8 h-8 flex items-center justify-center hover:bg-gray-200 rounded-md">
                                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 cursor-pointer"
                                                    preserveAspectRatio="xMidYMid meet">
                                                    <path
                                                        d="M26.684 5.95734L31.0426 10.3159M29.4861 2.1176L17.6951 13.9086C17.0841 14.5156 16.6683 15.2913 16.501 16.1363L15.4119 21.5881L20.8637 20.4969C21.7078 20.3281 22.4819 19.9142 23.0914 19.3048L34.8824 7.51383C35.2367 7.15951 35.5177 6.73887 35.7095 6.27592C35.9013 5.81298 36 5.3168 36 4.81571C36 4.31463 35.9013 3.81845 35.7095 3.3555C35.5177 2.89256 35.2367 2.47192 34.8824 2.1176C34.528 1.76327 34.1074 1.48221 33.6445 1.29045C33.1815 1.0987 32.6853 1 32.1842 1C31.6832 1 31.187 1.0987 30.724 1.29045C30.2611 1.48221 29.8404 1.76327 29.4861 2.1176Z"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M31.8827 25.7058V31.8823C31.8827 32.9744 31.4488 34.0217 30.6766 34.7939C29.9044 35.5662 28.8571 36 27.765 36H5.11769C4.02561 36 2.97826 35.5662 2.20604 34.7939C1.43383 34.0217 1 32.9744 1 31.8823V9.235C1 8.14292 1.43383 7.09557 2.20604 6.32335C2.97826 5.55114 4.02561 5.11731 5.11769 5.11731H11.2942"
                                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <x-modal-tambah></x-modal-tambah>
        <x-modal-edit></x-modal-edit>
        <x-modal-detail></x-modal-detail>
</body>

</html>