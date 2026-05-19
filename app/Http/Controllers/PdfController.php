<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Mpdf\Mpdf;
use Mpdf\MpdfException;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\HTMLParserMode;

class PdfController extends Controller
{
    /**
     * Convert HTML to PDF
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function convertHtmlToPdf(Request $request): JsonResponse
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'html' => 'required|string',
                'filename' => 'nullable|string|max:255',
                'format' => 'nullable|string|in:A4,A3,A5,Letter',
                'orientation' => 'nullable|string|in:P,L',
                'margin_left' => 'nullable|numeric|min:0',
                'margin_right' => 'nullable|numeric|min:0',
                'margin_top' => 'nullable|numeric|min:0',
                'margin_bottom' => 'nullable|numeric|min:0',
                'font' => 'nullable|string|max:100',
            ]);

            // Set default values
            $filename = $validated['filename'] ?? 'document_' . time() . '.pdf';
            $format = $validated['format'] ?? 'A4';
            $orientation = $validated['orientation'] ?? 'P';
            $marginLeft = $validated['margin_left'] ?? 15;
            $marginRight = $validated['margin_right'] ?? 15;
            $marginTop = $validated['margin_top'] ?? 15;
            $marginBottom = $validated['margin_bottom'] ?? 15;
            $font = $validated['font'] ?? 'kalpurush';

            // Ensure filename has .pdf extension
            if (!str_ends_with(strtolower($filename), '.pdf')) {
                $filename .= '.pdf';
            }

            // Configure mPDF with Bangla font support
            $mpdf = $this->createMpdfInstance(
                format: $format,
                orientation: $orientation,
                marginLeft: (float) $marginLeft,
                marginRight: (float) $marginRight,
                marginTop: (float) $marginTop,
                marginBottom: (float) $marginBottom,
                font: $font
            );

            // Write HTML to PDF
            $mpdf->WriteHTML($validated['html']);

            // Generate PDF output
            $pdfContent = $mpdf->Output('', 'S'); // 'S' returns the PDF as a string

            // Return PDF as base64 encoded string
            return response()->json([
                'success' => true,
                'message' => 'PDF generated successfully',
                'data' => [
                    'filename' => $filename,
                    'pdf_base64' => base64_encode($pdfContent),
                    'size' => strlen($pdfContent),
                ]
            ]);

        } catch (MpdfException $e) {
            return response()->json([
                'success' => false,
                'message' => 'PDF generation failed',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Convert HTML to PDF and download directly
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function downloadPdf(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'html' => 'required|string',
                'filename' => 'nullable|string|max:255',
                'format' => 'nullable|string|in:A4,A3,A5,Letter',
                'orientation' => 'nullable|string|in:P,L',
                'margin_left' => 'nullable|numeric|min:0',
                'margin_right' => 'nullable|numeric|min:0',
                'margin_top' => 'nullable|numeric|min:0',
                'margin_bottom' => 'nullable|numeric|min:0',
                'font' => 'nullable|string|max:100',
            ]);

            // Set default values
            $filename = $validated['filename'] ?? 'document_' . time() . '.pdf';
            $format = $validated['format'] ?? 'A4';
            $orientation = $validated['orientation'] ?? 'P';
            $marginLeft = $validated['margin_left'] ?? 15;
            $marginRight = $validated['margin_right'] ?? 15;
            $marginTop = $validated['margin_top'] ?? 15;
            $marginBottom = $validated['margin_bottom'] ?? 15;
            $font = $validated['font'] ?? 'kalpurush';

            // Ensure filename has .pdf extension
            if (!str_ends_with(strtolower($filename), '.pdf')) {
                $filename .= '.pdf';
            }

            // Configure mPDF with Bangla font support
            $mpdf = $this->createMpdfInstance(
                format: $format,
                orientation: $orientation,
                marginLeft: (float) $marginLeft,
                marginRight: (float) $marginRight,
                marginTop: (float) $marginTop,
                marginBottom: (float) $marginBottom,
                font: $font
            );

            // Write HTML to PDF
            $mpdf->WriteHTML($validated['html']);

            // Output PDF for download
            return response($mpdf->Output('', 'S'))
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');

        } catch (MpdfException $e) {
            return response()->json([
                'success' => false,
                'message' => 'PDF generation failed',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function createMpdfInstance(
        string $format,
        string $orientation,
        float $marginLeft,
        float $marginRight,
        float $marginTop,
        float $marginBottom,
        string $font
    ): Mpdf {
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => $format,
            'orientation' => $orientation,
            'margin_left' => $marginLeft,
            'margin_right' => $marginRight,
            'margin_top' => $marginTop,
            'margin_bottom' => $marginBottom,
            'tempDir' => storage_path('app/temp'),
            'fontDir' => array_merge($fontDirs, [
                public_path('fonts'),
            ]),
            'fontdata' => $fontData + [
                'kalpurush' => [
                    'R' => 'kalpurush.ttf',
                    'useOTL' => 0xFF,
                    'useKashida' => 75,
                ],
            ],
            'default_font' => $font,
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'allow_charset_conversion' => true,
            'default_font_size' => 0,
        ]);

        $mpdf->SetFont($font);
        $mpdf->WriteHTML($this->buildFontStyles($font), HTMLParserMode::HEADER_CSS);

        return $mpdf;
    }

    private function buildFontStyles(string $font): string
    {
        $fontPath = str_replace('\\', '/', public_path('fonts/kalpurush.ttf'));

        return <<<CSS
@font-face {
    font-family: 'kalpurush';
    src: url('file://{$fontPath}') format('truetype');
    font-weight: normal;
    font-style: normal;
}
body {
    font-family: '{$font}', sans-serif;
}
CSS;
    }
}
