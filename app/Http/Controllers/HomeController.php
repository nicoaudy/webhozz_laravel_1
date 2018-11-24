<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
		$title = 'Dashboard';
		
		$prod = Product::all();
		$lava = new Lavacharts; // See note below for Laravel
        $products  = $lava->DataTable();
		$products->addStringColumn('Date')->addNumberColumn('Products Total...');
		foreach ($prod as $row) {
			$products->addRow([
				Carbon::parse($row->created_at)->format('d-m-Y'), $row->stock
			]);
		}
        $lava->BarChart('products_total', $products)->setOptions(['orientation' => 'horizontal']);


        return view('home', compact('title', 'lava'));
    }
}
