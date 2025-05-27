<?php

namespace App\Http\Controllers;

use App\Models\{Logs, Discounts};
use App\Http\Requests\StoreDiscountsRequest;
use App\Http\Requests\UpdateDiscountsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('discounts.discounts', [
            'discounts' => Discounts::where('isTrash', '0')->paginate(10)
        ]);
    }

    public function trash()
    {
        return view('discounts.trash-discounts', [
            'discounts' => Discounts::where('isTrash', '1')->paginate(10)
        ]);
    }

    public function restore($discountsId)
    {
        /* Log ************************************************** */
        $oldName = Discounts::where('id', $discountsId)->value('name');
        // Logs::create(['log' => Auth::user()->name.' ('.Auth::user()->role.') restored a Discounts "'.$oldName.'".']);
        /******************************************************** */

        Discounts::where('id', $discountsId)->update(['isTrash' => '0']);

        return redirect('/discounts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discounts.create-discounts');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscountsRequest $request)
    {
        Discounts::create(['users_id' => $request->users_id,'name' => $request->name,'discount' => $request->discount]);

        /* Log ************************************************** */
        // Logs::create(['log' => Auth::user()->name.' created a new Discounts '.'"'.$request->name.'"']);
        /******************************************************** */

        return back()->with('success', 'Discounts Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discounts $discounts, $discountsId)
    {
        return view('discounts.show-discounts', [
            'item' => Discounts::where('id', $discountsId)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discounts $discounts, $discountsId)
    {
        return view('discounts.edit-discounts', [
            'item' => Discounts::where('id', $discountsId)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountsRequest $request, Discounts $discounts, $discountsId)
    {
        /* Log ************************************************** */
        $oldName = Discounts::where('id', $discountsId)->value('name');
        // Logs::create(['log' => Auth::user()->name.' updated a Discounts from "'.$oldName.'" to "'.$request->name.'".']);
        /******************************************************** */

        Discounts::where('id', $discountsId)->update(['users_id' => $request->users_id,'name' => $request->name,'discount' => $request->discount]);

        return back()->with('success', 'Discounts Updated Successfully!');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(Discounts $discounts, $discountsId)
    {
        return view('discounts.delete-discounts', [
            'item' => Discounts::where('id', $discountsId)->first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discounts $discounts, $discountsId)
    {

        /* Log ************************************************** */
        $oldName = Discounts::where('id', $discountsId)->value('name');
        // Logs::create(['log' => Auth::user()->name.' deleted a Discounts "'.$oldName.'".']);
        /******************************************************** */

        Discounts::where('id', $discountsId)->update(['isTrash' => '1']);

        return redirect('/discounts');
    }

    public function bulkDelete(Request $request) {

        foreach ($request->ids as $value) {

            /* Log ************************************************** */
            $oldName = Discounts::where('id', $value)->value('name');
            // Logs::create(['log' => Auth::user()->name.' deleted a Discounts "'.$oldName.'".']);
            /******************************************************** */

            $deletable = Discounts::find($value);
            $deletable->delete();
        }
        return response()->json("Deleted");
    }

    public function bulkMoveToTrash(Request $request) {

        foreach ($request->ids as $value) {

            /* Log ************************************************** */
            $oldName = Discounts::where('id', $value)->value('name');
            // Logs::create(['log' => Auth::user()->name.' ('.Auth::user()->role.') deleted a Discounts "'.$oldName.'".']);
            /******************************************************** */

            $deletable = Discounts::find($value);
            $deletable->update(['isTrash' => '1']);
        }
        return response()->json("Deleted");
    }

    public function bulkRestore(Request $request)
    {
        foreach ($request->ids as $value) {

            /* Log ************************************************** */
            $oldName = Discounts::where('id', $value)->value('name');
            Logs::create(['log' => Auth::user()->name.' ('.Auth::user()->role.') restored a Discounts "'.$oldName.'".']);
            /******************************************************** */

            $restorable = Discounts::find($value);
            $restorable->update(['isTrash' => '0']);
        }
        return response()->json("Restored");
    }
}