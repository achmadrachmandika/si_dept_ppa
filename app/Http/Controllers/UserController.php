<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
      $query->where('name', 'admin')
          ->orWhere('name', 'monitoring');
})->get();
        return view('user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // Anda bisa menambahkan validasi lain sesuai kebutuhan
        ]);

        // Simpan data pengguna baru ke database
        User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
     public function show(string $id)
    {
        // Ambil pengguna berdasarkan ID
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(string $id)
    {
        // Ambil pengguna berdasarkan ID
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // Anda bisa menambahkan validasi lain sesuai kebutuhan
        ]);

        // Ambil pengguna berdasarkan ID
        $user = User::findOrFail($id);
        // Update data pengguna
        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Mengambil data pengguna berdasarkan ID
    $user = User::findOrFail($id);

    // Menyimpan nama pengguna sebelum menghapusnya
    $deletedUserName = $user->name;

    // Menghapus pengguna dari database
    $user->delete();

    // Mengembalikan ke halaman dashboard dengan pesan konfirmasi yang mencakup nama pengguna yang dihapus
    return redirect()->route('user.index')->with('success', "User '$deletedUserName' has been deleted successfully.");
}

}
