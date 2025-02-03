<x-app-layout> 
    <div class="max-w-2xl mx-auto p-4">
        <!-- Form Tambah Task -->
        <div class="py-12 m-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-slate-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                            {{ __('Tambah Tugas') }}
                        </h3>
                        <form method="POST" action="{{ route('tasks.store') }}" class="space-y-4">
                            @csrf
                            <div>
                                <x-input-label for="title" :value="__('Judul')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus />
                            </div>
                            <div>
                                <x-input-label for="description" :value="__('Deskripsi')" />
                                <x-text-input id="description" name="description" class="mt-1 block w-full h-32" rows="3" />
                            </div>
                            <x-primary-button class="w-sm">{{ __('Simpan') }}</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Task dalam bentuk Tabel -->
        {{-- <div class="m-4">
            <div class="overflow-x-auto sm:rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-slate-600">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-gray-100 uppercase tracking-wider overflow-hidden">
                                {{ __('Judul') }}
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-gray-100 uppercase tracking-wider overflow-hidden">
                                {{ __('Deskripsi') }}
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-gray-100 uppercase tracking-wider overflow-hidden">
                                {{ __('Status') }}
                            </th>
                            <th class="px-6 py-3 w-20"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-700 divide-y divide-gray-200 dark:divide-gray-600">
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $task->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $task->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                    {{ $task->is_completed ? __('Selesai') : __('Belum Selesai') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700">
                                        {{ __('Edit') }}
                                    </a>
                                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 ml-2">
                                            {{ __('Hapus') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
</x-app-layout>
