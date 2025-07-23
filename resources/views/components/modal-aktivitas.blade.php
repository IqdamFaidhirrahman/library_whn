<div x-data="{ open: false,  init() {
            window.addEventListener('show-tambah-aktivitas', () => {
                this.open = true;
            });
            window.addEventListener('hide-tambah-aktivitas', () => this.open = false);
        } }" x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="bg-white rounded-[30px] w-full max-w-md mx-auto p-8 relative max-h-[95vh] overflow-y-auto"
        @click.away="open = false">
        <h2 class="text-xl font-bold text-center mb-6">Tambah Aktivitas</h2>
        <form>
            <div class="mb-4">
                <label class="block font-medium mb-1">Tanggal</label>
                <input type="text" placeholder="Masukkan tanggal"
                    class="w-full border-b border-black focus:outline-none py-2" />
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Nama</label>
                <input type="text" placeholder="Masukkan nama peminjam"
                    class="w-full border-b border-black focus:outline-none py-2" />
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Status</label>
                <div class="relative">
                    <select class="w-full border-b border-black focus:outline-none py-2 pr-8 appearance-none">
                        <option>Pilih Status</option>
                        <option>Dipinjam</option>
                        <option>Dikembalikan</option>
                    </select>
                    <svg class="absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none" width="18" height="10"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.00016 9.6024L0 1.92021L1.99969 0L9 6.72209L16.0003 0L18 1.92021L9.99984 9.6024C9.73464 9.85698 9.375 10 9 10C8.625 10 8.26536 9.85698 8.00016 9.6024Z"
                            fill="black" />
                    </svg>
                </div>
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Kode</label>
                <div class="relative">
                    <select class="w-full border-b border-black focus:outline-none py-2 pr-8 appearance-none">
                        <option>Pilih Kode</option>
                        <option>12345</option>
                        <option>67890</option>
                    </select>
                    <svg class="absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none" width="18" height="10"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.00016 9.6024L0 1.92021L1.99969 0L9 6.72209L16.0003 0L18 1.92021L9.99984 9.6024C9.73464 9.85698 9.375 10 9 10C8.625 10 8.26536 9.85698 8.00016 9.6024Z"
                            fill="black" />
                    </svg>
                </div>
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Jatuh Tempo</label>
                <input type="text" placeholder="Masukkan tanggal jatuh tempo"
                    class="w-full border-b border-black focus:outline-none py-2" />
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Kategori</label>
                <div class="relative">
                    <select class="w-full border-b border-black focus:outline-none py-2 pr-8 appearance-none">
                        <option>Pilih Kategori</option>
                        <option>Jurnal</option>
                        <option>Skripsi</option>
                        <option>Buku</option>
                    </select>
                    <svg class="absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none" width="18" height="10"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.00016 9.6024L0 1.92021L1.99969 0L9 6.72209L16.0003 0L18 1.92021L9.99984 9.6024C9.73464 9.85698 9.375 10 9 10C8.625 10 8.26536 9.85698 8.00016 9.6024Z"
                            fill="black" />
                    </svg>
                </div>
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Judul</label>
                <input type="text" placeholder="Tuliskan judul"
                    class="w-full border-b border-black focus:outline-none py-2" />
            </div>
            <div class="flex justify-between gap-4 mt-8">
                <button type="button" @click="open = false"
                    class="flex-1 border border-black rounded-[30px] py-2 font-medium hover:bg-gray-100">Batalkan</button>
                <button type="submit"
                    class="flex-1 bg-[#1976c5] text-white rounded-[30px] py-2 font-medium hover:bg-[#125a96]">Tambah</button>
            </div>
        </form>
    </div>
</div>