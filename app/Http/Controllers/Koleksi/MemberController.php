<?php

namespace App\Http\Controllers\Koleksi;

use App\Http\Controllers\Controller;
use App\Models\Koleksi\CollectionLoanItem;
use App\Models\Koleksi\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class MemberController extends Controller
{
    //
    public function memberUmum()
    {
        $total_member = count(Member::get());
        $member_male = count(Member::where('Sex_id', '1')->get());
        $member_blitar = count(Member::where('cityNow', 'Like', '%blitar%')->where('cityNow', 'Not Like', '%kabupaten%')->get());
        $member_non_blitar = $total_member - $member_blitar;
        $member_female = count(Member::where('Sex_id', '2')->get());

        $response = [
            'message' => 'Data Umum Pemustaka',
            'total_member' => $total_member,
            'member_male' => $member_male,
            'member_female' => $member_female,
            'member_blitar' => $member_blitar,
            'member_non_blitar' => $member_non_blitar,
            'status' => 'Total',
        ];

        return view('inlislite.pemustaka.umum.index', $response);
    }

    public function memberUmumFilter($status)
    {
        if ($status == "0") {
            $message = 'Data Umum Pemustaka';
            $status = 'Total';
            $total_member = count(Member::select('ID')->get());
            $member_male = count(Member::select('ID')->where('Sex_id', '1')->get());
            $member_female = count(Member::select('ID')->where('Sex_id', '2')->get());
            $member_blitar = count(Member::select('ID')->where('cityNow', 'Like', '%blitar%')->where('cityNow', 'Not Like', '%kabupaten%')->get());
            $member_non_blitar = count(Member::select('ID')->where('cityNow', 'Like', '%kabupaten%')->orWhere('cityNow', 'Not Like', '%blitar%')->get());
        } elseif ($status == "aktif") {
            $message = 'Data Umum Pemustaka Aktif';
            $total_member = count(Member::select('ID')->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $member_male = count(Member::select('ID')->where('Sex_id', '1')->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $member_female = count(Member::select('ID')->where('Sex_id', '2')->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $member_blitar = count(Member::select('ID')->where('cityNow', 'Like', '%blitar%')->where('cityNow', 'Not Like', '%kabupaten%')->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $member_non_blitar = count(Member::select('ID')
                ->where('cityNow', 'Like', '%kabupaten%')
                ->whereHas('loanItem', function ($q) {
                    $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
                })
                ->orWhere('cityNow', 'Not Like', '%blitar%')
                ->whereHas('loanItem', function ($q) {
                    $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
                })
                ->get());
        } elseif ($status == "nonaktif") {
            $all_member = count(Member::select('ID')->get());
            $all_male = count(Member::select('ID')->where('Sex_id', '1')->get());
            $all_female = count(Member::select('ID')->where('Sex_id', '2')->get());
            $all_non_blitar = count(Member::select('ID')->where('cityNow', 'Like', '%kabupaten%')->orWhere('cityNow', 'Not Like', '%blitar%')->get());
            $all_blitar = count(Member::select('ID')->where('cityNow', 'Like', '%blitar%')->where('cityNow', 'Not Like', '%kabupaten%')->get());
            $member_aktif = count(Member::select('ID')->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $male_aktif = count(Member::select('ID')->where('Sex_id', '1')->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $female_aktif = count(Member::select('ID')->where('Sex_id', '2')->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $blitar_aktif = count(Member::select('ID')->where('cityNow', 'Like', '%blitar%')->where('cityNow', 'Not Like', '%kabupaten%')->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $non_blitar_aktif = count(Member::select('ID')
                ->where('cityNow', 'Like', '%kabupaten%')
                ->whereHas('loanItem', function ($q) {
                    $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
                })
                ->orWhere('cityNow', 'Not Like', '%blitar%')
                ->whereHas('loanItem', function ($q) {
                    $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
                })
                ->get());
            $message = 'Data Umum Pemustaka Non Aktif';
            $total_member = $all_member - $member_aktif;
            $member_male = $all_male - $male_aktif;
            $member_female = $all_female - $female_aktif;
            $member_blitar = $all_blitar - $blitar_aktif;
            $member_non_blitar = $all_non_blitar - $non_blitar_aktif;
        }

        $response = [
            'message' => $message,
            'status' => $status,
            'total_member' => $total_member,
            'member_male' => $member_male,
            'member_female' => $member_female,
            'member_blitar' => $member_blitar,
            'member_non_blitar' => $member_non_blitar,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function memberUsia()
    {
        $member_anak = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 6)->get());
        $member_sd = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 7)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 12)->get());
        $member_smp = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 13)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 15)->get());
        $member_sma = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 16)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 18)->get());
        $member_remaja = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 19)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 23)->get());
        $member_dewasa = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 24)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 59)->get());
        $member_lansia = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 60)->get());

        $response = [
            'message' => 'Data Usia Pemustaka',
            'member_anak' => $member_anak,
            'member_sd' => $member_sd,
            'member_smp' => $member_smp,
            'member_sma' => $member_sma,
            'member_remaja' => $member_remaja,
            'member_dewasa' => $member_dewasa,
            'member_lansia' => $member_lansia,
            'status' => 'Total',
        ];
        return view('inlislite.pemustaka.usia.index', $response);
    }

    public function memberUsiaFilter($status)
    {

        $member_anak = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 6)->get());
        $member_sd = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 7)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 12)->get());
        $member_smp = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 13)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 15)->get());
        $member_sma = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 16)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 18)->get());
        $member_remaja = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 19)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 23)->get());
        $member_dewasa = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 24)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 59)->get());
        $member_lansia = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 60)->get());

        if ($status == "0") {
            $message = 'Data Usia Pemustaka';
            $status = 'Total';
            $_member_anak = $member_anak;
            $_member_sd = $member_sd;
            $_member_smp = $member_smp;
            $_member_sma = $member_sma;
            $_member_remaja = $member_remaja;
            $_member_dewasa = $member_dewasa;
            $_member_lansia = $member_lansia;
        } elseif ($status == "aktif") {
            $message = 'Data Usia Pemustaka Aktif';
            $status = 'Aktif';
            $_member_anak = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 6)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $_member_sd = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 7)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 12)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $_member_smp = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 13)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 15)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $_member_sma = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 16)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 18)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $_member_remaja = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 19)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 23)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $_member_dewasa = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 24)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 59)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $_member_lansia = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 60)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
        } elseif ($status == "nonaktif") {
            $anak_aktif = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 6)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $sd_aktif = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 7)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 12)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $smp_aktif = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 13)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 15)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $sma_aktif = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 16)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 18)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $remaja_aktif = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 19)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 23)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $dewasa_aktif = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 24)->where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '<=', 59)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());
            $lansia_aktif = count(Member::where(DB::raw('TIMESTAMPDIFF(YEAR, DateOfBirth, CURDATE())'), '>=', 60)->whereHas('loanItem', function ($q) {
                $q->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'));
            })->get());

            $message = 'Data Usia Pemustaka Non Aktif';
            $status = 'Non Aktif';
            $_member_anak = $member_anak - $anak_aktif;
            $_member_sd = $member_sd - $sd_aktif;
            $_member_smp = $member_smp - $smp_aktif;
            $_member_sma = $member_sma - $sma_aktif;
            $_member_remaja = $member_remaja - $remaja_aktif;
            $_member_dewasa = $member_dewasa - $dewasa_aktif;
            $_member_lansia = $member_lansia - $lansia_aktif;
        }

        $response = [
            'message' => $message,
            'member_anak' => $_member_anak,
            'member_sd' => $_member_sd,
            'member_smp' => $_member_smp,
            'member_sma' => $_member_sma,
            'member_remaja' => $_member_remaja,
            'member_dewasa' => $_member_dewasa,
            'member_lansia' => $_member_lansia,
            'status' => $status
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function memberPekerjaan()
    {
        $result = DB::connection('inlislite')->table('members')->select('master_pekerjaan.id', 'master_pekerjaan.Pekerjaan', DB::raw('count(master_pekerjaan.Pekerjaan) as total'))
            ->join('master_pekerjaan', 'master_pekerjaan.id', '=', 'members.Job_id')
            ->groupBy('master_pekerjaan.Pekerjaan')->orderby('master_pekerjaan.id')->get();
        $response = [
            'message' => 'Data Status Pekerjaan Pemustaka',
            'result' => $result,
        ];

        return view('inlislite.pemustaka.pekerjaan.index', $response);
    }

    public function memberPekerjaanFilter($status)
    {

        if ($status == "0") {
            $message = 'Data Status Pekerjaan Pemustaka';
            $status = 'Total';
            $result = DB::connection('inlislite')->table('members')->select('master_pekerjaan.id', 'master_pekerjaan.Pekerjaan', DB::raw('count(master_pekerjaan.Pekerjaan) as total'))
                ->join('master_pekerjaan', 'master_pekerjaan.id', '=', 'members.Job_id')
                ->groupBy('master_pekerjaan.Pekerjaan')->orderby('master_pekerjaan.id')->get();
        } elseif ($status == "aktif") {
            $message = 'Data Status Pekerjaan Pemustaka Aktif';
            $status = 'Aktif';
            $member = DB::connection('inlislite')->table('members')->select('members.Job_id')->whereExists(function ($query) {
                $query->select(DB::raw('ID'))->from('collectionloanitems')->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'))->whereColumn('collectionloanitems.member_id', 'members.id');
            });
            $result = DB::connection('inlislite')->table('master_pekerjaan')
                ->select('master_pekerjaan.id', 'master_pekerjaan.Pekerjaan', DB::raw('count(members.Job_id) as total'))
                ->leftjoinSub($member, 'members', function ($join) {
                    $join->on('master_pekerjaan.id', '=', 'members.Job_id');
                })->groupBy('master_pekerjaan.Pekerjaan')->orderby('master_pekerjaan.id')->get();
        } elseif ($status == "nonaktif") {
            $message = 'Data Status Pekerjaan Pemustaka Non Aktif';
            $status = 'Non Aktif';
            $member = DB::connection('inlislite')->table('members')->whereNotExists(function ($query) {
                $query->select(DB::raw('ID'))->from('collectionloanitems')->where('LoanDate', '>=', DB::raw('DATE_SUB(now(), INTERVAL 6 MONTH)'))->whereColumn('collectionloanitems.member_id', 'members.id');
            });
            $result = DB::connection('inlislite')->table('master_pekerjaan')
                ->select('master_pekerjaan.id', 'master_pekerjaan.Pekerjaan', DB::raw('count(members.Job_id) as total'))
                ->leftjoinSub($member, 'members', function ($join) {
                    $join->on('master_pekerjaan.id', '=', 'members.Job_id');
                })->groupBy('master_pekerjaan.Pekerjaan')->orderby('master_pekerjaan.id')->get();
        }

        $response = [
            'message' => $message,
            'status' => $status,
            'result' => $result,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
