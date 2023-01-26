<?php

namespace App\Http\Controllers\Koleksi;

use App\Http\Controllers\Controller;
use App\Models\Koleksi\Catalog;
use App\Models\Koleksi\Collection;
use App\Models\Koleksi\CollectionLoanItem;
use App\Models\Koleksi\Location;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    //
    public function collectionCatalogue()
    {
        $collection = count(Collection::get());
        $catalogue = count(Catalog::get());

        $response = [
            'message' => 'Data Katalog dan Koleksi',
            'collection' => $collection,
            'catalogue' => $catalogue
        ];

        return view('inlislite.koleksi.catalog.index', $response);
    }

    public function collectionCatalogueFilter($years)
    {
        $year = explode(",", $years);
        $collection = Collection::whereHas('catalog', function ($q) use ($year) {
            $q->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $catalogue = Catalog::where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();

        $response = [
            'title' => 'Data Katalog Tahun Terbit ' . $year[0] . ' s/d ' . $year[1],
            'koleksi' => count($collection),
            'katalog' => count($catalogue)
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function collectionKlas()
    {
        $klas0 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '0')->where('DeweyNo', '<=', '099');
        })->get();
        $klas1 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '100')->where('DeweyNo', '<=', '199');
        })->get();
        $klas2 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '200')->where('DeweyNo', '<=', '299');
        })->get();
        $klas3 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '300')->where('DeweyNo', '<=', '399');
        })->get();
        $klas4 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '400')->where('DeweyNo', '<=', '499');
        })->get();
        $klas5 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '500')->where('DeweyNo', '<=', '599');
        })->get();
        $klas6 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '600')->where('DeweyNo', '<=', '699');
        })->get();
        $klas7 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '700')->where('DeweyNo', '<=', '799');
        })->get();
        $klas8 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '800')->where('DeweyNo', '<=', '899');
        })->get();
        $klas9 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '900')->where('DeweyNo', '<=', '999.999');
        })->get();

        // $catalogue = count(Catalog::get());

        $response = [
            'message' => 'Data Klas DDC',
            'klas0' => count($klas0),
            'klas1' => count($klas1),
            'klas2' => count($klas2),
            'klas3' => count($klas3),
            'klas4' => count($klas4),
            'klas5' => count($klas5),
            'klas6' => count($klas6),
            'klas7' => count($klas7),
            'klas8' => count($klas8),
            'klas9' => count($klas9),
        ];

        return view('inlislite.koleksi.klasddc.index', $response);
    }

    public function collectionKlasFilter($years)
    {
        $year = explode(",", $years);
        $klas0 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '0')->where('DeweyNo', '<=', '099')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $klas1 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '100')->where('DeweyNo', '<=', '199')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $klas2 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '200')->where('DeweyNo', '<=', '299')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $klas3 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '300')->where('DeweyNo', '<=', '399')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $klas4 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '400')->where('DeweyNo', '<=', '499')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $klas5 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '500')->where('DeweyNo', '<=', '599')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $klas6 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '600')->where('DeweyNo', '<=', '699')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $klas7 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '700')->where('DeweyNo', '<=', '799')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $klas8 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '800')->where('DeweyNo', '<=', '899')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $klas9 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '900')->where('DeweyNo', '<=', '999.999')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();

        // $catalogue = count(Catalog::get());

        $response = [
            'title' => 'Data Klas DDC Tahun Terbit ' . $year[0] . ' s/d ' . $year[1],
            'klas0' => count($klas0),
            'klas1' => count($klas1),
            'klas2' => count($klas2),
            'klas3' => count($klas3),
            'klas4' => count($klas4),
            'klas5' => count($klas5),
            'klas6' => count($klas6),
            'klas7' => count($klas7),
            'klas8' => count($klas8),
            'klas9' => count($klas9),
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function collectionSource()
    {
        $result = DB::connection('inlislite')->table('collectionsources')
            ->select('collectionsources.Code', 'collectionsources.Name', DB::raw('count(collections.Source_id) as total'))
            ->leftjoin('collections', 'collectionsources.ID', '=', 'collections.Source_id')
            ->groupBy('collectionsources.Name')
            ->orderBy('collectionsources.ID', 'asc')
            ->get();

        $response = [
            'message' => 'Data Sumber Koleksi',
            'result' => $result
        ];

        return view('inlislite.koleksi.source.index', $response);
    }

    public function collectionSourceFilter($years)
    {
        $year = explode(',', $years);
        $result = DB::connection('inlislite')->table('collectionsources')
            ->select('collectionsources.Code', 'collectionsources.Name', DB::raw('count(collections.Source_id) as total'))
            ->leftjoin('collections', 'collectionsources.ID', '=', 'collections.Source_id')
            ->leftJoin('catalogs', 'collections.Catalog_id', '=', 'catalogs.ID')
            ->where('catalogs.PublishYear', '>=', $year[0])->where('catalogs.PublishYear', '<=', $year[1])
            ->groupBy('collectionsources.Name')
            ->orderBy('collectionsources.ID', 'asc')
            ->get();

        $response = [
            'title' => 'Data Sumber Koleksi ' . $year[0] . ' s/d ' . $year[1],
            'result' => $result
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function collectionLocation()
    {

        $result = DB::connection('inlislite')->table('locations')
            ->select('locations.ID', 'locations.Name', DB::raw('count(collections.Location_id) as total'))
            ->leftjoin('collections', 'locations.ID', '=', 'collections.Location_id')
            ->groupBy('locations.Name')
            ->orderBy('locations.Name', 'desc')
            ->get();

        $response = [
            'message' => 'Data Lokasi Koleksi',
            'result' => $result,
        ];

        return view('inlislite.koleksi.location.index', $response);
    }

    public function collectionLocationFilter($years)
    {
        $year = explode(',', $years);
        $result = DB::connection('inlislite')->table('locations')
            ->select('locations.ID', 'locations.Name', DB::raw('count(collections.Location_id) as total'))
            ->leftjoin('collections', 'locations.ID', '=', 'collections.Location_id')
            ->leftjoin('catalogs', 'catalogs.ID', '=', 'collections.Catalog_id')
            ->where('catalogs.PublishYear', '>=', $year[0])->where('catalogs.PublishYear', '<=', $year[1])
            ->groupBy('locations.Name')
            ->orderBy('locations.Name', 'desc')
            ->get();

        $response = [
            'title' => 'Data Lokasi Koleksi ' . $year[0] . ' s/d ' . $year[1],
            'result' => $result,
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
