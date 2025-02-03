<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-slate-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-2xl leading-6 font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Daftar Task') }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
                    Berikut adalah daftar task yang kamu miliki.
                </p>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-600">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-gray-50 dark:bg-slate-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Judul') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Deskripsi') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Status') }}
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">{{ __('Aksi') }}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $task->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-sm text-gray-500 dark:text-gray-300">
                                        {{ $task->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ $task->is_completed ? __('Selesai') : __('Belum Selesai') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900">
                                                {{ __('Hapus') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($tasks->isEmpty())
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-300">
                                        {{ __('Tidak ada task yang ditemukan.') }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
