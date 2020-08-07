<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CurrencyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('currency-access'), Response::HTTP_FORBIDDEN);

        $currencies = Currency::latest()->get();

        return view('admin.currency.index', compact('currencies'));
    }

    public function create()
    {
        abort_if(Gate::denies('currency-create'), Response::HTTP_FORBIDDEN);

        return view('admin.currency.create');
    }

    public function store(CurrencyRequest $request)
    {
        abort_if(Gate::denies('currency-create'), Response::HTTP_FORBIDDEN);

        Currency::create($request->all());

        return redirect('/admin/currency')->with('success', 'Currency Added Successfully.');
    }

    public function edit(Currency $currency)
    {
        abort_if(Gate::denies('currency-edit'), Response::HTTP_FORBIDDEN);

        return view('admin.currency.edit', compact('currency'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        abort_if(Gate::denies('currency-edit'), Response::HTTP_FORBIDDEN);

        $currency->update($request->all());

        return redirect('/admin/currency')->with('success', 'Currency Updated Successfully.');
    }

    public function destroy(Currency $currency)
    {
        abort_if(Gate::denies('currency-delete'), Response::HTTP_FORBIDDEN);

        $currency->delete();

        return back()->with('success', 'Currency Deleted Successfully.');
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;

        Currency::whereIn('id', explode(",", $ids))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function active(Currency $currency)
    {
        $currency->status = true;
        $currency->save();

        return back()->with('success', 'This currency is now active.');
    }

    public function inactive(Currency $currency)
    {
        $currency->status = false;
        $currency->save();

        return back()->with('error', 'This currency is now inactive.');
    }
}
