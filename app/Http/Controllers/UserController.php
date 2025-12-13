<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

        $sortDirection = $request->get('sort', 'desc');

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'desc';
        }

        $users = $query->orderBy('id', $sortDirection)
            ->paginate(10)
            ->withQueryString();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")
                    ->orWhere('fullname', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role') && $request->role !== 'Semua Peran') {
            $query->where('role', $request->role);
        }

        if ($request->filled('status')) {
            if ($request->status == "Aktif") {
                $query->whereNotNull('email_verified_at');
            } else if ($request->status == "Nonaktif") {
                $query->whereNull('email_verified_at');
            }
        }

        $users = $query->latest()->paginate(3)->withQueryString();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'  => 'required|string|max:255|unique:users,username',
            'fullname'  => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email',
            'password'  => 'required|string|min:8',
            'role'      => 'required|in:admin,cashier,user',
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            // Simpan ke folder 'public/photos'
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        User::create([
            'username'          => $request->username,
            'fullname'          => $request->fullname,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'role'              => $request->role,
            'photo'             => $photoPath, // Simpan path foto
            'email_verified_at' => now(),
        ]);

        return redirect()->route('users.index')->with('success', 'Akun berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $currentRole = Auth::user()->role;

        if ($currentRole == 'admin') {
            return view('users.edit', compact('user'));
        } else if ($currentRole == 'cashier') {

            if (Auth::id() == $user->id) {
                return view('kasir.profile.edit', compact('user'));
            } else {
                return redirect()->route('orders.index')->with('error', 'Anda tidak memiliki hak akses untuk mengedit profile ini.');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $currentUserRole = Auth::user()->role;
        $rules = [];
        $data = [];

        if ($currentUserRole == 'admin') {
            $rules = [
                'username'  => 'required|string|max:255|unique:users,username,' . $user->id,
                'fullname'  => 'required|string|max:255',
                'email'     => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'role'      => 'required|in:admin,cashier,user',
                'photo'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'password'  => 'nullable|string|min:8',
            ];

            $data = [
                'username' => $request->username,
                'fullname' => $request->fullname,
                'email'    => $request->email,
                'role'     => $request->role,
            ];
        } else if ($currentUserRole == 'cashier') {
            if (Auth::id() != $user->id) {
                return redirect()->route('orders.index')->with('error', 'Akses Ditolak');
            }

            $rules = [
                'username' => 'required|string|max:255|unique:users,username,' . $user->id,
                'password' => 'nullable|string|min:8',
                'photo'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ];

            $data = [
                'username' => $request->username,
            ];
        }

        $request->validate($rules);

        // Cek jika ada password baru
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Cek jika ada upload foto baru
        if ($request->hasFile('photo')) {
            // 1. Hapus foto lama jika ada
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }
            // 2. Upload foto baru
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $user->update($data);

        if ($currentUserRole == 'admin') {
            return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui!');
        } else {
            return redirect()->route('profile.show', $user->id)->with('success', 'Profil berhasil diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun sendiri di halaman ini.');
        }

        // Hapus foto dari storage sebelum hapus data di DB
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Akun berhasil dihapus.');
    }
}
