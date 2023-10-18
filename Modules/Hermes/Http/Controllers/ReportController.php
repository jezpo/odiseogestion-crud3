<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hermes\Entities\Programas;
use Modules\Hermes\Entities\FlujoTramite;
use Modules\Hermes\Entities\TipoTramite;
use Modules\Hermes\Entities\Documentos;
use Modules\Hermes\Entities\FlujoDocumentos;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class ReportController extends Controller
{
    public function index()
    {
        return view('hermes::reportes.index');
    }

    public function getReportData(Request $request)
    {
        $type = $request->input('type');
        $date = null;

        switch ($type) {
            case 'daily':
                $date = date('Y-m-d');
                break;
            case 'monthly':
                $date = date('m');
                break;
            case 'annual':
                $date = date('Y');
                break;
        }

        $data = FlujoDocumentos::with(['documento', 'programa'])
            ->when($type === 'daily', function ($query) use ($date) {
                return $query->whereDate('fecha_recepcion', $date);
            })
            ->when($type === 'monthly', function ($query) use ($date) {
                return $query->whereMonth('fecha_recepcion', $date);
            })
            ->when($type === 'annual', function ($query) use ($date) {
                return $query->whereYear('fecha_recepcion', $date);
            })
            ->get();

        // Convert the view to HTML
        $html = view('hermes::reportes.report', compact('data'))->render();

        // Generate PDF report
        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        // Download the PDF file
        return response()->stream(
            function () use ($pdf) {
                $pdf->stream('report.pdf');
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="report.pdf"',
            ]
        );
    }
}
