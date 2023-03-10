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
        $collection = count(Collection::select('ID')->get());
        $catalogue = count(Catalog::select('ID')->get());

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
        $collection = Collection::select('ID')->whereHas('catalog', function ($q) use ($year) {
            $q->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();

        $catalogue = Catalog::select('ID')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $response = [
            'title' => 'Data Katalog Tahun Terbit ' . $year[0] . ' s/d ' . $year[1],
            'koleksi' => count($collection),
            'katalog' => count($catalogue)
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function collectionKlas()
    {
        $eks_0 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '0')->where('DeweyNo', '<=', '099');
        })->get();
        $eks_1 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '100')->where('DeweyNo', '<=', '199');
        })->get();
        $eks_2 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '200')->where('DeweyNo', '<=', '299');
        })->get();
        $eks_3 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '300')->where('DeweyNo', '<=', '399');
        })->get();
        $eks_4 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '400')->where('DeweyNo', '<=', '499');
        })->get();
        $eks_5 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '500')->where('DeweyNo', '<=', '599');
        })->get();
        $eks_6 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '600')->where('DeweyNo', '<=', '699');
        })->get();
        $eks_7 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '700')->where('DeweyNo', '<=', '799');
        })->get();
        $eks_8 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '800')->where('DeweyNo', '<=', '899');
        })->get();
        $eks_9 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) {
            $q->where('DeweyNo', '>=', '900')->where('DeweyNo', '<=', '999.999');
        })->get();

        $judul_0 = Catalog::select('id')->where('DeweyNo', '>=', '0')->where('DeweyNo', '<=', '099')->get();
        $judul_1 = Catalog::select('id')->where('DeweyNo', '>=', '100')->where('DeweyNo', '<=', '199')->get();
        $judul_2 = Catalog::select('id')->where('DeweyNo', '>=', '200')->where('DeweyNo', '<=', '299')->get();
        $judul_3 = Catalog::select('id')->where('DeweyNo', '>=', '300')->where('DeweyNo', '<=', '399')->get();
        $judul_4 = Catalog::select('id')->where('DeweyNo', '>=', '400')->where('DeweyNo', '<=', '499')->get();
        $judul_5 = Catalog::select('id')->where('DeweyNo', '>=', '500')->where('DeweyNo', '<=', '599')->get();
        $judul_6 = Catalog::select('id')->where('DeweyNo', '>=', '600')->where('DeweyNo', '<=', '699')->get();
        $judul_7 = Catalog::select('id')->where('DeweyNo', '>=', '700')->where('DeweyNo', '<=', '799')->get();
        $judul_8 = Catalog::select('id')->where('DeweyNo', '>=', '800')->where('DeweyNo', '<=', '899')->get();
        $judul_9 = Catalog::select('id')->where('DeweyNo', '>=', '900')->where('DeweyNo', '<=', '999.99')->get();


        $klas_eks = [
            'eks_0' => count($eks_0),
            'eks_1' => count($eks_1),
            'eks_2' => count($eks_2),
            'eks_3' => count($eks_3),
            'eks_4' => count($eks_4),
            'eks_5' => count($eks_5),
            'eks_6' => count($eks_6),
            'eks_7' => count($eks_7),
            'eks_8' => count($eks_8),
            'eks_9' => count($eks_9),
        ];

        $klas_judul = [
            'judul_0' => count($judul_0),
            'judul_1' => count($judul_1),
            'judul_2' => count($judul_2),
            'judul_3' => count($judul_3),
            'judul_4' => count($judul_4),
            'judul_5' => count($judul_5),
            'judul_6' => count($judul_6),
            'judul_7' => count($judul_7),
            'judul_8' => count($judul_8),
            'judul_9' => count($judul_9),
        ];

        $response = [
            'judul' => $klas_judul,
            'eks' => $klas_eks
        ];

        return view('inlislite.koleksi.klasddc.index', $response);
    }

    public function collectionKlasFilter($years)
    {
        $year = explode(",", $years);
        $eks_0 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '0')->where('DeweyNo', '<=', '099')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $eks_1 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '100')->where('DeweyNo', '<=', '199')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $eks_2 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '200')->where('DeweyNo', '<=', '299')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $eks_3 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '300')->where('DeweyNo', '<=', '399')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $eks_4 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '400')->where('DeweyNo', '<=', '499')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $eks_5 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '500')->where('DeweyNo', '<=', '599')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $eks_6 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '600')->where('DeweyNo', '<=', '699')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $eks_7 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '700')->where('DeweyNo', '<=', '799')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $eks_8 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '800')->where('DeweyNo', '<=', '899')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();
        $eks_9 = Collection::select('id', 'Catalog_id')->whereHas('catalog', function ($q) use ($year) {
            $q->where('DeweyNo', '>=', '900')->where('DeweyNo', '<=', '999.999')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1]);
        })->get();

        $judul_0 = Catalog::select('id')->where('DeweyNo', '>=', '0')->where('DeweyNo', '<=', '099')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $judul_1 = Catalog::select('id')->where('DeweyNo', '>=', '100')->where('DeweyNo', '<=', '199')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $judul_2 = Catalog::select('id')->where('DeweyNo', '>=', '200')->where('DeweyNo', '<=', '299')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $judul_3 = Catalog::select('id')->where('DeweyNo', '>=', '300')->where('DeweyNo', '<=', '399')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $judul_4 = Catalog::select('id')->where('DeweyNo', '>=', '400')->where('DeweyNo', '<=', '499')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $judul_5 = Catalog::select('id')->where('DeweyNo', '>=', '500')->where('DeweyNo', '<=', '599')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $judul_6 = Catalog::select('id')->where('DeweyNo', '>=', '600')->where('DeweyNo', '<=', '699')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $judul_7 = Catalog::select('id')->where('DeweyNo', '>=', '700')->where('DeweyNo', '<=', '799')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $judul_8 = Catalog::select('id')->where('DeweyNo', '>=', '800')->where('DeweyNo', '<=', '899')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();
        $judul_9 = Catalog::select('id')->where('DeweyNo', '>=', '900')->where('DeweyNo', '<=', '999.99')->where('PublishYear', '>=', $year[0])->where('PublishYear', '<=', $year[1])->get();

        $klas_eks = [
            'eks_0' => count($eks_0),
            'eks_1' => count($eks_1),
            'eks_2' => count($eks_2),
            'eks_3' => count($eks_3),
            'eks_4' => count($eks_4),
            'eks_5' => count($eks_5),
            'eks_6' => count($eks_6),
            'eks_7' => count($eks_7),
            'eks_8' => count($eks_8),
            'eks_9' => count($eks_9),
        ];

        $klas_judul = [
            'judul_0' => count($judul_0),
            'judul_1' => count($judul_1),
            'judul_2' => count($judul_2),
            'judul_3' => count($judul_3),
            'judul_4' => count($judul_4),
            'judul_5' => count($judul_5),
            'judul_6' => count($judul_6),
            'judul_7' => count($judul_7),
            'judul_8' => count($judul_8),
            'judul_9' => count($judul_9),
        ];

        $response = [
            'judul' => $klas_judul,
            'eks' => $klas_eks
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function collectionSource()
    {
        $katalog = DB::connection('inlislite')->table('catalogs')
            ->select('catalogs.ID as catalog_id', 'collections.ID as collection_id', 'collections.Source_id as source_id')
            ->leftjoin('collections', 'collections.Catalog_id', '=', 'catalogs.ID')
            ->groupBy('catalogs.ID');

        $result_judul = DB::connection('inlislite')->table('collectionsources')
            ->select('collectionsources.Code', 'collectionsources.Name', DB::raw('count(catalogs.source_id) as total'))
            ->leftjoinSub($katalog, 'catalogs', function ($join) {
                $join->on('collectionsources.ID', '=', 'catalogs.source_id');
            })->groupBy('collectionsources.Name')->get();

        $result_eks = DB::connection('inlislite')->table('collectionsources')
            ->select('collectionsources.Code', 'collectionsources.Name', DB::raw('count(collections.Source_id) as total'))
            ->leftjoin('collections', 'collectionsources.ID', '=', 'collections.Source_id')
            ->groupBy('collectionsources.Name')
            ->orderBy('collectionsources.ID', 'asc')
            ->get();

        $response = [
            'message' => 'Data Sumber Koleksi',
            'result_judul' => $result_judul,
            'result_eks' => $result_eks
        ];

        return view('inlislite.koleksi.source.index', $response);
    }

    public function collectionSourceFilter($years)
    {
        $year = explode(',', $years);
        $result = DB::connection('inlislite')->table('collectionsources')
            ->select('collectionsources.Code', 'collectionsources.Name', DB::raw('count(collections.Source_id) as total'))
            ->leftjoin('collections', 'collectionsources.ID', '=', 'collections.Source_id')
            ->leftjoin('catalogs', 'collections.Catalog_id', '=', 'catalogs.ID')
            ->where('catalogs.PublishYear', '>=', $year[0])->where('catalogs.PublishYear', '<=', $year[1])
            ->groupBy('collectionsources.Name')
            ->orderBy('collectionsources.ID', 'asc')
            ->get();
        // $catalogue = DB::connection('inlislite')->table('catalogs')->select('id')->where('catalogs.PublishYear', '>=', $year[0])->where('catalogs.PublishYear', '<=', $year[1]);
        // $result = DB::connection('inlislite')->table('collectionsources')
        //     ->select('collectionsources.Code', 'collectionsources.Name', DB::raw('count(collections.Source_id) as total'))
        //     ->leftjoin('collections', 'collectionsources.ID', '=', 'collections.Source_id')
        //     ->leftjoinSub($catalogue, 'catalogs', function ($join) {
        //         $join->on('collections.Catalog_id', '=', 'catalogs.ID');
        //     })->groupBy('collectionsources.Name')->orderby('collectionsources.ID')->get();

        // dd($result);

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
