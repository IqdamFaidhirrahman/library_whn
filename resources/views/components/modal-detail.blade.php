<!-- resources/views/components/modal-detail.blade.php -->
<div x-data="{ open: false, init() {
        window.addEventListener('show-detail-koleksi', () => {
            this.open = true
        })
        window.addEventListener('hide-detail-koleksi', () => this.open = false)
    } }" x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="bg-white rounded-[30px] w-full max-w-md mx-auto p-6 relative max-h-[95vh] overflow-y-auto" @click.away="open = false">
        <div class="flex justify-between items-center mb-4">
            <button @click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <h2 class="text-lg font-semibold text-center flex-1">Detail Koleksi</h2>
        </div>

        <div class="flex flex-col items-center">
            <img :src="detail.sampul" alt="Sampul" class="w-32 h-44 object-cover rounded mb-4" />

            <div class="w-full space-y-1 text-sm">
                <p><strong>Kode:</strong> <span x-text="detail.kode"></span></p>
                <p><strong>Judul:</strong> <span x-text="detail.judul"></span></p>
                <p><strong>Penulis:</strong> <span x-text="detail.penulis || '-' "></span></p>
                <p><strong>Tahun Terbit:</strong> <span x-text="detail.tahun"></span></p>
                <p><strong>Lokasi Rak:</strong> <span x-text="detail.lokasi"></span></p>
            </div>

            <div class="flex gap-2 mt-4">
                <span class="px-4 py-1 rounded-full text-white text-sm font-medium"
                    :class="detail.status === 'Tersedia' ? 'bg-green-500' : 'bg-yellow-400'">
                    <span x-text="detail.status"></span>
                </span>
                <span class="px-4 py-1 border border-black rounded-full text-sm font-medium">
                    <span x-text="detail.kategori"></span>
                </span>
            </div>

            <div class="mt-6 text-sm w-full">
                <p class="font-medium mb-1">Rincian:</p>
                <p x-text="detail.ringkasan || '-' "></p>
            </div>
        </div>
    </div>
</div>