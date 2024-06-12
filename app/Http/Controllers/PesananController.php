<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class PesananController extends Controller
{
    // Show the pesanan form
    public function showPesananForm()
    {
        return view('pesanan'); 
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'nama' => 'required|string',
            'treatment' => 'required|string',
            'jumlahParfum' => 'required|numeric|min:1',
        ]);

        // Calculate the price based on the treatment and number of shoes
        $harga = 0;
        if ($request->input('treatment') === 'regular') {
            $harga = 30000 * $request->input('jumlahParfum');
        } elseif ($request->input('treatment') === 'express') {
            $harga = 50000 * $request->input('jumlahParfum');
        }

        // Create a new Pesanan instance and save it to the database
        Pesanan::create([
            'nama' => $request->input('nama'),
            'jenis' => $request->input('treatment'),
            'jumlahParfum' => $request->input('jumlahParfum'),
            'harga' => $harga,
        ]);

        // Store the data in the session
        session()->put('nama', $request->input('nama'));
        session()->put('treatment', $request->input('treatment'));
        session()->put('jumlahParfum', $request->input('jumlahParfum'));
        session()->put('harga', $harga);

        // Redirect to the hasil route
        return redirect()->route('pesan-hasil')->with('success', 'Terima kasih sudah order!');
    }

    public function hasil()
    {
        // Retrieve the data from the session
        $nama = session('nama');
        $treatment = session('treatment');
        $jumlahParfum = session('jumlahParfum');
        $harga = session('harga');

        // Return the view and pass the data to it
        return view('hasil', compact('nama', 'treatment', 'jumlahParfum', 'harga'));
    }

    public function download(Request $request)
    {
        // Generate the PDF
        $nama = $request->input('nama'); // Define the $nama variable
        $jumlahParfum = $request->input('jumlahParfum'); // Define the $nama variable
        $jenis = $request->input('treatment'); // Define the $nama variable
        $harga = $request->input('harga');

        // Set the PDF size to A7

        $v = View::make('pdf.struk', compact('nama', 'harga', 'jenis', 'jumlahParfum'))->render();

        $pdf = new Dompdf();

        $pdf->loadHtml($v);

        $pdf->setPaper('a7', 'portrait');

        $pdf->render();

        $pdf->stream('invoice.pdf', array('Attachment' => 0));

        // Remove the data from the session to avoid showing it again upon page refresh
        session()->forget(['nama', 'treatment', 'jumlahParfum', 'harga']);

        // Download the PDF to the user's browser
        // return $pdf->download('struk.pdf');
    }
}
