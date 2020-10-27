<?php

namespace App\Http\Controllers;

use Dev\Domain\Service\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $brands = $this->brandService->index($request->all());
        return view('adminlte.brands.index', compact('brands'));
    }

}
