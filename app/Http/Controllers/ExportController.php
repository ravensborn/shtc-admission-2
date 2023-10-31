<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Student;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{

    public function downloadStudentImages() {

        $directory = public_path('zip-exports');
        $files = File::files($directory);


        if (count($files) > 0) {

            $zipPath = public_path('zip-exports/' . $files[0]->getFilename());

            return response()->download($zipPath)->deleteFileAfterSend();
        }

        return redirect()->back();
    }

    public function exportAdmin()
    {

        if (!auth()->user()->hasRole('export')) {
            abort(401);
        }



        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'ژمارە',
            'کۆد',
            'زنجیرە',
            'حاڵەت',
            'ناو',
            'ناو',
            'بەش',
            'قۆناغ',
            'رەگەز',
            'ژمارەی مۆبایل',
            'نەتەوە',
            'جۆری خوێندن',
            'شار',
            'قەزا',
            'ناحیە',
            'گوند',
        ];

        $letter = 'A';
        foreach ($headers as $item) {
            $sheet->setCellValue($letter++ . 1, $item);
        }

        $students = \App\Models\Student::all();

        $iteration = 2;

        foreach ($students as $student) {

            $column = 'A';

            $sheet->setCellValue($column++ . $iteration, $iteration - 1);
            $sheet->setCellValue($column++ . $iteration, $student->code);
            $sheet->setCellValue($column++ . $iteration, $student->number);
            $sheet->setCellValue($column++ . $iteration, $student->getStatusName($student->status));
            $sheet->setCellValue($column++ . $iteration, $student->name_kurdish);
            $sheet->setCellValue($column++ . $iteration, $student->name_english);
            $sheet->setCellValue($column++ . $iteration, $student->department->name);
            $sheet->setCellValue($column++ . $iteration, Student::getStageStatuses()[$student->stage]);
            $sheet->setCellValue($column++ . $iteration, $student->getGender());
            $sheet->setCellValue($column++ . $iteration, $student->phone);
            $sheet->setCellValue($column++ . $iteration, $student->nationality);
            $sheet->setCellValue($column++ . $iteration, $student->getDepartmentType());
            $sheet->setCellValue($column++ . $iteration, $student->getProvince());
            $sheet->setCellValue($column++ . $iteration, $student->district);
            $sheet->setCellValue($column++ . $iteration, $student->sub_district);
            $sheet->setCellValue($column++ . $iteration, $student->village_name);

            $iteration++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode('data.xlsx') . '"');
        $writer->save('php://output');
    }


}
