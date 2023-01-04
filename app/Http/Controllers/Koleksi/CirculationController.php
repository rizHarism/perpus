<?php

namespace App\Http\Controllers\Koleksi;

use App\Http\Controllers\Controller;
use App\Models\Koleksi\CollectionLoanItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Koleksi\Collection;
use App\Models\Koleksi\Catalog;
use App\Models\Koleksi\JobStatus;
use App\Models\Koleksi\LocationLibrary;
use Symfony\Component\HttpFoundation\Response;

class CirculationController extends Controller
{
    //
    public function CirculationCatalogue()
    {

        $location_library = LocationLibrary::orderBy('ID', 'asc')->get();
        $catalogLoan = DB::table('collectionloanitems')
            ->select('collectionloanitems.ID', 'catalogs.ID')
            ->join('collections', 'collections.ID', '=', 'collectionloanitems.Collection_id')
            ->join('catalogs', 'catalogs.ID', '=', 'collections.Catalog_id')
            ->where('collectionloanitems.LoanStatus', '=', 'Loan')
            ->groupBy('catalogs.ID')
            ->get();
        $collectionLoan = DB::table('collectionloanitems')->where('LoanStatus', '=', 'Loan')->get();

        $response = [
            'message' => 'Data Sirkulasi Catalog dan Koleksi',
            'katalog' => count($catalogLoan),
            'koleksi' => count($collectionLoan),
            'location_library' => $location_library
        ];

        return view('inlislite.sirkulasi.catalog.index', $response);
    }

