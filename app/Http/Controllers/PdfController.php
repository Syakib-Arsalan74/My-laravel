<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
  public function generatePdf () {
    $data = [
        'title' => 'This is Your Blog',
        'date' => date('m-d-Y'),
        'author' => Auth::user()->username,
        'blogs' => Blog::where('author_id', auth()->user()->id)->get()
      ];
    $pdf = PDF::loadView('createPdf', $data);
    $pdf->setOption('isRemoteEnabled', true);
    $pdf->setPaper('A4', 'portrait');
    return $pdf->download('Blog.pdf');
  }
}
