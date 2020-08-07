<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CouponController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('coupon-access'), Response::HTTP_FORBIDDEN);

        $coupons = Coupon::latest()->get();

        return view('admin.coupon.index', compact('coupons'));
    }

    public function create()
    {
        abort_if(Gate::denies('coupon-create'), Response::HTTP_FORBIDDEN);

        return view('admin.coupon.create');
    }

    public function store(CouponRequest $request)
    {
        abort_if(Gate::denies('coupon-create'), Response::HTTP_FORBIDDEN);

        Coupon::create($request->all());

        return redirect('/admin/coupon')->with('success', 'Coupon Added Successfully.');
    }

    public function edit(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon-edit'), Response::HTTP_FORBIDDEN);

        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        abort_if(Gate::denies('coupon-edit'), Response::HTTP_FORBIDDEN);

        $coupon->update($request->all());

        return redirect('/admin/coupon')->with('success', 'Coupon Updated Successfully.');
    }

    public function destroy(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon-delete'), Response::HTTP_FORBIDDEN);

        $coupon->delete();

        return back()->with('success', 'Coupon Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;

        Coupon::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function active(Coupon $coupon)
    {
        $coupon->status = true;
        $coupon->save();

        return back()->with('success', 'This coupon is now active.');
    }

    public function inactive(Coupon $coupon)
    {
        $coupon->status = false;
        $coupon->save();

        return back()->with('error', 'This coupon is now inactive.');
    }
}