    public function CirculationCatalogueFilter($req)
    {
        $_req = explode(',', $req);
        if ($_req[0] == 0) {
            // dd('koselamse');
            $title = 'Data Sirkulasi Katalog Tahun Terbit ' . $_req[1] . ' s/d ' . $_req[2] . ' Keseluruhan';
            $catalogLoan = DB::table('collectionloanitems')
                ->select('collectionloanitems.ID', 'catalogs.ID')
                ->join('collections', 'collections.ID', '=', 'collectionloanitems.Collection_id')
                ->join('catalogs', 'catalogs.ID', '=', 'collections.Catalog_id')
                ->where('collectionloanitems.LoanStatus', '=', 'Loan')
                ->where('catalogs.PublishYear', '>=', $_req[1])->where('catalogs.PublishYear', '<=', $_req[2])
                ->groupBy('catalogs.ID')
                ->get();
            $collectionLoan = DB::table('collectionloanitems')
                ->select('collectionloanitems.ID', 'catalogs.ID')
                ->join('collections', 'collections.ID', '=', 'collectionloanitems.Collection_id')
                ->join('catalogs', 'catalogs.ID', '=', 'collections.Catalog_id')
                ->where('collectionloanitems.LoanStatus', '=', 'Loan')
                ->where('catalogs.PublishYear', '>=', $_req[1])->where('catalogs.PublishYear', '<=', $_req[2])
                ->groupBy('collectionloanitems.ID')
                ->get();
        } else {
            $location_library = LocationLibrary::where('ID', $_req[0])->pluck('Name');
            $title = 'Data Sirkulasi Katalog Tahun Terbit ' . $_req[1] . ' s/d ' . $_req[2] . ' di ' . $location_library[0];
            $catalogLoan = DB::table('collectionloanitems')
                ->select('collectionloanitems.ID', 'catalogs.ID')
                ->join('collections', 'collections.ID', '=', 'collectionloanitems.Collection_id')
                ->join('catalogs', 'catalogs.ID', '=', 'collections.Catalog_id')
                ->where('collectionloanitems.LoanStatus', '=', 'Loan')
                ->where('collections.Location_Library_id', '=', $_req[0])
                ->where('catalogs.PublishYear', '>=', $_req[1])->where('catalogs.PublishYear', '<=', $_req[2])
                ->groupBy('catalogs.ID')
                ->get();
            $collectionLoan = DB::table('collectionloanitems')
                ->select('collectionloanitems.ID', 'catalogs.ID')
                ->join('collections', 'collections.ID', '=', 'collectionloanitems.Collection_id')
                ->join('catalogs', 'catalogs.ID', '=', 'collections.Catalog_id')
                ->where('collectionloanitems.LoanStatus', '=', 'Loan')
                ->where('collections.Location_Library_id', '=', $_req[0])
                ->where('catalogs.PublishYear', '>=', $_req[1])->where('catalogs.PublishYear', '<=', $_req[2])
                ->groupBy('collectionloanitems.ID')
                ->get();
        }



        $response = [
            'title' => $title,
            'katalog' => count($catalogLoan),
            'koleksi' => count($collectionLoan),
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function circulationKlas()
    {
        // contoh filter tahun terbit dan lokasi library
        // $contoh = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
        //     $q->where('DeweyNo', '>=', '0')->where('DeweyNo', '<=', '099')
        //         ->where('PublishYear', '<=', '2023')->where('PublishYear', '>=', '1900');
        // })->whereHas('collection.location_library', function ($q) {
        //     $q->where('ID', '=', '6');
        // })->get());

        // dd($contoh);

        $location_library = LocationLibrary::orderBy('ID', 'asc')->get();

        $klas0 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '000')->where('DeweyNo', '<=', '099');
        })->get());
        $klas1 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '100')->where('DeweyNo', '<=', '199');
        })->get());
        $klas2 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '200')->where('DeweyNo', '<=', '299');
        })->get());
        $klas3 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '300')->where('DeweyNo', '<=', '399');
        })->get());
        $klas4 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '400')->where('DeweyNo', '<=', '499');
        })->get());
        $klas5 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '500')->where('DeweyNo', '<=', '599');
        })->get());
        $klas6 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '600')->where('DeweyNo', '<=', '699');
        })->get());
        $klas7 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '700')->where('DeweyNo', '<=', '799');
        })->get());
        $klas8 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '800')->where('DeweyNo', '<=', '899');
        })->get());
        $klas9 = count(CollectionLoanItem::with('collection', 'collection.catalog')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
            $q->where('DeweyNo', '>=', '900')->where('DeweyNo', '<=', '999.999');
        })->get());

        // $catalogue = count(Catalog::get());

        $response = [
            'message' => 'Data Klas DDC Sirkulasi',
            'location_library' => $location_library,
            'klas0' => $klas0,
            'klas1' => $klas1,
            'klas2' => $klas2,
            'klas3' => $klas3,
            'klas4' => $klas4,
            'klas5' => $klas5,
            'klas6' => $klas6,
            'klas7' => $klas7,
            'klas8' => $klas8,
            'klas9' => $klas9,
        ];

        return view('inlislite.sirkulasi.klasddc.index', $response);
    }

    public function circulationKlasFilter($req)
    {
        // contoh filter tahun terbit dan lokasi library
        // $contoh = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) {
        //     $q->where('DeweyNo', '>=', '0')->where('DeweyNo', '<=', '099')
        //         ->where('PublishYear', '<=', '2023')->where('PublishYear', '>=', '1900');
        // })->whereHas('collection.location_library', function ($q) {
        //     $q->where('ID', '=', '6');
        // })->get());

        $_req = explode(',', $req);
        if ($_req[0] == 0) {
            $klas0 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '000')->where('DeweyNo', '<=', '099')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
            $klas1 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '100')->where('DeweyNo', '<=', '199')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
            $klas2 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '200')->where('DeweyNo', '<=', '299')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
            $klas3 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '300')->where('DeweyNo', '<=', '399')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
            $klas4 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '400')->where('DeweyNo', '<=', '499')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
            $klas5 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '500')->where('DeweyNo', '<=', '599')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
            $klas6 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '600')->where('DeweyNo', '<=', '699')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
            $klas7 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '700')->where('DeweyNo', '<=', '799')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
            $klas8 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '800')->where('DeweyNo', '<=', '899')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
            $klas9 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '900')->where('DeweyNo', '<=', '999')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->get());
        } else {
            $klas0 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '000')->where('DeweyNo', '<=', '099')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
            $klas1 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '100')->where('DeweyNo', '<=', '199')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
            $klas2 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '200')->where('DeweyNo', '<=', '299')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
            $klas3 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '300')->where('DeweyNo', '<=', '399')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
            $klas4 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '400')->where('DeweyNo', '<=', '499')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
            $klas5 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '500')->where('DeweyNo', '<=', '599')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
            $klas6 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '600')->where('DeweyNo', '<=', '699')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
            $klas7 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '700')->where('DeweyNo', '<=', '799')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
            $klas8 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '800')->where('DeweyNo', '<=', '899')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
            $klas9 = count(CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($q) use ($_req) {
                $q->where('DeweyNo', '>=', '900')->where('DeweyNo', '<=', '999')
                    ->where('PublishYear', '<=', $_req[2])->where('PublishYear', '>=', $_req[1]);
            })->whereHas('collection.location_library', function ($q) use ($_req) {
                $q->where('ID', '=', $_req[0]);
            })->get());
        }

        $response = [
            'message' => 'Data Klas DDC Sirkulasi',
            'klas0' => $klas0,
            'klas1' => $klas1,
            'klas2' => $klas2,
            'klas3' => $klas3,
            'klas4' => $klas4,
            'klas5' => $klas5,
            'klas6' => $klas6,
            'klas7' => $klas7,
            'klas8' => $klas8,
            'klas9' => $klas9,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function circulationMember()
    {
        $location_library = LocationLibrary::orderBy('ID', 'asc')->get();
        $job_status = JobStatus::orderBy('ID', 'asc')->get();
        $memberLoan = count(CollectionLoanItem::where('LoanStatus', 'Loan')->groupBy('member_id')->get());
        $memberLoanBlitar = count(CollectionLoanItem::with('member')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where('cityNow', 'LIKE', '%blitar%')->where('cityNow', 'NOT LIKE', '%kabupaten%');
        })->groupBy('member_id')
            ->get());
        $memberLoanNonBlitar = $memberLoan - $memberLoanBlitar;
        $memberLoanMale = count(CollectionLoanItem::with('member')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where('Sex_id', '1');
        })->groupBy('member_id')
            ->get());
        $memberLoanFemale = $memberLoan - $memberLoanMale;

        $response = [
            'message' => 'Data Sirkulasi Pemustaka',
            'location_library' => $location_library,
            'job_status' => $job_status,
            'memberLoan' => $memberLoan,
            'memberLoanBlitar' => $memberLoanBlitar,
            'memberLoanNonBlitar' => $memberLoanNonBlitar,
            'memberLoanMale' => $memberLoanMale,
            'memberLoanFemale' => $memberLoanFemale,
        ];
        // dd($response);
        return view('inlislite.sirkulasi.member.index', $response);
    }

    public function circulationMemberFilter($data)
    {
        $_data = explode(',', $data);
        $lokasi = $_data[0];
        $year1 = $_data[1];
        $year2 = $_data[2];

        // get total member on loan with filter
        $memberLoan = CollectionLoanItem::with('collection', 'collection.catalog', 'collection.location_library',)
            ->where('LoanStatus', 'Loan')->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
                $query->whereBetween('PublishYear', [$year1, $year2]);
            })
            ->groupBy('member_id');

        $memberLoan->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });
        $_memberLoan = count($memberLoan->get());

        // get  member on loan with address blitar city or not with filter
        $memberLoanBlitar = CollectionLoanItem::with('member', 'collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where('cityNow', 'LIKE', '%blitar%')->where('cityNow', 'NOT LIKE', '%kabupaten%');
        })->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
            $query->whereBetween('PublishYear', [$year1, $year2]);
        })
            ->groupBy('member_id');
        $memberLoanBlitar->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });
        $_memberLoanBlitar =  count($memberLoanBlitar->get());
        $_memberLoanNonBlitar = $_memberLoan - $_memberLoanBlitar;

        // get  member on loan gender male or female with filter
        $memberLoanMale = CollectionLoanItem::with('member', 'collection', 'collection.catalog', 'collection.location_library')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where('Sex_id', '1');
        })->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
            $query->whereBetween('PublishYear', [$year1, $year2]);
        })->groupBy('member_id');
        $memberLoanMale->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });
        $_memberLoanMale = count($memberLoanMale->get());
        $_memberLoanFemale = $_memberLoan - $_memberLoanMale;

        $response = [
            'message' => 'Data Sirkulasi Pustakawan',
            'memberLoan' => $_memberLoan,
            'memberLoanBlitar' => $_memberLoanBlitar,
            'memberLoanNonBlitar' => $_memberLoanNonBlitar,
            'memberLoanMale' => $_memberLoanMale,
            'memberLoanFemale' => $_memberLoanFemale,
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function circulationUsia()
    {

        $location_library = LocationLibrary::orderBy('ID', 'asc')->get();
        $member_anak = count(CollectionLoanItem::with('member')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 6);
        })->groupBy('member_id')
            ->get());
        $member_sd = count(CollectionLoanItem::with('member')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 7)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 12);
        })->groupBy('member_id')
            ->get());
        $member_smp = count(CollectionLoanItem::with('member')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 13)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 15);
        })->groupBy('member_id')
            ->get());
        $member_sma = count(CollectionLoanItem::with('member')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 16)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 18);
        })->groupBy('member_id')
            ->get());
        $member_remaja = count(CollectionLoanItem::with('member')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 19)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 23);
        })->groupBy('member_id')
            ->get());
        $member_dewasa = count(CollectionLoanItem::with('member')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 24)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 59);
        })->groupBy('member_id')
            ->get());
        $member_lansia = count(CollectionLoanItem::with('member')->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 60);
        })->groupBy('member_id')
            ->get());

        $response = [
            'message' => 'Data Sirkulasi Berdasarkan Usia Pemustaka',
            'location_library' => $location_library,
            'member_anak' => $member_anak,
            'member_sd' => $member_sd,
            'member_smp' => $member_smp,
            'member_sma' => $member_sma,
            'member_remaja' => $member_remaja,
            'member_dewasa' => $member_dewasa,
            'member_lansia' => $member_lansia,
        ];

        return view('inlislite.sirkulasi.usia.index', $response);
    }

    public function circulationUsiaFilter($data)
    {

        $_data = explode(',', $data);
        $lokasi = $_data[0];
        $year1 = $_data[1];
        $year2 = $_data[2];

        $member_anak = CollectionLoanItem::with('member', 'collection.location_library', 'collection.catalog')->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
            $query->whereBetween('PublishYear', [$year1, $year2]);
        })->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 6);
        })->groupBy('member_id');
        $member_anak->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });
        $member_sd = CollectionLoanItem::with('member', 'collection.location_library', 'collection.catalog')->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
            $query->whereBetween('PublishYear', [$year1, $year2]);
        })->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 7)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 12);
        })->groupBy('member_id');
        $member_sd->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });
        $member_smp = CollectionLoanItem::with('member', 'collection.location_library', 'collection.catalog')->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
            $query->whereBetween('PublishYear', [$year1, $year2]);
        })->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 13)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 15);
        })->groupBy('member_id');
        $member_smp->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });
        $member_sma = CollectionLoanItem::with('member', 'collection.location_library', 'collection.catalog')->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
            $query->whereBetween('PublishYear', [$year1, $year2]);
        })->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 16)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 18);
        })->groupBy('member_id');
        $member_sma->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });
        $member_remaja = CollectionLoanItem::with('member', 'collection.location_library', 'collection.catalog')->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
            $query->whereBetween('PublishYear', [$year1, $year2]);
        })->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 19)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 23);
        })->groupBy('member_id');
        $member_remaja->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });
        $member_dewasa = CollectionLoanItem::with('member', 'collection.location_library', 'collection.catalog')->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
            $query->whereBetween('PublishYear', [$year1, $year2]);
        })->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 24)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 59);
        })->groupBy('member_id');
        $member_dewasa->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });
        $member_lansia = CollectionLoanItem::with('member', 'collection.location_library', 'collection.catalog')->whereHas('collection.catalog', function ($query) use ($year1, $year2) {
            $query->whereBetween('PublishYear', [$year1, $year2]);
        })->where('LoanStatus', 'Loan')->whereHas('member', function ($q) {
            $q->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 60);
        })->groupBy('member_id');
        $member_lansia->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->whereHas('collection.location_library', function ($query) use ($lokasi) {
                $query->where('ID', $lokasi);
            });
        });

        $response = [
            'message' => 'Data Sirkulasi Berdasarkan Usia Pemustaka',
            'member_anak' => count($member_anak->get()),
            'member_sd' => count($member_sd->get()),
            'member_smp' => count($member_smp->get()),
            'member_sma' => count($member_sma->get()),
            'member_remaja' => count($member_remaja->get()),
            'member_dewasa' => count($member_dewasa->get()),
            'member_lansia' => count($member_lansia->get()),
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function circulationPekerjaan()
    {
        $location_library = LocationLibrary::orderBy('ID', 'asc')->get();
        $sirkulasi = DB::table('members')
            ->select('collectionloanitems.ID', 'collectionloanitems.member_id', 'members.Job_id')
            ->join('collectionloanitems', 'members.id', '=', 'collectionloanitems.member_id')
            ->where('LoanStatus', '=', 'Loan')
            ->groupBy('collectionloanitems.member_id')
            ->orderBy('members.id', 'asc');

        $result = DB::table('master_pekerjaan')
            ->select('master_pekerjaan.id', 'master_pekerjaan.Pekerjaan', DB::raw('count(sirkulasi.Job_id) as total'))
            ->joinSub($sirkulasi, 'sirkulasi', function ($join) {
                $join->on('master_pekerjaan.id', '=', 'sirkulasi.Job_id');
            })->groupBy('master_pekerjaan.Pekerjaan')->orderBy('master_pekerjaan.ID')->get();

        $response = [
            'location_library' => $location_library,
            'message' => 'Data Status Pekerjaan Pemustaka Pada Sirkulasi Koleksi',
            'result' => $result,
        ];

        return view('inlislite.sirkulasi.pekerjaan.index', $response);
    }

    public function circulationPekerjaanFilter($data)
    {
        $_data = explode(',', $data);
        $lokasi = $_data[0];
        $year1 = $_data[1];
        $year2 = $_data[2];
        $sirkulasi = DB::table('members')
            ->select('collectionloanitems.ID', 'collectionloanitems.member_id', 'members.Job_id', 'collections.Location_Library_id')
            ->leftjoin('collectionloanitems', 'members.id', '=', 'collectionloanitems.member_id')
            ->leftjoin('collections', 'collections.id', '=', 'collectionloanitems.Collection_id')
            ->leftjoin('catalogs', 'catalogs.id', '=', 'collections.Catalog_id')
            ->where('LoanStatus', '=', 'Loan')
            ->whereBetween('PublishYear', [$year1, $year2]);
        $sirkulasi->when($lokasi !== "0", function ($query) use ($lokasi) {
            return $query->where('collections.Location_Library_id', $lokasi);
        })->groupBy('collectionloanitems.member_id')
            ->orderBy('members.id', 'asc');
        $result = DB::table('master_pekerjaan')
            ->select('master_pekerjaan.id', 'master_pekerjaan.Pekerjaan', DB::raw('count(sirkulasi.Job_id) as total'))
            ->leftjoinSub($sirkulasi, 'sirkulasi', function ($join) {
                $join->on('master_pekerjaan.id', '=', 'sirkulasi.Job_id');
            })->groupBy('master_pekerjaan.Pekerjaan')->orderBy('master_pekerjaan.ID');

        $response = [
            'message' => 'Data Status Pekerjaan Pemustaka Pada Sirkulasi Koleksi',
            'result' => $result->get(),
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
