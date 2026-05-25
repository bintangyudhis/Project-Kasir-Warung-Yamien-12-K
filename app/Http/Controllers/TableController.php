<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{
    /**
     * Display all table list
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tables = Table::all();
        $role = Auth::user()->role;

        if($role === 'admin') {
            return view('tables.index', compact('tables'));
        }elseif($role === 'cashier') {
            return view('kasir.table.index', compact('tables'));
        }
    }

    /**
     * Store a newly created table
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'table_number' => 'required|integer|numeric|unique:tables,table_number',
            'capacity' => 'required', 'integer|min:1|numeric'
        ]);

        $table = Table::create([
            'table_number' => $validate['table_number'],
            'capacity' => $validate['capacity'],
        ]);


        ActivityLog::create([
            'activity_type' => 'create',
            'description' => 'Menambahkan meja nomor ' . $table->table_number,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tables.index')
            ->with('success', 'Table created successfully');
    }

    /**
     * Update specified table resource from storage
     *
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $table =  Table::find($id);

        $request->validate([
            'table_number' => [
                'required',
                'string',
                'max:50',

                Rule::unique('tables')->ignore($table->id)
            ],
            'capacity' => 'required', 'integer|min:1',
        ]);


        $table->update($request->all());


        ActivityLog::create([
            'activity_type' => 'update',
            'description' => 'Mengupdate meja nomor ' . $table->table_number,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tables.index')
            ->with('success', 'Table update successfully');
    }

    /**
     * Remove specified table from storage
     *
     *
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $table = Table::find($id);
        $tableNumber = $table->table_number;
        $table->delete();


        ActivityLog::create([
            'activity_type' => 'delete',
            'description' => 'Menghapus meja nomor ' . $tableNumber,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tables.index')
            ->with('success', 'Table deleted successfully');
    }

    /**
     * Show the form for creating new table
     *
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tables.create');
    }

    /**
     * Display specified table
     *
     *
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $table = Table::find($id);

        return view('tables.show', compact('table'));
    }

    /**
     * Show the form for edit category
     *
     *
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $table = Table::find($id);

        return view('tables.edit', compact('table'));
    }


}
