<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil task milik user yang sedang login
        $tasks = auth()->user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function list()
{
    $tasks = auth()->user()->tasks()->latest()->get();
    return view('tasks.list', compact('tasks'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Jika ingin membuat halaman khusus untuk menambah task, bisa dibuat di sini.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        // Simpan task ke database dengan mengaitkan task ke user yang sedang login
        auth()->user()->tasks()->create($request->all());

        return redirect()->route('list')->with('success', 'Task berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Jika diperlukan, bisa menampilkan detail task.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cari task yang dimiliki user yang sedang login
        $task = auth()->user()->tasks()->findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cari task yang dimiliki user yang sedang login
        $task = auth()->user()->tasks()->findOrFail($id);

        // Validasi input
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed'=> 'sometimes|boolean'
        ]);

        // Perbarui task dengan data yang dikirim
        $task->update($request->all());

        return redirect()->route('tasks')->with('success', 'Task berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari task yang dimiliki user yang sedang login
        $task = auth()->user()->tasks()->findOrFail($id);

        // Hapus task
        $task->delete();

        return redirect()->route('list')->with('success', 'Task berhasil dihapus');
    }
}
