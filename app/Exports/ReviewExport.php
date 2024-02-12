<?php

namespace App\Exports;

use App\Models\ReviewRecomment;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReviewExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $year;
    protected $month;
    protected $datestart;
    protected $dateend;

    public function __construct($year, $month, $datestart, $dateend,)
    {
        $this->year = $year;
        $this->month = $month;
        $this->datestart = $datestart;
        $this->dateend = $dateend;
    }

    public function headings(): array
    {
        return [
            'id',
            'review_by',
            'answer1',
            'answer2',
            'answer3',
            'answer4',
            'answer5',
            'answer6',
            'answer7',
            'answer8',
            'answer9',
            'answer10',
            'answer11',
            'answer12',
            'answer13',
            'answer14',
            'answer15',
            'answer16',
            'answer17',
            'answer18',
            'result',
            'score',
            'comment',
            'created_at',
            'updated_at',
        ];
    }
    public function collection()
    {
        return $excelreview = DB::table('review_recomment')
            ->when($this->year, function ($query, $year) {
                return $query->whereRaw('YEAR(created_at) LIKE ?', ['%' . $year . '%']);
            })
            ->when($this->month, function ($query, $month) {
                return $query->whereRaw('MONTH(created_at) = ?', [$month]);
            })
            ->when($this->datestart, function ($query, $datestart) {
                return $query->where('test_exportreview.created_at', '>=', $datestart);
            })
            ->when($this->dateend, function ($query, $dateend) {
                return $query->where('test_exportreview.created_at', '<=', $dateend);
            })
            ->get();

        // dd($excelreview);
    }
}
