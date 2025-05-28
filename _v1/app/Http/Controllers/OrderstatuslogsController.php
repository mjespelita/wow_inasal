<?php

namespace App\Http\Controllers;

use App\Models\{Logs, Orderstatuslogs};
use App\Http\Requests\StoreOrderstatuslogsRequest;
use App\Http\Requests\UpdateOrderstatuslogsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderstatuslogsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orderstatuslogs.orderstatuslogs', [
            'orderstatuslogs' => Orderstatuslogs::where('isTrash', '0')->paginate(10)
        ]);
    }

    public function trash()
    {
        return view('orderstatuslogs.trash-orderstatuslogs', [
            'orderstatuslogs' => Orderstatuslogs::where('isTrash', '1')->paginate(10)
        ]);
    }

    public function restore($orderstatuslogsId)
    {
        /* Log ************************************************** */
        $oldName = Orderstatuslogs::where('id', $orderstatuslogsId)->value('name');
        // Logs::create(['log' => Auth::user()->name.' ('.Auth::user()->role.') restored a Orderstatuslogs "'.$oldName.'".']);
        /******************************************************** */

        Orderstatuslogs::where('id', $orderstatuslogsId)->update(['isTrash' => '0']);

        return redirect('/orderstatuslogs');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orderstatuslogs.create-orderstatuslogs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderstatuslogsRequest $request)
    {
        Orderstatuslogs::create(['orders_id' => $request->orders_id,'orders_users_id' => $request->orders_users_id,'users_id' => $request->users_id,'status' => $request->status]);

        /* Log ************************************************** */
        // Logs::create(['log' => Auth::user()->name.' created a new Orderstatuslogs '.'"'.$request->name.'"']);
        /******************************************************** */

        return back()->with('success', 'Orderstatuslogs Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orderstatuslogs $orderstatuslogs, $orderstatuslogsId)
    {
        return view('orderstatuslogs.show-orderstatuslogs', [
            'item' => Orderstatuslogs::where('id', $orderstatuslogsId)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orderstatuslogs $orderstatuslogs, $orderstatuslogsId)
    {
        return view('orderstatuslogs.edit-orderstatuslogs', [
            'item' => Orderstatuslogs::where('id', $orderstatuslogsId)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderstatuslogsRequest $request, Orderstatuslogs $orderstatuslogs, $orderstatuslogsId)
    {
        /* Log ************************************************** */
        $oldName = Orderstatuslogs::where('id', $orderstatuslogsId)->value('name');
        // Logs::create(['log' => Auth::user()->name.' updated a Orderstatuslogs from "'.$oldName.'" to "'.$request->name.'".']);
        /******************************************************** */

        Orderstatuslogs::where('id', $orderstatuslogsId)->update(['orders_id' => $request->orders_id,'orders_users_id' => $request->orders_users_id,'users_id' => $request->users_id,'status' => $request->status]);

        return back()->with('success', 'Orderstatuslogs Updated Successfully!');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(Orderstatuslogs $orderstatuslogs, $orderstatuslogsId)
    {
        return view('orderstatuslogs.delete-orderstatuslogs', [
            'item' => Orderstatuslogs::where('id', $orderstatuslogsId)->first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orderstatuslogs $orderstatuslogs, $orderstatuslogsId)
    {

        /* Log ************************************************** */
        $oldName = Orderstatuslogs::where('id', $orderstatuslogsId)->value('name');
        // Logs::create(['log' => Auth::user()->name.' deleted a Orderstatuslogs "'.$oldName.'".']);
        /******************************************************** */

        Orderstatuslogs::where('id', $orderstatuslogsId)->update(['isTrash' => '1']);

        return redirect('/orderstatuslogs');
    }

    public function bulkDelete(Request $request) {

        foreach ($request->ids as $value) {

            /* Log ************************************************** */
            $oldName = Orderstatuslogs::where('id', $value)->value('name');
            // Logs::create(['log' => Auth::user()->name.' deleted a Orderstatuslogs "'.$oldName.'".']);
            /******************************************************** */

            $deletable = Orderstatuslogs::find($value);
            $deletable->delete();
        }
        return response()->json("Deleted");
    }

    public function bulkMoveToTrash(Request $request) {

        foreach ($request->ids as $value) {

            /* Log ************************************************** */
            $oldName = Orderstatuslogs::where('id', $value)->value('name');
            // Logs::create(['log' => Auth::user()->name.' ('.Auth::user()->role.') deleted a Orderstatuslogs "'.$oldName.'".']);
            /******************************************************** */

            $deletable = Orderstatuslogs::find($value);
            $deletable->update(['isTrash' => '1']);
        }
        return response()->json("Deleted");
    }

    public function bulkRestore(Request $request)
    {
        foreach ($request->ids as $value) {

            /* Log ************************************************** */
            $oldName = Orderstatuslogs::where('id', $value)->value('name');
            Logs::create(['log' => Auth::user()->name.' ('.Auth::user()->role.') restored a Orderstatuslogs "'.$oldName.'".']);
            /******************************************************** */

            $restorable = Orderstatuslogs::find($value);
            $restorable->update(['isTrash' => '0']);
        }
        return response()->json("Restored");
    }
}