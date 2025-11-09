<div
    x-data="{ isOpen: false }"
    x-init="$watch('isOpen', value => {
        if (value) {
            document.body.classList.add('overflow-hidden');
        } else {
            document.body.classList.remove('overflow-hidden');
        }
    })"
    @keydown.escape.window="isOpen = false"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-30 backdrop-blur-sm transition-all duration-300"
    :class="{ 'opacity-0 pointer-events-none': !isOpen }">
    <div
        @click.outside="isOpen = false"
        class="bg-white rounded-xl shadow-lg max-w-md w-full max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95"
        :class="{ 'scale-100 opacity-100': isOpen }"
        style="box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800" x-text="modalTitle || 'Modal Title'"></h3>
            <button
                @click="isOpen = false"
                class="text-gray-400 hover:text-gray-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Body -->
        <div class="px-6 py-4">
            <div x-show="isLoading" class="flex justify-center py-8">
                <svg class="animate-spin h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.644z"></path>
                </svg>
            </div>

            <div x-show="!isLoading" x-html="modalContent"></div>
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-2 px-6 pb-6 pt-2 border-t border-gray-200">
            <button
                @click="isOpen = false"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Batal
            </button>
            <button
                @click="submitForm()"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Simpan
            </button>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views\components\modal.blade.php ENDPATH**/ ?>